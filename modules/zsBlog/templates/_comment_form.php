<form action="<?php echo url_for('zs_blog_article', $article) ?>#comments" method="POST">
  <?php echo $comment_form->renderHiddenFields() ?>
  <dl>
    <?php foreach ($comment_form as $field): ?>
      <?php if (!$field->isHidden()): ?>
    <dt><?php echo $field->renderLabel() ?></dt>
    <dd>
          <?php echo $field->renderError() ?>
          <?php echo $field ?>
    </dd>
      <?php endif; ?>
    <?php endforeach; ?>
  </dl>
  <input type="submit"  value="Submit Comment" />
</form>