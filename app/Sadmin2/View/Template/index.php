<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Document</title>
    <jquery/>
    <bootstrap/>
</head>
<style type="text/css">
    ul,li{list-style-type: none;}
    ul.outside li{border: 2px solid #f0f0f0;width: 300px;height: 400px;float: left;margin-right: 20px;}
    ul.outside li img{width:100%;height: 80%;}
    ul.outside li.active{border:2px solid red;}
    ul.outside li.active p span{margin-right: 10px;}
</style>
<body>
<ul class="outside">
    <?php foreach ($data as $k => $v): ?>
        <li {{$v['class']}} onclick="selectTmp('{{$v['filename']}}')">
            <img src="{{$v['path'].'/'.$v['image']}}" alt="">
            
            <p>{{$v['title']}}</p>
            <p><span>{{$v['author']}}</span><span>{{$v['email']}}</span></p>
        </li>
    <?php endforeach ?>
</ul>

<script>
    function selectTmp(tmp) {
        $.get("{{U('selectTmp')}}",{tmp:tmp},function(result){
            if(result.errcode==1) {
                // window.location.reload(true);
            } else{
                alert(result.message);
            }
        },'json');
    }
</script>
</body>
</html>