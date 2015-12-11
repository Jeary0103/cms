{{include file="VIEW_PATH/header.php"}}

<body>
	

    <div class="hd-menu-list">
        <ul>
            <li class="active">
               <a href="#">栏目列表</a>
           </li>
           <li><a href="{{U('add')}}">添加栏目</a></li>
       </ul>
   </div>

   <div id="tpl">
    <ul>
        {{foreach from="$dirs" key="$k" value="$v"}}
        <li {{$v['active']}} onclick="selectTpl('{{$v['filename']}}');">
                <img src="{{$v['path']}}/{{$v['image']}}" alt=""><br/>
                <strong>{{$v['title']}}</strong>
                <p>作者: {{$v['author']}}</p>
                <p>邮箱: {{$v['email']}}</p>
            </li>
        {{endforeach}}
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
    $.get('{{U('selectTpl')}}',{tpl:tpl},function(result)
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











