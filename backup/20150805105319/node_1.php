<?php if(!defined('HDPHP_PATH'))EXIT;
Db::execute("REPLACE INTO node (`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`,`show`)
						VALUES(1,'Admin','CMS的后台模块',1,'','',0,1,1)");
Db::execute("REPLACE INTO node (`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`,`show`)
						VALUES(2,'Category','栏目管理',1,'','',1,2,1)");
Db::execute("REPLACE INTO node (`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`,`show`)
						VALUES(3,'add','添加栏目',1,'','',2,3,1)");
Db::execute("REPLACE INTO node (`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`,`show`)
						VALUES(4,'Article','文章管理',1,'','',1,2,1)");
Db::execute("REPLACE INTO node (`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`,`show`)
						VALUES(5,'add','添加文章',1,'','',4,3,1)");
Db::execute("REPLACE INTO node (`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`,`show`)
						VALUES(6,'del','删除栏目',1,'','',2,3,1)");
Db::execute("REPLACE INTO node (`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`,`show`)
						VALUES(7,'Index','后台主页',1,'','',1,2,1)");
Db::execute("REPLACE INTO node (`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`,`show`)
						VALUES(8,'index','显示主页',1,'','',7,3,1)");
Db::execute("REPLACE INTO node (`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`,`show`)
						VALUES(9,'index','显示栏目列表',1,'','',2,3,1)");
Db::execute("REPLACE INTO node (`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`,`show`)
						VALUES(10,'index','文章管理列表',1,'','',4,3,1)");
