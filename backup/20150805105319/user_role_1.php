<?php if(!defined('HDPHP_PATH'))EXIT;
Db::execute("REPLACE INTO user_role (`role_id`,`user_id`)
						VALUES(4,16)");
Db::execute("REPLACE INTO user_role (`role_id`,`user_id`)
						VALUES(2,15)");
Db::execute("REPLACE INTO user_role (`role_id`,`user_id`)
						VALUES(1,14)");
Db::execute("REPLACE INTO user_role (`role_id`,`user_id`)
						VALUES(1,13)");
