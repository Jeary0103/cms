
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>河南嘉展商贸有限公司</title>
<link href="http://localhost/Hausaufgabe/PHP_Hausaufgabe/self_cms/template/self/images/style.css" rel="stylesheet" type="text/css" />
<script src="http://localhost/Hausaufgabe/PHP_Hausaufgabe/self_cms/template/self/js/jquery.js" type="text/javascript"></script>
<script src="http://localhost/Hausaufgabe/PHP_Hausaufgabe/self_cms/template/self/js/nav1.js" language="JavaScript"></script>
<script src="http://localhost/Hausaufgabe/PHP_Hausaufgabe/self_cms/template/self/js/nav2.js" language="JavaScript"></script>
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
   <ol><img src="http://localhost/Hausaufgabe/PHP_Hausaufgabe/self_cms/template/self/images/index_r1_c21.jpg" /></ol>
   <!--nav-->
   <div class="nav_main">
  <div class="nav">
            <div class="menu nav_menu">
                <ul class="nav1" style="font-size: 100px;font-weight: 700;color: black">
                                  
                      <li class="mainlevel"><a 
                                        
                            href="/"
                                              >首页</a>
                          <ul>
                                                              </ul>
                      </li>
                  
                
                      <li class="mainlevel"><a 
                                                    href="list_2"
                        
                                     >新闻</a>
                          <ul>
                                            
                              <li><a href="list_10">政经要闻</a></li>
                            
                
                              <li><a href="list_11">区域新闻</a></li>
                            
                
                              <li><a href="list_12">金融投资</a></li>
                            
                
                              <li><a href="list_13">公司产业</a></li>
                            
                                  </ul>
                      </li>
                  
                
                      <li class="mainlevel"><a 
                                                    href="list_3"
                        
                                     >评论</a>
                          <ul>
                                                              </ul>
                      </li>
                  
                
                      <li class="mainlevel"><a 
                                                    href="list_4"
                        
                                     >观察</a>
                          <ul>
                                            
                              <li><a href="list_14">观察家</a></li>
                            
                
                              <li><a href="list_15">专栏作家</a></li>
                            
                
                              <li><a href="list_16">记者专栏</a></li>
                            
                                  </ul>
                      </li>
                  
                
                      <li class="mainlevel"><a 
                                                    href="list_5"
                        
                                     >多媒体</a>
                          <ul>
                                            
                              <li><a href="list_17">欢乐财经</a></li>
                            
                
                              <li><a href="list_18">半上流社会那些事</a></li>
                            
                
                              <li><a href="list_19">橙色视点</a></li>
                            
                                  </ul>
                      </li>
                  
                
                      <li class="mainlevel"><a 
                                                    href="list_6"
                        
                                     >生活</a>
                          <ul>
                                                              </ul>
                      </li>
                  
                
                      <li class="mainlevel"><a 
                                                    href="list_7"
                        
                                     >电子报</a>
                          <ul>
                                                              </ul>
                      </li>
                  
                
                      <li class="mainlevel"><a 
                                                    href="list_8"
                        
                                     >活动</a>
                          <ul>
                                                              </ul>
                      </li>
                  
                            
                </ul>
            </div>
            </div>
  </div>
 </div>
</div>
</div>

 <div id="focus">
        <ul>
            <li><a href="http://www.#.com/" target="_blank"><img src="http://localhost/Hausaufgabe/PHP_Hausaufgabe/self_cms/template/self/images/index_r3_c1.jpg"  /></a></li>
            <li><a href="http://www.#.com/" target="_blank"><img src="http://localhost/Hausaufgabe/PHP_Hausaufgabe/self_cms/template/self/images/index_r3_c1.jpg"  /></a></li>
            <li><a href="http://www.#.com/" target="_blank"><img src="http://localhost/Hausaufgabe/PHP_Hausaufgabe/self_cms/template/self/images/index_r3_c1.jpg"  /></a></li>
        </ul>
</div>

