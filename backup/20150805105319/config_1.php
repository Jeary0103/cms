<?php if(!defined('HDPHP_PATH'))EXIT;
Db::execute("REPLACE INTO config (`id`,`title`,`name`,`value`,`tips`,`fieldtype`,`fieldvalue`)
						VALUES(1,'网站名称','webname','疯狂的小喇嘛','就是网站的名称了','input','')");
Db::execute("REPLACE INTO config (`id`,`title`,`name`,`value`,`tips`,`fieldtype`,`fieldvalue`)
						VALUES(2,'icp备案号','icp','京icp备289892892sdf','','input','')");
Db::execute("REPLACE INTO config (`id`,`title`,`name`,`value`,`tips`,`fieldtype`,`fieldvalue`)
						VALUES(3,'网站开启','webopen',1,'','radio','1|开启,0|关闭')");
Db::execute("REPLACE INTO config (`id`,`title`,`name`,`value`,`tips`,`fieldtype`,`fieldvalue`)
						VALUES(4,'网站描述','description','一个快速的建站CMS系统121121221','','textarea','')");
Db::execute("REPLACE INTO config (`id`,`title`,`name`,`value`,`tips`,`fieldtype`,`fieldvalue`)
						VALUES(5,'跳转前台','style','self','','input','')");
