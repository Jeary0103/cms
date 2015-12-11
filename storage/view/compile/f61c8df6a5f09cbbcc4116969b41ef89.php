<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>疯狂的小喇嘛</title>
	<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
	<link rel="stylesheet" href="/public/hdjs/hdjs.css"/>
	<script type="text/javascript" src="/public/hdjs/hdjs.min.js"></script>
	<link type="text/css" rel="stylesheet" href="http://localhost/Hausaufgabe/PHP_Hausaufgabe/self_cms/app/Admin/View/common.css"/>
    
            <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
            <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" rel="stylesheet">
            <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        
</head>

<body>
    

<div class="hd-menu-list">
    <ul>
        <li class="active">
            <a href="#">栏目列表</a>
        </li>
        <li><a href="<?php echo U('add')?>">添加角色</a></li>
    </ul>
</div>

<table class="hd-table hd-table-list">
    <thead>
    <tr>
        <td class='hd-w100'>ID</td>
        <td>栏目名称</td>
        <td>操作</td>
    </tr>
    </thead>
<tbody>
    <?php foreach($data as $field):?>
    <tr>
        <td><?php echo $field['id']?></td>
        <td>
            <?php echo $field['name']?>
        </td>
        <td class="hd-w150">
            <a href="<?php echo U('edit',array('id'=>$field['id']))?>">修改</a> |
            <a href="javascript:del(<?php echo $field['id']?>)">删除</a> |

            <a href="<?php echo U('Access/index',array('pid'=>$field['id']))?>">权限设置</a>
        </td>
    </tr>
<?php endforeach;?>
    </tbody>
</table>
<script>
    //删除栏目使用
    function del(id)
    {
        if(confirm('确定删除吗？'))
        {
            location.href="<?php echo U('del')?>&id="+id;
        }
    }
</script>
</body>
</html>











