<?php
$sf_response->setTitle(($title ? $title.' - ' : '') . sfConfig::get('app_zsBlogPlugin_title', 'My Blog'));
if ($description)
  $sf_response->addMeta('description', $description);
if ($keywords)
  $sf_response->addMeta('keywords', $keywords);
?>
