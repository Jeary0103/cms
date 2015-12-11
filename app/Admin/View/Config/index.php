{{include file="VIEW_PATH/header.php"}}

<body>
	

    <div class="hd-menu-list">
        <ul>
            <li class="active">
               <a href="#">配置管理</a>
           </li>
       </ul>
   </div>

   <!-- <form onsubmit="return post();"> -->
   <form action="{{U('update')}}" method="post">
       <table class="hd-table hd-table-form hd-form">
        <thead>
            <tr>
                <td colspan="3">配置管理</td>
            </tr>
        </thead>
        <tbody>
            {{foreach from="$data" key="$k" value="$v"}}
                <tr>
                    <th width="100">{{$v['title']}}</th>
                    <td>
                       {{$v['html']}}
                   </td>
                   <td>
                       {{$v['tips']}}
                   </td>
               </tr>
           {{endforeach}}
           <tr>
               <td colspan="3">
                   <input type="submit" class="hd-btn hd-btn-primary">
               </td>
           </tr>
       </tbody>
   </table>
</form>
<script>
    function post()
    {
        $.post("{{U('update')}}",$('form').serialize(),function(result){
            hd_alert({
                message: result.message,//显示内容
                timeout: 1,//显示时间
                success: function () {//这是回调函数

                }
            })
        });
        return false;
    }
</script>
</body>
</html>











