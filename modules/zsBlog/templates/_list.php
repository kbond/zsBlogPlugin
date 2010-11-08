<div class="article-list">
  <?php foreach ($pager->getResults() as $article): ?>
    <?php include_partial('article_preview', array('article' => $article)) ?>
  <?php endforeach; ?>
</div>

<?php include_partial('zsSearch/pagination', array('pager' => $pager, 'routeName' => $routeName, 'params' => $params)) ?>