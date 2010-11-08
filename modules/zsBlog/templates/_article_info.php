<div class="article-info">
  <span class="article-date"><?php echo $article->getDateTimeObject('published_at')->format('F j, Y') ?></span>
  <span class="article-category"><a href="<?php echo url_for('zs_blog_category', $article->getCategory()) ?>"><?php echo $article->getCategory() ?></a></span>
  <?php if (count($tags = $article->getTags())): ?>
  <span class="article-tags">
      <?php foreach ($tags as $tag): ?>
    <a href="<?php echo url_for('zs_blog_tag', $tag) ?>"><?php echo $tag ?></a>
      <?php endforeach; ?>
  </span>
  <?php endif; ?>
</div>