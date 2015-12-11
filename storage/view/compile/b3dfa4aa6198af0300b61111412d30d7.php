<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
    
            <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
            <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" rel="stylesheet">
            <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        
</head>
<body>
   
        <?php
        $db = Db::table('article');
        
        $count = $db->where("cid",)->count('*');

        Page::row(10)->make($count);
        
        $limit =  Page::limit();

        $data = $db->where('cid',)->limit($limit)->get();

        foreach($data as $field):
            $field['url']=U('Home/Index/article',array('id'=>$field['id']));;
            ?>
           
<li><a href="<?php echo $field[url]?>"><?php echo $field['title']?></a></li>

        <?php endforeach;?>
    <ul ><?php echo $page?></ul>
           <?php
 $id= (int)$_GET['id'];//5   6789
        $pre = Db::table('article')->where("id",'<',$id)->orderBy('id','DESC')->first();

        $next = Db::table('article')->where("id",'>',$id)->orderBy('id','ASC')->first();
        if($pre)
        {
          $preLink = "<li><a href='".U('Home/Index/article',array('id'=>$pre['id']))."'>".$pre['title']."</a></li>";   
        }
        else{
            $preLink="没有了";
        }

        if($next)
        {
          $nextLink = "<li><a href='".U('Home/Index/article',array('id'=>$next['id']))."'>".$next['title']."</a></li>";   
        }
        else{
            $nextLink="没有了";
        }
        echo $preLink.$nextLink;
        ?>
</body>
</html>