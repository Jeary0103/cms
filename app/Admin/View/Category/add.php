{{include file="VIEW_PATH/header.php"}}

<body>
	<form method="post">
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
							<option value="0">顶级目录</option>}
							option
							{{foreach from="$data" key="$k" value="$v"}}
							<option value="{{$v['id']}}"
							{{if value="$pid==$v['id']"}}
							selected=""
							{{endif}}
							>{{$v['_name']}}</option>

							{{endforeach}}
						</select>
					</td>
				</tr>
				<tr>
					<th>栏目名称</th>
					<td>
						<input type="text" name="catname" class="hd-w300">
					</td>
				</tr>
				<tr>
					<th>关键词</th>
					<td>
						<input type="text" name="catkeyword" class="hd-w300">
					</td>
				</tr>
				<tr>
					<th>描述</th>
					<td>
						<textarea name="catdesc" class="hd-w500 hd-h100"></textarea>
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