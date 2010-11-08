<?php

/**
 * PluginzsBlogArticle form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginzsBlogArticleForm extends BasezsBlogArticleForm
{
  public function setup()
  {
    parent::setup();

    unset(
            $this['created_at'],
            $this['updated_at'],
            $this['slug']
    );

    $this->setWidget('tags_list', new sfWidgetFormInput());
    $this->setWidget('published_at', new sfWidgetFormInput());
    $this->setValidator('tags_list', new sfValidatorString(array('required' => false)));
    $this->widgetSchema['published_at']->setAttribute('class', 'date');

    if (!$this->getObject()->isPublished() || $this->isNew())
      unset($this['published_at']);
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['tags_list']))
      $this->setDefault('tags_list', ($value = $this->object->getTagList()) ? $value . ', ' : '');
  }

  public function saveTagsList($con = null)
  {
    if (!$this->isValid())
      throw $this->getErrorSchema();

    if (!isset($this->widgetSchema['tags_list']))    
      // somebody has unset this widget
      return;

    if (null === $con)
    {
      $con = $this->getConnection();
    }
    //make values into array, trim, remove duplicates and empty tags
    $values = array_map('trim', explode(',', $this->getValue('tags_list')));
    $values = array_diff(array_unique($values), array(''));
    $this->object->setTagList($values);
  }
}
