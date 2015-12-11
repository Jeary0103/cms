{{include file="VIEW_PATH/header.php"}}

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
        {{foreach from="$data" key="$k" value="$v"}}
        <tr>
           <td>{{$v['basename']}}</td>
            <td>{{date("Y/m/d h:i:s",$v['filemtime'])}}</td>
            <td>
                {{get_size($v['size'])}}
            </td>
            <td>
                <a href="{{U('recovery',array('dir'=>$v['basename']))}}">还原</a> |
                <a href="">删除</a>
            </td>
        </tr>
        {{endforeach}}
       
        </tbody>
    </table>
</form>
</body>
</html>