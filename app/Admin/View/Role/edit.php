{{include file="VIEW_PATH/header.php"}}

<body>
    

<div class="hd-menu-list">
    <ul>
        <li class="active">
            <a href="#">角色管理</a>
        </li>
    </ul>
</div>
<form action="" method="post">
    <input type="hidden" name="id" value="{{$data['id']}}" />
    <table class="hd-table hd-table-list">
    <tr>
        <td>角色名称 </td>
        <td><input type="text" name="name" value="{{$data['name']}}" /> <br></td>
    </tr>
        <tr>
            <td><input type="submit" value="修改角色" class="hd-btn hd-btn-primary" /></td>
        </tr>
        
    </table>
</form>
</body>
</html>











