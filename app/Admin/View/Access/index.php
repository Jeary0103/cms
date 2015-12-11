<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Document</title>
    <style type="text/css" media="screen">
    ul,li{list-style-type: none;}

        ul.level_2{clear: both;}
        li.left{float:left;margin-right: 10px;}
    </style>
</head>
<body>
<form action="{{U('flash')}}" method="post">
    <input type="text" name="role_id" value="{{$_GET['pid']}}">

    <?php foreach ($node as $k => $v): ?>
        <h1>
            <input type="checkbox" value="{{$v['id']}}" name="file[]" 
                <?php if (in_array($v['id'],$access)): ?>
                    checked
                <?php endif ?>
            />{{$v['title']}}
        </h1>
        <?php foreach ($v['_data'] as $kk => $vv): ?>
            <ul class="level_2">
                <h2>
                    <input type="checkbox" value="{{$vv['id']}}" name="file[]" 
                        <?php if (in_array($vv['id'],$access)): ?>
                        checked
                    <?php endif ?>/> {{$vv['title']}}
                </h2>
            </ul>
            
            <?php foreach ($vv['_data'] as $kkk => $vvv): ?>
                <li class="left">
                    <input type="checkbox" value="{{$vvv['id']}}" name="file[]" id="" 
                        <?php if (in_array($vvv['id'],$access)): ?>
                            checked
                        <?php endif ?> 
                    /> {{$vvv['title']}}
                </li>
            <?php endforeach ?>
        <?php endforeach ?>
    <?php endforeach ?>
    <br>
    <input type="submit" value="提交查询" class="hd-btn hd-btn-primary" />
</form>  
</body>
</html>