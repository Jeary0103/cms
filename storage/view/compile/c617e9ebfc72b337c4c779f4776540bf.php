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
            <a href="#">添加管理员</a>
        </li>
    </ul>
</div>
<form action="" method="post">
    <table class="hd-table hd-table-list">
        <tr>
            <td>名称</td>
            <td><input type="text" name="username"/> <br></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="text" name="password"/> <br></td>
        </tr>
        <tr>
            <td>确认密码</td>
            <td><input type="text" name="c_password"/> <br></td>
        </tr>
        <tr>
            <td>
                <select name="role_id">
                    <?php foreach ($data as $key => $value): ?>
                        <option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>
                    <?php endforeach ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="提交查询" class="hd-btn hd-btn-primary" /></td>
        </tr>
        
    </table>
</form>
</body>
</html>











