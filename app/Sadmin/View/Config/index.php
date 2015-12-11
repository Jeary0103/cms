<include file='app/Sadmin/View/header.php'>
<div class="link">
    <a href="{{U('index')}}" class="btn btn-primary">网站配置</a>
   

</div>
<form class="form-horizontal" method="post" onsubmit="return post();">  
    <?php foreach ($data as $k => $v): ?>
        <div class="form-group">
          <label for="name" class="col-sm-2 control-label">{{$v['title']}}</label>
          <div class="col-sm-10">
            {{$v['html']}}
          </div>
        </div>
    <?php endforeach ?>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" value="Sign in" class="btn btn-default" />
    </div>
  </div>
</form>
<script>

function post() {
  $.post('{{U('post')}}',$('form').serialize(),function (result){
      alert(result.message);
  });
  return false;
}














    // function post() {
    //     $.post("{{U('update')}}",$('form').serialize(),function(result){
    //         alert(result.message);
    //     });
    //     return false;
    // }
</script>

