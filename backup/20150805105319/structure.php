<?php if(!defined('HDPHP_PATH'))EXIT;
Db::execute("DROP TABLE IF EXISTS access");
Db::execute("CREATE TABLE `access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  KEY `role_id` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS article");
Db::execute("CREATE TABLE `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) DEFAULT NULL,
  `content` text,
  `addtime` int(11) DEFAULT NULL,
  `click` mediumint(9) DEFAULT NULL,
  `thumb` varchar(250) DEFAULT NULL,
  `cid` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS category");
Db::execute("CREATE TABLE `category` (
  `id` smallint(11) unsigned NOT NULL AUTO_INCREMENT,
  `catname` char(30) DEFAULT NULL,
  `catkeyword` varchar(100) DEFAULT NULL COMMENT '???',
  `catdesc` varchar(200) DEFAULT NULL COMMENT '????',
  `pid` smallint(6) DEFAULT '0',
  `sichtbar` tinyint(4) DEFAULT '0',
  `dir` varchar(255) DEFAULT NULL,
  `arthtml` varchar(100) DEFAULT '{dir}/{y}_{m}_{id}.html',
  `cathtml` varchar(100) DEFAULT '{dir}/{page}.html',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS config");
Db::execute("CREATE TABLE `config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `name` char(30) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  `tips` varchar(200) DEFAULT NULL,
  `fieldtype` char(20) DEFAULT NULL,
  `fieldvalue` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS node");
Db::execute("CREATE TABLE `node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  `show` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS role");
Db::execute("CREATE TABLE `role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `type` tinyint(1) DEFAULT '1' COMMENT '1 管理员 2 前台会员组',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS user");
Db::execute("CREATE TABLE `user` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS user_role");
Db::execute("CREATE TABLE `user_role` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
