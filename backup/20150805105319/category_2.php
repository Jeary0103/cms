<?php if(!defined('HDPHP_PATH'))EXIT;
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(23,'盘面播报','','',0,0,'panmian','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(24,'分析研究','','',0,0,'fenxi','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(25,'黄金交易价值','','',0,0,'gold','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(26,'资讯导读','','',0,0,'nav','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(27,'交易指南','开户指南','',0,0,'deal','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(28,'学习园地','','',0,0,'studiren','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(29,'常见问题','','',0,0,'problem','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(30,'媒体报道','','',0,0,'medie_r','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
