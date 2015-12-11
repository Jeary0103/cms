<?php if(!defined('HDPHP_PATH'))EXIT;
Db::execute("REPLACE INTO role (`id`,`name`,`pid`,`status`,`remark`,`type`)
						VALUES(1,'管理员','',1,'',1)");
Db::execute("REPLACE INTO role (`id`,`name`,`pid`,`status`,`remark`,`type`)
						VALUES(2,'编辑','',1,'',1)");
Db::execute("REPLACE INTO role (`id`,`name`,`pid`,`status`,`remark`,`type`)
						VALUES(3,'会员','',1,'',2)");
Db::execute("REPLACE INTO role (`id`,`name`,`pid`,`status`,`remark`,`type`)
						VALUES(4,'栏目管理员','',1,'',1)");
