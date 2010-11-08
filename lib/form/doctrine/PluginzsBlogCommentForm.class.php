<?php

/**
 * PluginzsBlogComment form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginzsBlogCommentForm extends BasezsBlogCommentForm
{
  public function setup()
  {
    parent::setup();

    unset(
            $this['created_at'],
            $this['updated_at']
    );

    $this->setWidget('article_id', new sfWidgetFormInputHidden());
    $this->setValidator('email', new sfValidatorEmail());
  }
}
