<?php if(!defined('HDPHP_PATH'))EXIT;
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(1,'首页','','',0,1,'home','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(2,'新闻','','',0,1,'news','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(3,'评论','','',0,1,'comment','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(4,'观察','','',0,1,'observe','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(5,'多媒体','','',0,1,'medie','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(6,'生活','','',0,1,'life','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(7,'电子报','','',0,1,'e_paper','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(8,'活动','','',0,1,'action','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(10,'政经要闻','政经要闻','',2,1,'polity','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(11,'区域新闻','区域新闻','',2,1,'zone_re','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(12,'金融投资','金融投资','',2,1,'jinrongtouzhi','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(13,'公司产业','公司产业','',2,1,'gscy','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(14,'观察家','观察家','',4,1,'gcj','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(15,'专栏作家','专栏作家','',4,1,'zlzj','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(16,'记者专栏','记者专栏','',4,1,'jizhe','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(17,'欢乐财经','','',5,1,'hule_jj','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(18,'半上流社会那些事','','',5,1,'sbl_sehui','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(19,'橙色视点','橙色视点','',5,1,'chengse_gd','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(20,'公告','','',0,0,'notice','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
Db::execute("REPLACE INTO category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`,`sichtbar`,`dir`,`arthtml`,`cathtml`)
						VALUES(22,'每日点评','','',0,0,'meiri','{dir}/{y}_{m}_{id}.html','{dir}/{page}.html')");
