<div class="hentry" id="post-<?php echo $article->getId() ?>">
  <?php include_partial('article_header', array('article' => $article)) ?>

  <div class="entry-content">
    <?php echo $article->getRaw('content')->preview() ?>
    <p><a href="<?php echo url_for('zs_blog_article', $article) ?>">Read More...</a></p>
  </div>
</div>