<div class="x_mu_ad">
 <ul>
  <li><a href="#" target="_blank"><img src="<?php echo __ROOT__?>/<?php echo __TEMPLATE__?>/images/index_r5_c1.jpg"  /></a></li>
  <li><a href="#" target="_blank"><img src="<?php echo __ROOT__?>/<?php echo __TEMPLATE__?>/images/index_r5_c13.jpg"  /></a></li>
  <li><a href="#" target="_blank"><img src="<?php echo __ROOT__?>/<?php echo __TEMPLATE__?>/images/index_r5_c14.jpg"  /></a></li>
  <li><a href="#" target="_blank"><img src="<?php echo __ROOT__?>/<?php echo __TEMPLATE__?>/images/index_r5_c19.jpg"  /></a></li>
  <li><a href="#" target="_blank"><img src="<?php echo __ROOT__?>/<?php echo __TEMPLATE__?>/images/index_r5_c22.jpg"  /></a></li>
  <li><a href="#" target="_blank"><img src="<?php echo __ROOT__?>/<?php echo __TEMPLATE__?>/images/index_r5_c23.jpg"  /></a></li>
  <li><a href="#" target="_blank"><img src="<?php echo __ROOT__?>/<?php echo __TEMPLATE__?>/images/index_r5_c27.jpg"  /></a></li>
 </ul>
</div>


<div class="notice">
 <ol><img src="<?php echo __ROOT__?>/<?php echo __TEMPLATE__?>/images/index_r8_c4.jpg" /></ol>
 <ul>
        <?php
        $data = Db::table('article');
        $data = $data->where('cid',20)->limit(3)->get();
        foreach ($data as $key => $field) {  
            $field['url']="article_{$field['id']}";
            ?>
            
          <li><a href="<?php echo $field['url']?>"><?php echo $field['title']?>[<?php echo date('m-d',$field['addtime'])?>]</a></li>
    
       <?php } ?>

 </ul>
</div>
<div class="main_inf">
 <!--left-->
 <div class="main_inf_left">
  <div class="r1_top"> 
       <?php
        $cid = Db::table('category')->where('catname',"每日点评")->pluck('id');
        $first['url'] = "list_$cid";
        $data = Db::table('article');
        $data = $data->where('cid',$cid)->orderBy('addtime','DESC')->limit(0,3)->get();
        foreach ($data as $key => $jinri) { 
            $jinri['url'] = "article_".$jinri['id']; ?>
            

    <?php if($key == 0){ ?>
       <p><a href="<?php echo $first['url']?>">每日点评</a></p>
        <span><a href="<?php echo $first['url']?>">更多>> </a></span>
  </div>
  <div class="r1_bot">
 
        <ol>
                <a href="<?php echo $jinri['url']?>" id="red"><?php echo $jinri['title']?></a><br />
                <?php echo $jinri['content']?>
        </ol>
        <ul>
    <?php } else {?>
             <li>[<?php echo date('m-y',$jinri['addtime'])?>] <a href="<?php echo $jinri['url']?>"><?php echo $jinri['title']?></a> </li>
    <?php } ?>
  
        <?php } ?>
   </ul>
  
  </div>

    <?php
        $cid = Db::table('category')->where('catname',"盘面播报")->pluck('id');
        $first['url'] = "list_$cid";
        $data = Db::table('article');
        $data = $data->where('cid',$cid)->orderBy('addtime','DESC')->limit(0,6)->get();
        foreach ($data as $key => $panmian) { 
            $panmian['url'] = "article_".$panmian['id']; ?>
            
<?php if($key == 0){ ?>
     <div class="r1_top" style="margin-top:10px;">
       <p><a href="<?php echo $first['url']?>">盘面播报</a></p>
       <span><a href="<?php echo $first['url']?>">更多>> </a></span>
      </div>
      <div class="r2_bot">
       <ol>
       <img src="<?php echo $panmian['thumb']?>" /> <a href="<?php echo $panmian['url']?>" ><?php echo $panmian['title']?></a><br />
      <?php echo $panmian['content']?>
       </ol><dl>
<?php } else {?>
    
     <dd>
        <a href="<?php echo $panmian['url']?>">
            <?php echo mb_substr($panmian['title'],0,20,'utf-8'); ?>
        </a>
    </dd>
    <?php } ?>

        <?php } ?>
   </dl>
  </div>
 </div>
 <!--left-->
 <!--mid-->
    <?php
        $cid = Db::table('category')->where('catname',"分析研究")->pluck('id');
        $first['url'] = "list_$cid";
        $data = Db::table('article');
        $data = $data->where('cid',$cid)->orderBy('addtime','DESC')->limit(0,10)->get();
        foreach ($data as $key => $fenxi) { 
            $fenxi['url'] = "article_".$fenxi['id']; ?>
            
<?php if($key==0){?>
                
    <div class="main_inf_mid">
    <div class="main_inf_mid_top" >
        <p><a href="<?php echo $first['url']?>">分析研究</a></p>
        <span><a href="<?php echo $first['url']?>">更多>> </a></span>
    </div>
     <ol>
        <img src="<?php echo $fenxi['thumb']?>" /> <a href="<?php echo $fenxi['url']?>" id="red" ><?php echo $fenxi['title']?></a><br />
        <?php echo mb_substr($fenxi['content'],0,80,'utf-8'); ?>
    </ol>
<?php }else if($key==1){?>
    <ol>
       <img src="<?php echo $fenxi['thumb']?>" /> <a href="<?php echo $fenxi['url']?>" id="red" ><?php echo $fenxi['title']?></a><br />
       <?php echo mb_substr($fenxi['content'],0,30,'utf-8'); ?>
   </ol>
<?php }else if($key==2){?>
    <div class="div_li">
    <dl>
    <dd><a href="<?php echo $fenxi['url']?>"><?php echo $fenxi['title']?> </a></dd>
<?php }else{?>
    <dd><a href="<?php echo $fenxi['url']?>"><?php echo $fenxi['title']?></a></dd>

               <?php }?>

        <?php } ?>
