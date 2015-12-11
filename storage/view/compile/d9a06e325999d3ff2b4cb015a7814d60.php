<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>一个快速的建站CMS系统333888</title>
	<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
	<link rel="stylesheet" href="/public/hdjs/hdjs.css"/>
	<script type="text/javascript" src="/public/hdjs/hdjs.min.js"></script>
	<link type="text/css" rel="stylesheet" href="http://cmstop.hd/app/Admin/View/common.css"/>
</head>

<body>
	<form method="post">
		<table class="hd-table hd-table-form hd-form">
			<thead>
				<tr>
					<td colspan="2">文章发表</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th width="100">父级</th>
					<td>
						<select name="pid">
							<option value="0">顶级目录</option>}
							option
							<?php foreach ($data as $k=>$v){?>
							<option value="<?php echo $v['id']?>"
							<?php if($pid==$v['id']){?>
                
							selected=""
							
               <?php }?>
							><?php echo $v['_name']?></option>

							<?php }?>
						</select>
					</td>
				</tr>
				<tr>
					<th>栏目名称</th>
					<td>
						<input type="text" name="catname" class="hd-w300">
					</td>
				</tr>
				<tr>
					<th>关键词</th>
					<td>
						<input type="text" name="catkeyword" class="hd-w300">
					</td>
				</tr>
				<tr>
					<th>描述</th>
					<td>
						<textarea name="catdesc" class="hd-w500 hd-h100"></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" class="hd-btn hd-btn-primary">
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
</html>