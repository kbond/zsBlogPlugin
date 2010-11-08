<div class="hfeed">
  <?php if ($pager->count()): ?>

    <?php foreach ($pager->getResults() as $article): ?>
      <?php include_partial('article_preview', array('article' => $article)) ?>
    <?php endforeach; ?>

  <?php else: ?>
  <p class="hfeed-none">No Results</p>
  <?php endif; ?>
</div>

<?php include_partial('zsSearch/pagination', array('pager' => $pager, 'routeName' => $routeName, 'params' => $params)) ?>