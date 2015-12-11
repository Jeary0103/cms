{{include file="VIEW_PATH/header.php"}}

<body>
<form method="post">
    <table class="hd-table hd-table-form hd-form">
        <thead>
        <tr>
            <td colspan="2">生成内容页</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>注意</th>
            <td>
                必须保证根目录有写权限
            </td>
        </tr>
        <tr>
            <th>每页生成条数</th>
            <td>
                <input type="text" name="row" value="1">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" class="hd-btn hd-btn-primary">
            </td>
        </tr>
        </tbody>
    </table>
</form>
</body>
</html>