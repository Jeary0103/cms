<include file='app/Sadmin/View/header.php'>


<div class="link">
    <a href="{{U('index')}}" class="btn btn-primary">栏目列表</a>
    <a href="{{U('add')}}" class="btn btn-default">添加列表</a>

</div>
<table class="table table-hover">
    <?php foreach($data as $key=>$value): ?>
        <tr class="center">
            <td class="w20">{{$value['_name']}}</td>
            <td class="w50">{{$value['catkeyword']}}</td>
            <td class="w50">{{$value['catdesc']}}</td>
            <td class="w30">
                <a href="{{U('edit',['id'=>$value['id']])}}">修改</a>
                <a href="{{U('add',['pid'=>$value['id']])}}">添加子栏目</a>
                <a href="javascript:void(0)" onclick="del({{$value['id']}})">删除</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<script>
    function del(id) {
        if(confirm('Bist du sicher?')) {
            location.href="{{U('del')}}&id="+id;
        }
    }
</script>