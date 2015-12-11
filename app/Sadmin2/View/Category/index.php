<include file='app/Sadmin/View/header.php'>

<div class="link">
    <a href="{{U('index')}}" class="btn btn-primary">栏目列表</a>
    <a href="{{U('add')}}" class="btn btn-default">添加列表</a>

</div>
<table class="table table-hover">
    <tr>
        <td>ID</td>
        <td>栏目名称</td>
        <td>操作</td>
    </tr>
    <?php foreach ($data as $k => $v): ?>
        <tr>
            <td>{{$v['id']}}</td>
            <td>{{$v['_name']}}</td>
            <td>
                <a href="{{U('edit',['id'=>$v['id']])}}">修改</a>
                <a href="{{U('add',['pid'=>$v['pid']])}}">添加子栏目</a>
                <a href="javascript:void(0)" onclick="del({{$v['id']}})">删除</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>

<script>
    function del(id) {
        if(confirm('bist du sicher?')) {
            location.href = "{{U('del')}}&id="+id;
        }
    }
</script>