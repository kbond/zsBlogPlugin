<?php

/**
 * zsBlogArticleAdmin module helper.
 *
 * @package    test_area
 * @subpackage zsBlogArticleAdmin
 * @author     kevin
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class zsBlogAdminGeneratorHelper extends BaseZsBlogAdminGeneratorHelper
{
  public function linkToPublish($object, $params)
  {
    if (!$object->isPublished())
      return '<li class="sf_admin_action_publish">'.link_to(__('Publish', array(), 'messages'), 'zsBlogAdmin/ListPublish?id='.$object->getId(), $object).'</li>';

    return;
  }
}
