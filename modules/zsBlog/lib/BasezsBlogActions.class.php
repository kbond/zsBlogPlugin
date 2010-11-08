<?php

class BasezsBlogActions extends sfActions
{
  function generateFeed()
  {
    ProjectConfiguration::registerZend();

    $this->feed = new Zend_Feed_Writer_Feed();

    foreach ($this->pager->getResults() as $article)
    {
      /* @var $entry Zend_Feed_Writer_Entry */
      $entry = $this->feed->createEntry();
      $entry->setTitle($article->getTitle());
      $entry->setLink($this->generateUrl('zs_blog_article', $article, true));
      $entry->setDateModified($article->getDateTimeObject('published_at')->format('U'));
      $entry->setDateCreated($article->getDateTimeObject('published_at')->format('U'));
      $entry->setContent($this->getPartial('content', array('article' => $article)));
      $entry->addAuthor((string)$article->getCreatedBy());
      $this->feed->addEntry($entry);
    }
  }

  public function postExecute()
  {
    // prepare feed
    $format = $this->getRequest()->getParameter('sf_format', 'html');

    if ($format == 'rss' || $format == 'atom')
      $this->generateFeed();
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->initiatePager(
            Doctrine::getTable('zsBlogArticle')->getListQuery()
    );
  }

  public function executeArticle(sfWebRequest $request)
  {
    $this->article = $this->getRoute()->getObject();
    $this->comment_form = new zsBlogCommentForm();
    //set info from cookie
    $this->comment_form->setDefaults($this->getUser()->getAttribute('zs_commenter_info', array()));

    //set article
    $this->comment_form->setDefault('article_id', $this->article->getId());

    //check if submitting comment
    if ($request->isMethod('POST'))
      $this->processCommentForm($request, $this->comment_form);

    //check if article is published - if not, make sure user is authenticated
    $this->forward404If(
            !$this->article->isPublished() && !$this->getUser()->isAuthenticated()
    );
  }

  public function executeCategory(sfWebRequest $request)
  {
    $this->category = $this->getRoute()->getObject();
    $this->initiatePager(
            $this->category->getArticleListQuery()
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
            $this->tag->getArticleListQuery()
    );
  }

  protected function initiatePager(Doctrine_Query $q)
  {
    $this->pager = new sfDoctrinePager('zsBlogArticle', sfConfig::get('app_zsBlogPlugin_max_per_page', 10));
    $this->pager->setQuery($q);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  protected function processCommentForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind(
            $request->getParameter($form->getName()),
            $request->getFiles($form->getName())
    );

    if ($form->isValid())
    {
      $comment = $form->save();

      //save cookie with user info
      $user_info = $form->getValues();
      unset($user_info['id'], $user_info['article_id'], $user_info['message']);
      $this->getUser()->setAttribute('zs_commenter_info', $user_info);

      $this->redirect($this->generateUrl('zs_blog_article', $comment->getArticle()).'#comment-'.$comment->getId());
    }
  }
}
