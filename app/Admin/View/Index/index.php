{{include file="VIEW_PATH/header.php"}}

<body>
	{{css file="__VIEW__/Index/css/css.css"}}
	<div id="top-menu">
		<div class="t-r-menu">
			小明 <a href="{{U('Admin/Login/out')}}" target="_self">[退出]</a>
			<span>|</span>
			<a href="{{__ROOT__}}" target="_blank">前台首页</a>
		</div>
	</div>
	<!--内容区Start-->
	<div class="main">
		<!--左侧菜单Start-->
		<div id="leftMenu">
			<div class="leftMenuBlock">
				<dl>
				<dt>栏目管理</dt>
					<dd>
						<a href="{{__ROOT__}}?m=Admin&c=Category&a=index" target="frame" >栏目列表</a>
					</dd>
				</dl>
				<dl>
				<dt>网站配置</dt>
					<dd>
						<a href="{{__ROOT__}}?m=Admin&c=Config&a=index" target="frame" >网站配置</a>
					</dd>
					<dd>
						<a href="{{__ROOT__}}?m=Admin&c=Template&a=index" target="frame" >模板选择</a>
					</dd>
				</dl>
				<dl>
				<dt>文章管理</dt>
					<dd>
						<a href="{{__ROOT__}}?m=Admin&c=Article&a=index" target="frame" >文章管理</a>
					</dd>
				</dl>
				<dl>
				<dt>权限管理</dt>
					<dd>
						<a href="{{__ROOT__}}?m=Admin&c=Role&a=index" target="frame" >用户组</a>
					</dd>
					<dd>
						<a href="{{__ROOT__}}?m=Admin&c=Admin&a=index" target="frame" >管理员</a>
					</dd>
					<dd>
						<a href="{{__ROOT__}}?m=Admin&c=Node&a=index" target="frame" >权限节点</a>
					</dd>
				</dl>
				<dl>
				<dt>生成静态</dt>
					<dd>
						<a href="{{__ROOT__}}?m=Admin&c=Html&a=createHome" target="frame" >首页生成</a>
					</dd>
					<dd>
						<a href="{{__ROOT__}}?m=Admin&c=Html&a=createArticleConfig" target="frame" >内容页生成</a>
					</dd>
					<dd>
						<a href="{{__ROOT__}}?m=Admin&c=Html&a=createCategoryConfig" target="frame" >列表生成</a>
					</dd>
				</dl>
				<dl>
				<dt>网站备份</dt>
					<dd>
						<a href="{{__ROOT__}}?m=Admin&c=Backup&a=backup" target="frame" >备份</a>
					</dd>
					<dd>
						<a href="{{__ROOT__}}?m=Admin&c=Backup&a=recovery" target="frame" >还原</a>
					</dd>
				</dl>
			</div>
		</div>
		<!--左侧菜单End-->
		<!--右侧区域Start-->
		<div id="content">
			
			<div class="show">
				<iframe src="" name="frame" id="frame" frameborder="0"></iframe>
			</div>
		</div>
		<!--右侧区域End-->
	</div>
	<!--内容区End-->

</body>
</html>