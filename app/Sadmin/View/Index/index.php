<include file='app/Sadmin/View/header.php'>
<body>

<div id="top" class="h45">
    <div class="left">
        <img src="app/Sadmin/View/image/logo.png" height="55" width="120" alt="">
    </div>
    <div class="right h45 w300">
        <p>Hallo: <span>小和尚</span><a href="{{U('Home/Index/index')}}">前台首页</a></p>
    </div>
</div>
<div id="main">
    <div class="left p20 h1000">
    <h4>项目管理</h4>
        <table class="table table-hover">
          <tr class="center">
              <td>
                <a href="http://cmstop.hd/?m=Sadmin&c=Category&a=index" target="frame">栏目列表</a>
              </td>
          </tr>
            <tr class="center">
                <td>
                  <a href="http://cmstop.hd/?m=Sadmin&c=Config&a=index" target="frame">网站配置</a>
                </td>
            </tr>
            <tr class="center">
                <td>
                  <a href="http://cmstop.hd/?m=Sadmin&c=Template&a=index" target="frame">模板选择</a>
                </td>
            </tr>
            <tr class="center">
                <td>
                  <a href="http://cmstop.hd/?m=Sadmin&c=Article&a=index" target="frame">文章管理</a>
                </td>
            </tr>
        </table>
    </div>

    <div class="left p80 h1000" id="right_main">
        <iframe src="" name="frame" id="frame" frameborder="0" class="p80 h1000"></iframe>
    </div>        
</div>
    </body>
</html>