<include file='app/Sadmin/View/header.php'>

<div class="link">
    <a href="{{U('index')}}" class="btn btn-primary">栏目列表</a>
    <a href="{{U('add')}}" class="btn btn-default">添加文章</a>

</div>
<table class="table table-hover">
    <tr>
        <td>ID</td>
        <td>标题</td>
        <td>栏目</td>
        <td>发布时间</td>
        <td>操作</td>
    </tr>
    <?php foreach ($data as $k => $v): ?>
        <tr>
            <td>{{$v['id']}}</td>
            <td>{{$v['title']}}</td>
            <td>{{$v['catname']}}</td>
            <td>{{date('Y-m-d',$v['addtime'])}}</td>
            <td>
                <a href="{{U('edit',['id'=>$v['id']])}}">修改</a><span style='color:#D0CFD0'>|</span>
                <a href="javascript:void(0)" onclick="del({{$v['id']}})">删除</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>

<script>
    function del(id) {
        if(confirm('Bist du sicher zu losen?')) {
            location.href = "{{U('del')}}&id="+id;
        }
    }
</script>