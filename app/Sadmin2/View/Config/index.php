<include file='app/Sadmin/View/header.php'>
  
<form class="form-horizontal" method="post" onsubmit="return post();">
<?php foreach ($data as $k => $v): ?>
    <div class="form-group">
        <label for="{{$v['value']}}" class="col-sm-2 control-label">{{$v['title']}}</label>
        <div class="col-sm-10 form-group-lg">
          {{$v['html']}}
        </div>
    </div>
<?php endforeach ?>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>

<script>
    function post() {
        $.post("{{U('update')}}",$('form').serialize(),function(result){
            alert(result.message);
        });

        return false;
    }
</script>