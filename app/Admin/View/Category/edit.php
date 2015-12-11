{{include file="VIEW_PATH/header.php"}}

<body>
	<form method="post">
	<input type="hidden" name="id" value="{{$field['id']}}">
		<table class="hd-table hd-table-form hd-form">
			<thead>
				<tr>
					<td colspan="2">文章发表</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th width="100">父级</th>
					<td>
						<select name="pid">
						<option value="0">顶级栏目</option>
							{{foreach from="$data" key="$k" value="$v"}}
							<option value="{{$v['id']}}" {{$v['_disabled']}} {{$v['_selected']}}>{{$v['_name']}}</option>

							{{endforeach}}
						</select>
					</td>
				</tr>
				<tr>
					<th>栏目名称</th>
					<td>
						<input type="text" value="{{$field['catname']}}" name="catname" class="hd-w300">
					</td>
				</tr>
				<tr>
					<th>关键词</th>
					<td>
						<input type="text" value="{{$field['catkeyword']}}" name="catkeyword" class="hd-w300">
					</td>
				</tr>
				<tr>
					<th>描述</th>
					<td>
						<textarea name="catdesc" class="hd-w500 hd-h100">{{$field['catdesc']}}</textarea>
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