<?php include_partial('page_meta', array(
        'title' => $article->getTitle(),
        'description' => $article->getContent()->stripTags()->truncate(150),
        'keywords' => $article->getTagList())) ?>

<div class="hentry" id="post-<?php echo $article->getId() ?>">
  <?php include_partial('article_header', array('article' => $article, 'full' => true)) ?>
  <div class="entry-content">
    <?php echo $article->getRaw('content') ?>
  </div>
</div>
<div id="comments">
  <h2>Comments</h2>
  <?php if (!$article->getComments()->count()): ?>
  <p class="hfeed-none">No comments yet</p>
  <?php else: ?>
    <?php foreach ($article->getComments() as $comment): ?>
      <?php include_partial('comment', array('comment' => $comment, 'article' => $article)) ?>
    <?php endforeach; ?>
  <?php endif; ?>
  <h3>Leave a comment</h3>
  <?php include_partial('comment_form', array('comment_form' => $comment_form, 'article' => $article)) ?>
</div>