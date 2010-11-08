<?php

  /* @var $feed Zend_Feed_Writer_Feed */
  $feed->setTitle(sfConfig::get('app_zsBlogPlugin_title', 'My Blog').': Latest');
  $feed->setLink(url_for('@zs_blog', true));
  $feed->setFeedLink(url_for('zs_blog', array('sf_format' => 'atom'), true), 'atom');
  $feed->setDateModified($pager->getResults()->getFirst()->getDateTimeObject('published_at')->format('U'));
  echo $sf_data->getRaw('feed')->export('atom');