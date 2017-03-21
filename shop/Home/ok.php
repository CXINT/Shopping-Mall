<?php
session_start();
?>
<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta property="qc:admins" content="56207406376255516375">
<title>收银台</title>
<link rel="dns-prefetch" href="http://f0.jmstatic.com/">
<link rel="dns-prefetch" href="http://f1.jmstatic.com/">
<link rel="dns-prefetch" href="http://f2.jmstatic.com/">
<link rel="dns-prefetch" href="http://f3.jmstatic.com/">
<link rel="dns-prefetch" href="http://f4.jmstatic.com/">
<link rel="dns-prefetch" href="http://f5.jmstatic.com/">

</head>
<body>
<div id="cboxOverlay" style="display: none;"></div>
<div id="colorbox" class="" style="padding-bottom: 50px; padding-right: 50px; display: none;">
  <div id="cboxWrapper">
    <div>
      <div id="cboxTopLeft" style="float: left;"></div>
      <div id="cboxTopCenter" style="float: left;"></div>
      <div id="cboxTopRight" style="float: left;"></div>
    </div>
    <div style="clear:left">
      <div id="cboxMiddleLeft" style="float: left;"></div>
      <div id="cboxContent" style="float: left;">
        <div id="cboxLoadedContent" style="width: 0px; height: 0px; overflow: hidden;" class=""></div>
        <div id="cboxLoadingOverlay" class=""></div>
        <div id="cboxLoadingGraphic" class=""></div>
        <div id="cboxTitle" class=""></div>
        <div id="cboxCurrent" class=""></div>
        <div id="cboxNext" class=""></div>
        <div id="cboxPrevious" class=""></div>
        <div id="cboxSlideshow" class=""></div>
        <div id="cboxClose" class=""></div>
      </div>
      <div id="cboxMiddleRight" style="float: left;"></div>
    </div>
    <div style="clear:left">
      <div id="cboxBottomLeft" style="float: left;"></div>
      <div id="cboxBottomCenter" style="float: left;"></div>
      <div id="cboxBottomRight" style="float: left;"></div>
    </div>
  </div>
  <div style="position:absolute; width:9999px; visibility:hidden; display:none"></div>