</dl>
   </div>
 </div>
 <!--mid-->
 <!--right-->
<div class="main_inf_right">
    <?php
        $cid = Db::table('category')->where('catname',"黄金交易价值")->pluck('id');
        $first['url'] = "list_$cid";
        $data = Db::table('article');
        $data = $data->where('cid',$cid)->orderBy('addtime','DESC')->limit(0,1)->get();
        foreach ($data as $key => $jinsu) { 
            $jinsu['url'] = "article_".$jinsu['id']; ?>
            
        <div class="s1_top">
        <a href="<?php echo $first['url']?>">贵金属交易价格</a>
        </div>
    <div class="s1_bot">
        
       <img src="<?php echo $jinsu['thumb']?>" />
    </div>

        <?php } ?>
    <?php
        $cid = Db::table('category')->where('catname',"资讯导读")->pluck('id');
        $first['url'] = "list_$cid";
        $data = Db::table('article');
        $data = $data->where('cid',$cid)->orderBy('addtime','DESC')->limit(0,5)->get();
        foreach ($data as $key => $zixun) { 
            $zixun['url'] = "article_".$zixun['id']; ?>
            
    <?php if($key==0){?>
                
    <div class="s1_top">
        <a href="<?php echo $first['url']?>">资讯导读</a>
    </div>
    <div class="s2_bot">
        <dl>
        <dd><a href="<?php echo $zixun['url']?>"><?php echo $zixun['title']?></a></dd>
    <?php }else{?>
        <dd><a href="<?php echo $zixun['url']?>"><?php echo $zixun['title']?></a></dd>
    
               <?php }?>
    
        <?php } ?>
        </dl>
    </div>
    <div class="ad_right">
        <img src="<?php echo __ROOT__?>/<?php echo __TEMPLATE__?>/images/index_r24_c26.jpg" />
    </div>
</div>
 <!--right-->
</div>

<!--ad-->
<div class="ad_main"><img src="<?php echo __ROOT__?>/<?php echo __TEMPLATE__?>/images/index_r28_c2.jpg" /></div>
<!--ad-->

<!--信息-->
<div class="main_inf">
 <!--left-->
