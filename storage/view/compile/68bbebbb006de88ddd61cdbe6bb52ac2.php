<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>河南嘉展商贸有限公司</title>
<link href="<?php echo __ROOT__?>/<?php echo __TEMPLATE__?>/images/style.css" rel="stylesheet" type="text/css" />
<script src="<?php echo __ROOT__?>/<?php echo __TEMPLATE__?>/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo __ROOT__?>/<?php echo __TEMPLATE__?>/js/nav1.js" language="JavaScript"></script>
<script src="<?php echo __ROOT__?>/<?php echo __TEMPLATE__?>/js/nav2.js" language="JavaScript"></script>
<!--jiaodian-->
<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>

            <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
            <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" rel="stylesheet">
            <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        
<script type="text/javascript">
$(function() {
    var sWidth = $("#focus").width(); //获取焦点图的宽度（显示面积）
    var len = $("#focus ul li").length; //获取焦点图个数
    var index = 0;
    var picTimer;
    
    //以下代码添加数字按钮和按钮后的半透明条，还有上一页、下一页两个按钮
    var btn = "<div class='btnBg'></div><div class='btn'>";
    for(var i=0; i < len; i++) {
        btn += "<span></span>";
    }
    btn += "</div><div class='preNext pre'></div><div class='preNext next'></div>";
    $("#focus").append(btn);
    $("#focus .btnBg").css("opacity",0.5);

    //为小按钮添加鼠标滑入事件，以显示相应的内容
    $("#focus .btn span").css("opacity",0.4).mouseenter(function() {
        index = $("#focus .btn span").index(this);
        showPics(index);
    }).eq(0).trigger("mouseenter");

    //上一页、下一页按钮透明度处理
    $("#focus .preNext").css("opacity",0.2).hover(function() {
        $(this).stop(true,false).animate({"opacity":"0.5"},300);
    },function() {
        $(this).stop(true,false).animate({"opacity":"0.2"},300);
    });

    //上一页按钮
    $("#focus .pre").click(function() {
        index -= 1;
        if(index == -1) {index = len - 1;}
        showPics(index);
    });

    //下一页按钮
    $("#focus .next").click(function() {
        index += 1;
        if(index == len) {index = 0;}
        showPics(index);
    });

    //本例为左右滚动，即所有li元素都是在同一排向左浮动，所以这里需要计算出外围ul元素的宽度
    $("#focus ul").css("width",sWidth * (len));
    
    //鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
    $("#focus").hover(function() {
        clearInterval(picTimer);
    },function() {
        picTimer = setInterval(function() {
            showPics(index);
            index++;
            if(index == len) {index = 0;}
        },4000); //此4000代表自动播放的间隔，单位：毫秒
    }).trigger("mouseleave");
    
    //显示图片函数，根据接收的index值显示相应的内容
    function showPics(index) { //普通切换
        var nowLeft = -index*sWidth; //根据index值计算ul元素的left值
        $("#focus ul").stop(true,false).animate({"left":nowLeft},300); //通过animate()调整ul元素滚动到计算出的position
        //$("#focus .btn span").removeClass("on").eq(index).addClass("on"); //为当前的按钮切换到选中的效果
        $("#focus .btn span").stop(true,false).animate({"opacity":"0.4"},300).eq(index).stop(true,false).animate({"opacity":"1"},300); //为当前的按钮切换到选中的效果
    }
});

</script>

<!--jiaodian-->
<!--切换-->
<script>
<!--
/*第一种形式 第二种形式 更换显示样式*/
function setTab(name,cursel,n){
for(i=1;i<=n;i++){
var menu=document.getElementById(name+i);
var con=document.getElementById("con_"+name+"_"+i);
menu.className=i==cursel?"hover":"";
con.style.display=i==cursel?"block":"none";
}
}
//-->
</script>
<!--切换-->
</head>

<body>

<!--top-->
<div class="top_bg">
 <div class="log_nav">
  <div class="log_ad">
   <ol><img src="<?php echo __ROOT__?>/<?php echo __TEMPLATE__?>/images/index_r1_c21.jpg" /></ol>
   <!--nav-->
   <div class="nav_main">
  <div class="nav">
            <div class="menu nav_menu">
                <ul class="nav1" style="font-size: 100px;font-weight: 700;color: black">
                          <?php
        $db = Db::table("category");

        switch('top')
        {
            case 'top':
                //顶级
            $data = $db->where('pid',0)->logic('AND')->whereNotIn('id',array (
  0 => '20',
))->where('sichtbar',1)->get();
            break;
            case 'self':
                //同级
            $pid = $db->where('id',0)->pluck('pid');
            $data = $db->where('pid',$pid)->get();
            break;
            case 'son':
            $data = $db->where('pid',0)->get();
            break;
        }
        foreach($data as $field):
            $field['url']="list_{$field['id']}";
            ?>
        
                      <li class="mainlevel"><a 
                        <?php if($field['id']==1){?>
                
                            href="/"
                        <?php }else{?>
                            href="<?php echo $field['url']?>"
                        
               <?php }?>
                      ><?php echo $field['catname']?></a>
                          <ul>
                                    <?php
        $db = Db::table("category");

        switch('son')
        {
            case 'top':
                //顶级
            $data = $db->where('pid',0)->logic('AND')->whereNotIn('id',array (
  0 => '20',
))->where('sichtbar',1)->get();
            break;
            case 'self':
                //同级
            $pid = $db->where('id',$field['id'])->pluck('pid');
            $data = $db->where('pid',$pid)->get();
            break;
            case 'son':
            $data = $db->where('pid',$field['id'])->get();
            break;
        }
        foreach($data as $field):
            $field['url']="list_{$field['id']}";
            ?>
        
                              <li><a href="<?php echo $field['url']?>"><?php echo $field['catname']?></a></li>
                            
        <?php endforeach;
    ?>
                          </ul>
                      </li>
                  
        <?php endforeach;
    ?>
                    
                </ul>
            </div>
            </div>
  </div>
 </div>
</div>
</div>

 <div id="focus">
        <ul>
            <li><a href="http://www.#.com/" target="_blank"><img src="<?php echo __ROOT__?>/<?php echo __TEMPLATE__?>/images/index_r3_c1.jpg"  /></a></li>
            <li><a href="http://www.#.com/" target="_blank"><img src="<?php echo __ROOT__?>/<?php echo __TEMPLATE__?>/images/index_r3_c1.jpg"  /></a></li>
            <li><a href="http://www.#.com/" target="_blank"><img src="<?php echo __ROOT__?>/<?php echo __TEMPLATE__?>/images/index_r3_c1.jpg"  /></a></li>
        </ul>
</div>