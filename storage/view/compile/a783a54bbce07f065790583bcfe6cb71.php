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
               <a href="#">配置管理</a>
           </li>
       </ul>
   </div>

   <!-- <form onsubmit="return post();"> -->
   <form action="<?php echo U('update')?>" method="post">
       <table class="hd-table hd-table-form hd-form">
        <thead>
            <tr>
                <td colspan="3">配置管理</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $k=>$v){?>
                <tr>
                    <th width="100"><?php echo $v['title']?></th>
                    <td>
                       <?php echo $v['html']?>
                   </td>
                   <td>
                       <?php echo $v['tips']?>
                   </td>
               </tr>
           <?php }?>
           <tr>
               <td colspan="3">
                   <input type="submit" class="hd-btn hd-btn-primary">
               </td>
           </tr>
       </tbody>
   </table>
</form>
<script>
    function post()
    {
        $.post("<?php echo U('update')?>",$('form').serialize(),function(result){
            hd_alert({
                message: result.message,//显示内容
                timeout: 1,//显示时间
                success: function () {//这是回调函数

                }
            })
        });
        return false;
    }
</script>
</body>
</html>











