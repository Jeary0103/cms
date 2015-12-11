<include file='app/Sadmin/View/header.php'>
<form class="form-horizontal" method="post">  
  <input type="hidden" name="id" value="{{$data['id']}}">
    <div class="form-group">
    <span class="col-sm-2 control-label">栏目分类：</span>
    <div class="col-sm-10">
        <select class="form-control col-sm-10"  name="pid">
            <option value="0">顶级栏目</option>
            <?php foreach ($data2 as $key => $value): ?>
                <option value="{{$value['id']}}"
                {{$value['_selected']}} {{$value['_disabled']}}
                >{{$value['_name']}}</option>
            <?php endforeach ?>
        </select>
        </div>
    </div>
  <div class="form-group">
    <label for="catname" class="col-sm-2 control-label">标题名</label>
    <div class="col-sm-10">
      <input type="text" name="catname" class="form-control" id="catname" placeholder="标题栏名称" value="{{$data['catname']}}">
    </div>
  </div>
  <div class="form-group">
    <label for="catkeyword" class="col-sm-2 control-label">关键字</label>
    <div class="col-sm-10">
      <input name="catkeyword" type="text" class="form-control" id="catkeyword" placeholder="关键字" value="{{$data['catkeyword']}}">
    </div>
  </div>
  <div class="form-group">
    <label for="catdesc" class="col-sm-2 control-label">描述</label>
    <div class="col-sm-10">
        <textarea name="catdesc" class="form-control" id="catdesc" style="resize: none"> {{$data['catdesc']}}</textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" value="Sign in" class="btn btn-default" />
    </div>
  </div>
</form>