</div>
<style type="text/css">
.cart_header{
    width: 960px;
    margin: 0 auto;
}
.cart_header_box{
    border-bottom: 2px solid #e5e5e5;
    box-shadow: 0px 1px 2px rgba(0,0,0,0.1);
    padding-bottom: 15px;
}
.cart_header .logo_box{
    float: left;
}
.cart_header .order_path{
    float: right;
    width: 377px;
    height: 48px;
}
.cart_header .order_path_1{
    background: url(http://f0.jmstatic.com/static_cart/dist/20161202_2/images/order_path.png) no-repeat;
    background-position: -2px -2px;
}
.cart_header .order_path_2{
    background: url(http://f0.jmstatic.com/static_cart/dist/20161202_2/images/order_path.png) no-repeat;
    background-position: -2px -54px;
}
.cart_header .order_path_3{
    background: url(http://f0.jmstatic.com/static_cart/dist/20161202_2/images/order_path.png) no-repeat;
    background-position: -2px -106px;
}
.cart_header .order_path_4{
    background: url(http://f0.jmstatic.com/static_cart/dist/20161202_2/images/order_path.png) no-repeat;
    background-position: -2px -158px;
}
.cart_top{
    position: relative;
    height: 32px;
    line-height: 32px;
    color: #999999;
    width: 960px;
    margin: 0 auto;
}
.cart_top .user_box{
    position: absolute;
    right: 0;
    top: 0;
}
.cart_top .user_box .tips{
    font-style: normal;
    color: #dddddd;
    padding: 0 5px;
}
.cart_top .user_box .out,.cart_top .user_box .query{
    color: #999999;
}
.cart_top .user_box a:hover{text-decoration: none;color: #ed145b;}
</style>
<div style="background: white;">
  <div class="cart_top">
    <div class="user_box" id="JS_user_box">
      <div>

      	    <span>您好，</span>
            <a href=""><?=$_SESSION['homeInfo']['username']?></a>
            <a href="action.php?a=logout" class="user" style="color:#FF0066;">退出登录</a> | 
            <a href="./usercenter.php">用户中心</a>
      </div>
    </div>
  </div>
  <div class="cart_header_box">
    <div class="cart_header clearfix">
      <h1 class="logo_box"> <a href="http://www.jumei.com/?from=cart_add" target="_blank" id="home"> <img src="./ok/cart_logo.jpg" alt="化妆品团购"> </a> </h1>
      <div class="order_path order_path_4
                                    "> </div>
    </div>
  </div>
</div>
<div id="container" style="width: auto;">
<link rel="stylesheet" href="./ok/cashier.css">
 
<div id="container">
    <div id="cart">
      <form action="" method="post" id="check_pay_form" onsubmit="return false;" autocomplete="off">
        <div class="main_content" data-reactid=".0">
          <div class="payment" id="payment-method" data-reactid=".0.0">
            <h2 class="title" data-reactid=".0.0.0">最后一步，请尽快付款！</h2>
            <div class="order-info" data-reactid=".0.0.2">
<!-- 在付款页显示订单金额 -->
<?=
$oid = $_GET['oid'];
include '../Public/config.php';
        $link = mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败');
        mysqli_set_charset($link, 'utf8');  
        $sql = "select total from shop_orders where id = $oid";
        // var_dump($sql);
        
        $res = mysqli_query($link, $sql);
        if ($res && mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) {

              echo"<div class='fl price-box' >
                    <span >应付金额：</span>
                    <span class='price' >
                      <span>¥</span>
                      <span>{$row['total']}</span>
                    </span>
                  </div>";
  }
}
?>
<!-- 在付款页显示收货地址 -->
<?php
$oid = $_GET['oid'];
@include '../Public/config.php';
      $link = mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败');
      mysqli_set_charset($link, 'utf8');
      $sql = "select * from shop_address where id in(select aid from shop_orders where id = $oid)";
      // var_dump($sql);
      // exit;

      $res = mysqli_query($link, $sql);
      if ($res && mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) {
            echo "<div class='fl deliver-info'>
                    <span class='address' ><b style='color:#FF0066;'>收货信息</b>：<p>收件人：{$row['name']}</p><p>收货地址：{$row['address']}</p><p>联系电话：{$row['phone']}</p>
                    </span>
                  </div>";
  }          
}
?> 
            </div>
            <div class="confirm_pay main_content clearfix" style="padding-top:35px;" data-reactid=".0.0.9">
              <div class="submit_box clearfix" data-reactid=".0.0.9.0">
                <div class="fr" data-reactid=".0.0.9.0.0"><a href="./pay.php" class="submit_btn" id="JS_btn_confirm_pay">立即支付</a></div>
              </div>
            </div>
            <noscript data-reactid=".0.0.a">
            </noscript>
            <noscript data-reactid=".0.0.b">
            </noscript>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script type="text/javascript" src="./收银台 - 聚美优品_files/website.min.js"></script><!--http://f0.jmstatic.com/static_lib/dist/20141111/website.min.js--> 
  <script type="text/javascript" src="./收银台 - 聚美优品_files/boot.js"></script> 
  <!--<script>--> 
  <!--    var cashier = window.GLOBAL.initData;--> 
  <!--    seajs.use("views/cashier/index", function(index){--> 
  <!--        index.init(cashier);--> 
  <!--    });--> 
  <!--</script>--> 
  
  <script src="./收银台 - 聚美优品_files/es5-shim.min.jsh"></script> 
  <script src="./收银台 - 聚美优品_files/es5-sham.min.js"></script> 
  <script src="./收银台 - 聚美优品_files/react.min.js"></script> 
  <script src="./收银台 - 聚美优品_files/react-dom.min.js"></script> 
  <script src="./收银台 - 聚美优品_files/index.js"></script> 
</div>
<div id="footer_container">
  <div id="footer_textarea">
    <div class="footer_con" id="footer_copyright">
      <p class="footer_copy_con"> © 2013 北京创锐文化传媒有限公司 Jumei.com 保留一切权利。客服热线：400-123-8888 <br>
        京公网安备 11010102001226 | <a href="http://www.miibeian.gov.cn/" target="_blank" rel="nofollow">京ICP证111033号</a> | 食品流通许可证 SP1101051110165515（1-1）
        | <a href="http://p2.jmstatic.com/activity/2013_chuangrui.jpeg" target="_blank">营业执照</a> </p>
      <p> <a href="javascript:void(0)" class="footer_copy_logo logo01"></a> <a href="https://www.itrust.org.cn/yz/pjwx.asp?wm=1693268180" target="_blank" class="footer_copy_logo logo02"></a> <a href="javascript:void(0)" class="footer_copy_logo logo03"></a> <a href="javascript:void(0)" class="footer_copy_logo logo04"></a> <a href="https://ss.cnnic.cn/verifyseal.dll?sn=e12070911010031011307708&amp;ct=df&amp;pa=453163" target="_blank" class="footer_copy_logo logo05"></a> </p>
      <script>function change_urlknet(eleId){var str= document.getElementById(eleId).href;var str1 =str.substring(0,(str.length-6));str1+=RndNum(6);document.getElementById(eleId).href=str1;}function RndNum(k){var rnd="";for (var i=0;i<k;i++){rnd+=Math.floor(Math.random()*10);}return rnd;}</script> 
    </div>
  </div>
</div>
<script type="text/javascript">
    //ga
(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = 'http://s0.jmstatic.com/templates/jumei/js/jquery/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

})();


//baidu tongji
(function() {
    var baidu_tongji = document.createElement('script'); baidu_tongji.type = 'text/javascript';
    baidu_tongji.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'hm.baidu.com/h.js?884477732c15fb2f2416fb892282394b';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(baidu_tongji, s);
})();
</script> 

</body>
</html>


