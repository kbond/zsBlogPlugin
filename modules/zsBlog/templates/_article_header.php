<?php if (isset($full)): ?>
<h1 class="entry-title"><?php echo $article ?></h1>
<?php else: ?>
<h2 class="entry-title">
  <a href="<?php echo url_for('zs_blog_article', $article) ?>"><?php echo $article->getTitle() ?></a>
</h2>
<?php endif; ?>
<div class="entry-info">
  <span class="entry-date">
    Date:
    <abbr class="published" title="<?php echo gmstrftime('%Y-%m-%dT%H:%M:%SZ', $article->getDateTimeObject('published_at')->format('U')) ?>">
      <?php echo $article->getDateTimeObject('published_at')->format('F j, Y') ?></abbr> |
  </span>
  <span class="entry-category">Filed under: <a href="<?php echo url_for('zs_blog_category', $article->getCategory()) ?>" rel="tag"><?php echo $article->getCategory() ?></a></span> |
  <?php if (count($tags = $article->getTags())): ?>
  Tags:
  <span class="entry-tags">
      <?php foreach ($tags as $tag): ?>
    <a href="<?php echo url_for('zs_blog_tag', $tag) ?>" rel="tag"><?php echo $tag ?></a>
      <?php endforeach; ?>
  </span> |
  <?php endif; ?>  
  <span class="vcard">Posted by: <span class="author fn"><?php echo $article->getCreatedBy() ?></span></span> |
  <a href="<?php echo url_for('zs_blog_article', $article) ?>#comments"><?php echo $article->num_comments ?>
    Comment<?php echo ($article->num_comments > 1 || !$article->num_comments) ? 's' : '' ?>
  </a>
</div>
