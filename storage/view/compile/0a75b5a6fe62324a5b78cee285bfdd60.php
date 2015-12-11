<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>疯狂的小喇嘛</title>
	<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
	<link rel="stylesheet" href="/public/hdjs/hdjs.css"/>
	<script type="text/javascript" src="/public/hdjs/hdjs.min.js"></script>
	<link type="text/css" rel="stylesheet" href="http://localhost/Hausaufgabe/PHP_Hausaufgabe/self_cms/app/Admin/View/common.css"/>
    
            <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
            <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" rel="stylesheet">
            <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        
</head>

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