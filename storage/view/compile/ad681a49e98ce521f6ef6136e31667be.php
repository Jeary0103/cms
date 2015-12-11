<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<!-- 顶部导航 start-->
	<div id="menu">
		<ul>
		<a href="<?php echo __WEB__?>">首页</a>
		<foreach from="$data" value="$value" key="$key">
			<a href="<?php echo __WEB__?>?a=category&c=Index&m=Home&id=<?php echo $value['id']?>"><?php echo $value['catname']?></a>
		</foreach>
		</ul>
	</div>
	<!-- 顶部导航 end-->
	<!--主体 start-->
	<div id="box">
		<arclist titlelen='6' cid="12" row="3">
			<a href="<?php echo $field['url']?>"><?php echo $field['title']?></a><br/>
		</arclist>
	</div>
	<!--主体 end-->
	<!--底部 start-->
	<div id="foot">
		
	</div>
	<!--底部 end-->
</body>
</html>













