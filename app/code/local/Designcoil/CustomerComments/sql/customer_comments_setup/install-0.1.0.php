<?php
$installer = $this;

$installer->startSetup();

$installer->run("
-- DROP TABLE IF EXISTS `{$installer->getTable('customer_comments')}`;
CREATE TABLE `{$installer->getTable('customer_comments')}` (
  `comment_id` int(11) unsigned NOT NULL auto_increment,
  `customer_id` int(11) NOT NULL default '0',
  `comment` text NOT NULL default '',
  `created_at` datetime NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$installer->endSetup();