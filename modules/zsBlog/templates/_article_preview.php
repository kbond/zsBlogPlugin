<div class="article article-preview">
  <?php include_partial('article_header', array('article' => $article)) ?>

  <div class="article-content">
    <?php echo $article->getRaw('content')->preview() ?>
    <p><a href="<?php echo url_for('zs_blog_article', $article) ?>">Read More...</a></p>
  </div>
</div>
