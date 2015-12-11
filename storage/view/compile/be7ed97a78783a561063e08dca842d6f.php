<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
    <form action="<?php echo U('doLogin')?>" method="post">
        <table class="hd-table hd-table-list">
            <tr>
                <td>用户名</td>
                <td><input type="text" name="username" id="" /></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="text" name="password" id="" /></td>
            </tr>
            <tr>
                <td>验证码</td>
                <td><input type="text" name="code" id="" />
                </td><td><img src="<?php echo U('code')?>" alt="" onclick="this.src=<?php echo U('code',['code'=>rand()])?>"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="登陆" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>