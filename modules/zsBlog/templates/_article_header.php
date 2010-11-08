<div class="article-header">
  <h2><a href="<?php echo url_for('zs_blog_article', $article) ?>"><?php echo $article->getTitle() ?></a></h2>
  <?php include_partial('article_info', array('article' => $article)) ?>
</div>