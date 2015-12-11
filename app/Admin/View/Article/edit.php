{{include file="VIEW_PATH/header.php"}}

<body>
	<form method="post" >
		<input type="hidden" name="id" value="{{$field['id']}}">
		<table class="hd-table hd-table-form hd-form">
			<thead>
				<tr>
					<td colspan="2">发表文章</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th width="100">栏目</th>
					<td>
						<select name="cid">
							{{foreach from="$cat" key="$k" value="$v"}}
								<option value="{{$v['id']}}" 
								{{if value="$v['id']==$field['cid']"}} selected {{endif}}>{{$v['_name']}}</option>
							{{endforeach}}
						</select>
					</td>
				</tr>
				<tr>
					<th>标题</th>
					<td>
						<input type="text" name="title" value="{{$field['title']}}" class="hd-w300">
					</td>
				</tr>
				<tr>
					<th>缩略图</th>
					<td>
						<style type="text/css">
							div#pre img
							{
								width:150px;
								height:150px;
							}
						</style>
						<div id='pre'>
							{{if value="$field['thumb']"}}
								<img src="{{__ROOT__}}/{{$field['thumb']}}"/>
							{{endif}}
						</div>
						<input type="hidden" name="thumb" id="thumb" value="{{$field['thumb']}}">
						{{if value="$field['thumb']"}}
						<span class="btn btn-success fileinput-button btn-sm" style="display:none;">
								<i class="glyphicon glyphicon-plus"></i>
								<span>上传缩略图</span>
								<!-- 上传按钮 -->
								<input id="fileupload" type="file" >
							</span>
						{{else}}
							<span class="btn btn-success fileinput-button btn-sm">
								<i class="glyphicon glyphicon-plus"></i>
								<span>上传缩略图</span>
								<!-- 上传按钮 -->
								<input id="fileupload" type="file" name="file" >
						
						{{endif}}


							<!-- 上传成功文件显示区 -->
							<div id="files" class="files"></div>
							<link rel="stylesheet" href="public/uploadify/css/style.css">
							<link rel="stylesheet" href="public/uploadify/css/jquery.fileupload.css">
							<link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
							<script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
							<script src="public/uploadify/js/vendor/jquery.ui.widget.js"></script>
							<script src="public/uploadify/js/jquery.iframe-transport.js"></script>
							<script src="public/uploadify/js/jquery.fileupload.js"></script>
							<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
							<script>
								$(function () {
									var url = '{{U('uploadThumb')}}';
									$('#fileupload').fileupload({
										url: url,
									// dataType: 'json',
									done: function (e, data) {
										//显示上传成功的缩略图
										var img = "<img src='"+data.result.url+"'/>";
										$("#pre").append(img);
										//将地址放入表单准备存入数据库
										$("#thumb").val(data.result.path);
									}
								})
								});
							</script>
						</td>
					</tr>
					<tr>
						<th>正文</th>
						<td>
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
							<textarea name="content" style="width:800px;height:400px;visibility:hidden;">{{$field['content']}}</textarea>
						</td>
					</tr>
					<tr>
						<th>查看次数</th>
						<td>
							<input type="text" name="click" class="hd-w300" value="{{$field['click']}}">
						</td>
					</tr>
					<tr>
						<th>发表时间</th>
						<td>
							<script src="public/cal/lhgcalendar.min.js"></script>
							<input type="text" value="{{date('Y/m/d',$field['addtime'])}}" readonly="readonly" id="addtime" name="addtime" class="hd-w150">
							<script>
								$(function () {
									$('#addtime').calendar({format: 'yyyy/MM/dd'});
								})
							</script>

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