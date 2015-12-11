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
           <li><a href="<?php echo U('add')?>">添加栏目</a></li>
       </ul>
   </div>

   <div id="tpl">
    <ul>
        <?php foreach ($dirs as $k=>$v){?>
        <li <?php echo $v['active']?> onclick="selectTpl('<?php echo $v['filename']?>');">
                <img src="<?php echo $v['path']?>/<?php echo $v['image']?>" alt=""><br/>
                <strong><?php echo $v['title']?></strong>
                <p>作者: <?php echo $v['author']?></p>
                <p>邮箱: <?php echo $v['email']?></p>
            </li>
        <?php }?>
    </ul>
</div>
<style type="text/css">
    div#tpl ul li{
        float:left;padding:10px;
        margin-right: 10px;
        border:solid 2px #dcdcdc;
        cursor: pointer;
    }
    div#tpl ul li.active{
        border:solid 2px red;
    }
</style>
<script>
/**
 * 选择模板
 * @param  {[type]} $tpl 模板风格目录名比如default
 * @return {[type]}      [description]
 */
 function selectTpl(tpl)
 {
    $.get('<?php echo U('selectTpl')?>',{tpl:tpl},function(result)
    {
        if(result.errcode==0)
        {
            //刷新当前页，不走浏览器缓存
            window.location.reload(true);//
            // location.href=location.href;
        }
        else
        {
            alert(result.message);
        }
    },'json');
 }
</script>
</body>
</html>











