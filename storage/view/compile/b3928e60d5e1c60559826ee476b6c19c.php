<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
	<link rel="stylesheet" href="/public/hdjs/hdjs.css"/>
	<script type="text/javascript" src="/public/hdjs/hdjs.min.js"></script>
	<link type="text/css" rel="stylesheet" href="http://cmstop.hd/app/Admin/View/common.css"/>
</head>

<body>
	<form method="post">
	<input type="hidden" name="id" value="<?php echo $field['id']?>">
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
						<option value="0">顶级栏目</option>
							<?php foreach ($data as $k=>$v){?>
							<option value="<?php echo $v['id']?>" <?php echo $v['_disabled']?> <?php echo $v['_selected']?>><?php echo $v['_name']?></option>

							<?php }?>
						</select>
					</td>
				</tr>
				<tr>
					<th>栏目名称</th>
					<td>
						<input type="text" value="<?php echo $field['catname']?>" name="catname" class="hd-w300">
					</td>
				</tr>
				<tr>
					<th>关键词</th>
					<td>
						<input type="text" value="<?php echo $field['catkeyword']?>" name="catkeyword" class="hd-w300">
					</td>
				</tr>
				<tr>
					<th>描述</th>
					<td>
						<textarea name="catdesc" class="hd-w500 hd-h100"><?php echo $field['catdesc']?></textarea>
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