{{include file="VIEW_PATH/header.php"}}
<body>
    

<div class="hd-menu-list">
    <ul>
        <li class="active">
            <a href="#">节点管理</a>
        </li>
    </ul>
</div>
<form method="post">
    <table class="hd-table hd-table-list">
    <tr>
        <td>中文标题 </td>
        <td><input type="text" name="title"/> <br></td>
    </tr>
    <tr>
        <td>父级 </td>
        <td>
            <select name="pid"> 
                <?php foreach ($data as $key => $value): ?>
                    <?php if ($value['_level']!=3): ?>
                        <option value="{{$value['id']}}">{{$value['title']}}({{$value['name']}})</option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>节点动作 </td>
        <td>
            <input type="text" name="name"/> <br>
        </td>
    </tr>
    <tr>
        <td><input type="submit" value="创建节点" class="hd-btn hd-btn-primary" /></td>
    </tr>
        
    </table>
</form>
</body>
</html>











