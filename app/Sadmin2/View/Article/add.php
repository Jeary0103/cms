<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Default Examples</title>
        <style>
            form {
                margin: 0;
            }
            textarea {
                display: block;
            }
        </style>
        <bootstraps/>
        <link rel="stylesheet" href="public/kindeditor/themes/default/default.css" />
        <script charset="utf-8" src="public/kindeditor/kindeditor-min.js"></script>
        <script charset="utf-8" src="public/kindeditor/lang/zh_CN.js"></script>
        <script>
            var editor;
            KindEditor.ready(function(K) {
                editor = K.create('textarea[name="content"]', {
                    allowFileManager : true,
                    uploadJson : '{{U('contentImageUpload')}}',
                    fileManagerJson : '../asp/file_manager_json.asp',
                    allowFileManager : true
                });

            });
        </script>
    </head>
    <body>
        <script type="text/javascript"><!--
        google_ad_client = "ca-pub-7116729301372758";
        /* 更多演示（728x90） */
        google_ad_slot = "5052271949";
        google_ad_width = 728;
        google_ad_height = 90;
        //-->
        </script>
        <script type="text/javascript"
        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>
<!-- <form method="post" onsubmit="return post();"> -->
<form method="post">
<table class="table table-hover">
        <tr>
            <td>栏目</td>
            <td>
                <select name="cid" id="">
                <?php foreach ($data as $k => $v): ?>
                    <option value="{{$v['id']}}">{{$v['_name']}}</option>
                <?php endforeach ?>
                    
                </select>
            </td>
        </tr>
        <tr>
            <td>
                标题
            </td>
            <td>
                <input type="text" name="title" />
            </td>
        </tr>
        <tr>
            <td>缩略图</td>
            <style type="text/css">
                #pre img{height: 150px;}
            </style>
            <td><div id="pre">
        </div>
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>上传图片</span>
                    <!-- 上传按钮 -->
                    <input id="fileupload" type="file" name="thumb">
                </span>
                    <!-- 上传成功文件显示区 -->
                    <!-- <div id="files" class="files"></div> -->
                    <link rel="stylesheet" href="public/uploadify/css/style.css">
                    <link rel="stylesheet" href="public/uploadify/css/jquery.fileupload.css">
                    <script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
                    <script src="public/uploadify/js/vendor/jquery.ui.widget.js"></script>
                    <script src="public/uploadify/js/jquery.iframe-transport.js"></script>
                    <script src="public/uploadify/js/jquery.fileupload.js"></script>
                    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
                    <script>
                        $(function () {
                            var url = "{{U('updateThumb')}}";
                            $('#fileupload').fileupload({
                                url: url,
                                dataType: 'json',
                                done: function (e, data) {
                                    var img = "<img src='"+data.result.url+"'  />";
                                    $('#pre').html(img);
                                }
                        });
                        });
                    </script>
            </td>
        </tr>
        <tr>
            <td>正文</td>
            <td>
                <textarea name="content" style="width:800px;height:400px;visibility:hidden;"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                点击次数
            </td>
            <td>
                <input type="text" name="click" />
            </td>
        </tr>
        <tr>
            <td>
                添加时间
            </td>
            <td>
                <script src="public/cal/lhgcalendar.min.js"></script>
                <input type="text" value="{{date('Y/m/d')}}" readonly="readonly" id="addtime" name="addtime" class="hd-w150">
                <script>
                    $(function () {
                        $('#addtime').calendar({format: 'yyyy/MM/dd'});
                    })
                </script>

            </td>
        </tr>
        <tr>
            <td><input type="submit" /></td>
        </tr>
        </table>
        </form>
    </body>


<!--     <script>
    function post() {
        $.post("{{U('add')}}",$('form').serialize(),function (result){
            if(result.errcode===0) {
                location.href = "{{U('index')}}";
            } else{
                alert(result.message);
            }
        },'json');    } 
    </script> -->
</html>