<div class="main_inf_left">
    <?php
        $cid = Db::table('category')->where('catname',"交易指南")->pluck('id');
        $first['url'] = "list_$cid";
        $data = Db::table('article');
        $data = $data->where('cid',$cid)->orderBy('addtime','DESC')->limit(0,6)->get();
        foreach ($data as $key => $jiaoyi) { 
            $jiaoyi['url'] = "article_".$jiaoyi['id']; ?>
            
    <?php if($key==0){?>
                
    <div class="r1_top">
        <p><a href="<?php echo $first['url']?>">交易指南</a></p>
        <span><a href="<?php echo $first['url']?>">更多>> </a></span>
    </div>
    <div class="j_yi_bot">
    <ul>
        <li><em>开户指南</em><a href="<?php echo $jiaoyi['url']?>"> <?php echo $jiaoyi['title']?>… 详情></a></li>
    <?php }else{?>
        <li><em>开户指南</em><a href="<?php echo $jiaoyi['url']?>"> <?php echo $jiaoyi['title']?>… 详情></a></li>
    
               <?php }?>

        <?php } ?>
    </ul>
    </div>
    <div class="r1_top">

    <?php
        $cid = Db::table('category')->where('catname',"常见问题")->pluck('id');
        $first['url'] = "list_$cid";
        $data = Db::table('article');
        $data = $data->where('cid',$cid)->orderBy('addtime','DESC')->limit(0,6)->get();
        foreach ($data as $key => $changjian) { 
            $changjian['url'] = "article_".$changjian['id']; ?>
            
    <?php if($key==0){?>
                
        <p><a href="<?php echo $first['url']?>">常见问题</a></p>
        <span><a href="<?php echo $first['url']?>">更多>> </a></span>
    </div>
    <div class="j_yi_bot1">
    <dl>
        <dd><span><?php echo date("m-d",$changjian['addtime'])?></span><a href="<?php echo $changjian['url']?>"><?php echo $changjian['title']?></a></dd>
    <?php }else{?>
        <dd><span><?php echo date("m-d",$changjian['addtime'])?></span><a href="<?php echo $changjian['url']?>"><?php echo $changjian['title']?></a></dd>
    
               <?php }?>

        <?php } ?>
   </dl>
  </div>
 </div>
 <!--left-->
 <!--mid-->
 <div class="main_inf_mid1">
   <div class="main_inf_mid_top" >
   <p><a href="#">学习园地</a></p>
   <span><a href="#">更多>> </a></span>
  </div>
  <!--1-->
  <div id="Tab6">
    <div class="Menubox6">
      <ul>
       <li class="hover" onmouseover="setTab('two',1,5)" id="two1">
      <a href="#">投资入门</a>
     </li>
     <li onmouseover="setTab('two',2,5)" id="two2">
       <a href="#">基本面分析</a>
     </li>
     <li onmouseover="setTab('two',3,5)" id="two3">
       <a href="#">技术面分析</a>
     </li>
     <li onmouseover="setTab('two',4,5)" id="two4">
       <a href="#">投资技巧 </a>
     </li>
     
    </ul>
    </div>
    <div class="Contentbox6">
    <div class="hover" id="con_two_1"> 
     <div class="j_yi_bot1">
  <dl>
    <dd><span>12-20</span><a href="#">喜迎双节：礼迎圣诞，价给元旦 </a></dd>
    <dd><span>12-20</span><a href="#">12月最实惠：年终促冲量，直省30% </a></dd>
    <dd><span>12-20</span><a href="#">喜迎双节：礼迎圣诞，价给元旦 </a></dd>
    <dd><span>12-20</span><a href="#">12月最实惠：年终大促冲量，直省30% </a></dd>
   </dl>
  </div>
    </div>
    <div style="display:none" id="con_two_2">
    <div class="j_yi_bot1">
  <dl>
    <dd><span>12-20</span><a href="#">喜迎双节：f圣诞，价给元旦 </a></dd>
    <dd><span>12-20</span><a href="#">12月最实惠：年终促冲量，直省30% </a></dd>
    <dd><span>12-20</span><a href="#">喜迎双节：礼迎圣诞，价给元旦 </a></dd>
    <dd><span>12-20</span><a href="#">12月最实惠：年终大促冲量，直省30% </a></dd>
   </dl>
  </div>
    </div>
    <div style="display:none" id="con_two_3">
    <div class="j_yi_bot1">
  <dl>
    <dd><span>12-20</span><a href="#">喜迎双节：礼迎圣诞，价给元旦 </a></dd>
    <dd><span>12-20</span><a href="#">12月最实惠：年终促冲量，直省30% </a></dd>
    <dd><span>12-20</span><a href="#">喜迎双节：礼迎圣诞，价给元旦 </a></dd>
    <dd><span>12-20</span><a href="#">12月最实惠：年终大促冲量，直省30% </a></dd>
   </dl>
  </div>
    </div>
    <div style="display:none" id="con_two_4">
    <div class="j_yi_bot1">
  <dl>
    <dd><span>12-20</span><a href="#">喜迎双节：礼迎圣诞，价给元旦 </a></dd>
    <dd><span>12-20</span><a href="#">12月最实惠：年终促冲量，直省30% </a></dd>
    <dd><span>12-20</span><a href="#">喜迎双节：礼诞，价给元旦 </a></dd>
    <dd><span>12-20</span><a href="#">12月最实惠：年终大促冲量，直省30% </a></dd>
   </dl>
  </div>
    </div>
    <div style="display:none" id="con_two_5">
    <div class="j_yi_bot1">
  <dl>
    <dd><span>12-20</span><a href="#">喜迎双节：礼迎圣诞，价给元旦 </a></dd>
    <dd><span>12-20</span><a href="#">12月最实惠：年终促冲量，直省30% </a></dd>
    <dd><span>12-20</span><a href="#">喜迎双节：礼迎圣诞，价给元旦 </a></dd>
    <dd><span>12-20</span><a href="#">12月最实惠：年终大促冲量，直省30% </a></dd>
   </dl>
  </div>
    </div>
   </div>
  </div>
  <!--1-->
    <?php
        $cid = Db::table('category')->where('catname',"媒体报道")->pluck('id');
        $first['url'] = "list_$cid";
        $data = Db::table('article');
        $data = $data->where('cid',$cid)->orderBy('addtime','DESC')->limit(0,6)->get();
        foreach ($data as $key => $meiti) { 
            $meiti['url'] = "article_".$meiti['id']; ?>
            
    <?php if($key==0){?>
                
        <div class="main_inf_mid_top" style="margin-top:18px" >
        <p><a href="<?php echo $first['url']?>">媒体报道</a></p>
        <span><a href="<?php echo $first['url']?>">更多>> </a></span>
        </div>
        <div class="j_yi_bot1">
        <dl>
        <dd><span><?php echo date("m-d",$meiti['addtime'])?></span><a href="#"><?php echo $meiti['title']?></a></dd>
    <?php }else{?>
        <dd><span><?php echo date("m-d",$meiti['addtime'])?></span><a href="#"><?php echo $meiti['title']?></a></dd>
    
               <?php }?>

        <?php } ?>
   </dl>
  </div>
 </div>
 <!--mid-->
 <!--right-->
 <div class="main_inf_right1">
  <div class="main_inf_ad">
   <ul>
    <li><a href="#"><img src="<?php echo __ROOT__?>/<?php echo __TEMPLATE__?>/images/index1_r43_c44.jpg" /></a></li>
    <li><a href="#"><img src="<?php echo __ROOT__?>/<?php echo __TEMPLATE__?>/images/index_r45_c44.jpg" /></a></li>
   </ul>
  </div>
  <div class="s1_top">
   <a href="#">资讯导读</a>
  </div>
  <div class="s2_bot">
   <dl>
    <dd><a href="#">喜迎双节：礼迎圣诞，价给元旦 </a></dd>
    <dd><a href="#">12月最实惠：年终促冲量，直省30% </a></dd>
    <dd><a href="#">喜迎双节：礼迎圣诞，价给元旦 </a></dd>
    <dd><a href="#">12月最实惠：年终大促冲量，直省30% </a></dd>
    <dd><a href="#">喜迎双节：礼迎圣诞，价给元旦 </a></dd>
    <dd><a href="#">12月最实惠：年终大促冲量，直省30% </a></dd>
    <dd><a href="#">喜迎双节：礼迎圣诞，价给元旦 </a></dd>
   </dl>
  </div>
 </div>
 <!--right-->
