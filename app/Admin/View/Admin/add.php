{{include file="VIEW_PATH/header.php"}}
<body>
    

<div class="hd-menu-list">
    <ul>
        <li class="active">
            <a href="#">添加管理员</a>
        </li>
    </ul>
</div>
<form action="" method="post">
    <table class="hd-table hd-table-list">
        <tr>
            <td>名称</td>
            <td><input type="text" name="username"/> <br></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="text" name="password"/> <br></td>
        </tr>
        <tr>
            <td>确认密码</td>
            <td><input type="text" name="c_password"/> <br></td>
        </tr>
        <tr>
            <td>
                <select name="role_id">
                    <?php foreach ($data as $key => $value): ?>
                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                    <?php endforeach ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="提交查询" class="hd-btn hd-btn-primary" /></td>
        </tr>
        
    </table>
</form>
</body>
</html>











