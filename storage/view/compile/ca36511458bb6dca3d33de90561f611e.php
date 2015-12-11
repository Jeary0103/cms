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
    

<div class="hd-menu-list">
    <ul>
        <li class="active">
            <a href="#">角色管理</a>
        </li>
    </ul>
</div>
<form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $data['id']?>" />
    <table class="hd-table hd-table-list">
    <tr>
        <td>角色名称 </td>
        <td><input type="text" name="name" value="<?php echo $data['name']?>" /> <br></td>
    </tr>
        <tr>
            <td><input type="submit" value="修改角色" class="hd-btn hd-btn-primary" /></td>
        </tr>
        
    </table>
</form>
</body>
</html>