</div>
<!--信息-->





























<div class="team_main">
 <ol>
  <img src="http://localhost/Hausaufgabe/PHP_Hausaufgabe/self_cms/template/self/images/index1_r42_c12.jpg" />
 </ol>
 <ul>
  <li><a href="#"><img src="http://localhost/Hausaufgabe/PHP_Hausaufgabe/self_cms/template/self/images/index_r48_c20.jpg"  /></a></li>
  <li><a href="#"><img src="http://localhost/Hausaufgabe/PHP_Hausaufgabe/self_cms/template/self/images/index_r48_c24.jpg" /></a></li>
  <li><a href="#"><img src="http://localhost/Hausaufgabe/PHP_Hausaufgabe/self_cms/template/self/images/index_r48_c20.jpg"  /></a></li>
  <li><a href="#"><img src="http://localhost/Hausaufgabe/PHP_Hausaufgabe/self_cms/template/self/images/index_r48_c24.jpg" /></a></li>
  <li><a href="#"><img src="http://localhost/Hausaufgabe/PHP_Hausaufgabe/self_cms/template/self/images/index_r48_c20.jpg"  /></a></li>
 </ul>
</div>
<!--合作单位-->
<!--链接-->
<div class="links">
<b>友情链接：</b> <a href="#">腾讯财经网</a> 新浪财经网 天津贵金属交易所 天津煜展贵金属 凤凰黄金 金融界 东方财富网 腾讯黄金 和讯黄金 新浪财经 南方稀贵金属交易所
</div>
<!--链接-->
<!--版权-->
<div class="copy_bg">
 <div class="copyright">
  <dl>
   <dt>
    <img src="http://localhost/Hausaufgabe/PHP_Hausaufgabe/self_cms/template/self/images/indeh_r50_c8.jpg" />
   </dt>
   <dd>
   <a href="#">人才招聘</a> | <a href="#">隐私申明</a> | <a href="#">常见问题</a> | <a href="#">联系我们</a> | <a href="#">网站地图</a><br />
Copyright(c)2012-2013 www.0371au.com All Rights Reserved   免费服务热线：0371-55013581 豫ICP备12024871号-1
   </dd>
  </dl>
 </div>
</div>
<!--版权-->
</body>
</html>
