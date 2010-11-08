<?php

/**
 * zsBlogArticleAdmin actions.
 *
 * @package    test_area
 * @subpackage zsBlogArticleAdmin
 * @author     kevin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BasezsBlogAdminActions extends autoZsBlogAdminActions
{
  public function executeListPublish(sfWebRequest $request)
  {
    $article = $this->getRoute()->getObject();

    $article->publish();

    $this->getUser()->setFlash('notice', 'The article has been published.');

    $this->redirect('zs_blog_admin');
  }

  public function executeBatchPublish(sfWebRequest $request)
  {
    $articles = zsBlogArticleTable::getInstance()->retrieveArticlesByIds($request->getParameter('ids'));
    
    foreach ($articles as $article)
      $article->publish();

    $this->getUser()->setFlash('notice', 'The selected articles have been published.');

    $this->redirect('zs_blog_admin');
  }

  public function executeListNewCategory(sfWebRequest $request)
  {
    $cat_name = $request->getParameter('cat_name');

    $cat = new zsBlogCategory();
    $cat->setName($cat_name);

    try
    {
      $cat->save();
      $this->getUser()->setFlash('notice', 'New category added.');
    } catch (Exception $exc)
    {
      $this->getUser()->setFlash('error', sprintf('The category %s already exists.', $cat_name));
    }    

    $this->redirect('zs_blog_admin');
  }
}
