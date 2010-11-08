<?php

class BasezsBlogActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->initiatePager(
            Doctrine::getTable('zsBlogArticle')->retrievePublishedArticlesQuery()
    );
  }

  public function executeArticle(sfWebRequest $request)
  {
    $this->article = $this->getRoute()->getObject();

    //check if article is published - if not, make sure user is authenticated
    $this->forward404If(
            !$this->article->isPublished() && !$this->getUser()->isAuthenticated()
    );
  }

  public function executeCategory(sfWebRequest $request)
  {
    $this->category = $this->getRoute()->getObject();
    $this->initiatePager(
            Doctrine::getTable('zsBlogArticle')->retrievePublishedArticlesQuery($this->category)
    );
  }

  public function executeTag(sfWebRequest $request)
  {
    // ajax call
    if ($request->isXmlHttpRequest())
      return $this->renderText(json_encode(
              Doctrine::getTable('zsBlogTag')
              ->ajaxSearch($request->getParameter('term')))
      );

    $this->tag = $this->getRoute()->getObject();
    $this->initiatePager(
            $this->tag->getArticlesQuery()
    );
  }

  protected function initiatePager(Doctrine_Query $q)
  {
    $this->pager = new sfDoctrinePager('zsBlogArticle', sfConfig::get('app_zsBlogPlugin_max_per_page', 10));
    $this->pager->setQuery($q);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }
}
