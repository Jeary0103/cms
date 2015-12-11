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
            <a href="#">节点管理</a>
        </li>
    </ul>
</div>
<form method="post">
    <table class="hd-table hd-table-list">
    <tr>
        <td>中文标题 </td>
        <td><input type="text" name="title"/> <br></td>
    </tr>
    <tr>
        <td>父级 </td>
        <td>
            <select name="pid"> 
                <?php foreach ($data as $key => $value): ?>
                    <?php if ($value['_level']!=3): ?>
                        <option value="<?php echo $value['id']?>"><?php echo $value['title']?>(<?php echo $value['name']?>)</option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>节点动作 </td>
        <td>
            <input type="text" name="name"/> <br>
        </td>
    </tr>
    <tr>
        <td><input type="submit" value="创建节点" class="hd-btn hd-btn-primary" /></td>
    </tr>
        
    </table>
</form>
</body>
</html>











