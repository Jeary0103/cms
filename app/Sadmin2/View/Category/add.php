<include file='app/Sadmin/View/header.php'>
  
<form class="form-horizontal" method="post">
  <select class="form-control name='pid">
    <option value="0">顶级新闻</option>
    <?php foreach ($data as $k => $v): ?>
        <option value="{{$v['_name']}}"
        <?php if ($pid==$v['id']): ?>
          selected = ''
        <?php endif; ?>
        >{{$v["_name"]}}</option>}
    <?php endforeach ?>
  </select>
  <div class="form-group">
    <label for="catname" class="col-sm-2 control-label">栏目名称</label>
    <div class="col-sm-10 form-group-lg">
      <input type="text" class="form-control" id="catname" name="catname">
    </div>
  </div>
  <div class="form-group">
    <label for="catkeyword" class="col-sm-2 control-label">关键字</label>
    <div class="col-sm-10 form-group-lg">
      <input type="text" class="form-control" id="catkeyword" name="catkeyword">
    </div>
  </div>
  <div class="form-group">
    
    <div class="col-sm-10 form-group-lg">
      <label class="col-sm-2 control-label">描述</label>
    <div class="col-sm-10 form-group-lg">
      <textarea class="form-control" rows="13" name="catdesc" style="height:300px;width: 80%;resize: none"></textarea>
    </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>