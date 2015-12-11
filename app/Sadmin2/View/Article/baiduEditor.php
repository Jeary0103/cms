<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>UEditorMINI</title>
    <link rel="stylesheet" href="public/public-demo.css" type="text/css">
    <link rel="stylesheet" href="public/onlinedemo.css" type="text/css">

    <link href="public/umeditor/themes/default/css/umeditor.min.css" type="text/css" rel="stylesheet">
    <style type="text/css">
        .disabled {
            opacity: 0.5;
            cursor: default;
            *filter: alpha( opacity=50 );
        }
        .links a{
            color: #ff5400;
            margin-right: 5px;
        }
        .links a.green{
            color: green;
        }
    </style>

    <script src="public/umeditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="public/umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="public/umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="public/umeditor/lang/zh-cn/zh-cn.js"></script>

</head>
<body>
<div id="wrapper">


<div id="content" class="w900 border-style1 bg">
    
    <div style="width:800px;margin:20px auto 40px;">
        <script type="text/plain" id="editor" style="width:100%;height:360px;"></script>
    </div>
</div>
</div>

<script type="text/javascript">
    var serverPath = '/server/umeditor/',
        um = UM.getEditor('editor', {
            imageUrl:serverPath + "imageUp.php",
            imagePath:serverPath,
            lang:/^zh/.test(navigator.language || navigator.browserLanguage || navigator.userLanguage) ? 'zh-cn' : 'en',
            langPath:UMEDITOR_CONFIG.UMEDITOR_HOME_URL + "lang/",
            focus: true
        });

 

</script>
<div style="display:none">
    <script type="text/javascript">
        var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
        document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F3dee3eb2a97e7b6c323e44f08568ed8b' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <script type="text/javascript" src="http://img.baidu.com/hunter/ueditor.js"></script>
</div>
</body>
</html>