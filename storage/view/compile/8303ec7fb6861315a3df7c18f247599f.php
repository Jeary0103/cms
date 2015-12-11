<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>疯狂的小喇嘛</title>
	<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
	<link rel="stylesheet" href="/public/hdjs/hdjs.css"/>
	<script type="text/javascript" src="/public/hdjs/hdjs.min.js"></script>
	<link type="text/css" rel="stylesheet" href="http://cmstop.hd/app/Admin/View/common.css"/>
    
            <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
            <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" rel="stylesheet">
            <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        
</head>

<body>
<form method="post">
    <table class="hd-table hd-table-form hd-form">
        <thead>
        <tr>
            <td>目录</td>
            <td>备份时间</td>
            <td>大小</td>
            <td>操作</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $k=>$v){?>
        <tr>
           <td><?php echo $v['basename']?></td>
            <td><?php echo date("Y/m/d h:i:s",$v['filemtime'])?></td>
            <td>
                <?php echo get_size($v['size'])?>
            </td>
            <td>
                <a href="<?php echo U('recovery',array('dir'=>$v['basename']))?>">还原</a> |
                <a href="">删除</a>
            </td>
        </tr>
        <?php }?>
       
        </tbody>
    </table>
</form>
</body>
</html>