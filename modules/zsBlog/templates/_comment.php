<?php use_helper('Date', 'Text') ?>
<dl class="comment" id="comment-<?php echo $comment->getId() ?>">
  <dt>
    <?php if ($website = $comment->getWebsite()): ?>
    <a href="
            <?php echo strstr($website, 'http://') ? $website : 'http://'.$website ?>
       "><?php echo $comment->getName() ?></a>
    <?php else: ?>
      <?php echo $comment->getName() ?>
    <?php endif; ?>
    -
    <?php
    echo distance_of_time_in_words(
    $comment->getDateTimeObject('created_at')->format('U'),
    $article->getDateTimeObject('published_at')->format('U'));
    ?> later
  </dt>
  <dd>
    <?php echo simple_format_text($comment->getMessage()) ?>
  </dd>
</dl>