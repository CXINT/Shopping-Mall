<?php
session_start();
// var_dump($_SESSION);
// var_dump($_GET);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script charset="utf-8" src="./v.js"></script>
<script src="./saved_resource"></script>
<script src="./saved_resource(1)"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="qc:admins" content="56207406376255516375">
    <title>个人中心-宝贝评价</title>
<script type="text/javascript" async="" src="./rt.js"></script>
<script type="text/javascript" src="./h.js"></script>
<script type="text/javascript" async="" src="./dc.js"></script>
<script type="text/javascript" async="" src="./adw.js"></script>
<script type="text/javascript" charset="utf-8" src="./ty_rum.js"></script>

<link rel="stylesheet" href="./usercenter/jumei.min.css" type="text/css" media="screen" charset="utf-8">
<link rel="stylesheet" type="text/css" href="./usercenter/app.css">
<link rel="stylesheet" href="./usercenter/jumei_usercenter.min.css" type="text/css" media="screen" charset="utf-8">
    
<script type="text/javascript">
with(window) {
    RM_SITE_MAIN_WEBBASEURL='http://www.jumei.com/';
RM_SITE_MAIN_WEBBASEURL_BACK='http://www.jumei.com/';
RM_SITE_PASSPORT_WEBBASEURL='http://passport.jumei.com/';
RM_SITE_MAIN_TOPLEVELDOMAINNAME='jumei.com';
RM_CONTROL='Order';
RM_ACTION='list';
RM_IMGDIR='http://p0.jmstatic.com/templates/jumei/images';
    RM_CLIENT_TIME = parseInt((new Date()).getTime() / 1000);
            GA_ACCOUNT = "UA-10208510-1";
    }
var screen_wide = document.documentElement.clientWidth > 1200 ? true : false ;
// var SiteSwitch = '{$SiteSwitch}';

function getCookie(name)
{
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
    if(arr=document.cookie.match(reg))
        return (arr[2]);
    else
        return null;
}
RM_UID = getCookie('uid') || 0;
RM_NICKNAME = null;
if ( getCookie('nickname') != null ){
    RM_NICKNAME = decodeURIComponent(getCookie('nickname'));
}
var is_semwinner = false;
if(getCookie('etc_n') == 'true'){
    is_semwinner = true;
}

window._adwq = window._adwq || [];
_adwq.push(['_setAccount', '1ng4e']);
_adwq.push(['_setDomainName', '.jumei.com']);
_adwq.push(['_trackPageview']);

window._gaq = window._gaq || [];
_gaq.push(['_setAccount', GA_ACCOUNT]);
_gaq.push(['_addOrganic', 'baidu', 'wd']);
_gaq.push(['_addOrganic', 'baidu', 'word']);
_gaq.push(['_addOrganic', 'm.baidu', 'word']);
_gaq.push(['_addOrganic', 'wap.baidu', 'word']);
_gaq.push(['_addOrganic', 'baidu', 'kw']);
_gaq.push(['_addOrganic', 'baidu', 'q1']);
_gaq.push(['_addOrganic', 'baidu', 'q2']);
_gaq.push(['_addOrganic', 'baidu', 'q3']);
_gaq.push(['_addOrganic', 'baidu', 'q4']);
_gaq.push(['_addOrganic', 'baidu', 'q5']);
_gaq.push(['_addOrganic', 'baidu', 'q6']);
_gaq.push(['_addOrganic', 'so.com', 'q']);
_gaq.push(['_addOrganic', 'image.baidu', 'word']);
_gaq.push(['_addOrganic', 'soso', 'w']);
_gaq.push(['_addOrganic', 'vnet', 'kw']);
_gaq.push(['_addOrganic', 'sogou', 'query']);
_gaq.push(['_addOrganic', 'youdao', 'q']);
_gaq.push(['_addIgnoredOrganic', 'jumei.com']);
_gaq.push(['_addIgnoredOrganic', 'www.jumei.com']);
_gaq.push(['_addIgnoredOrganic', 'jumei']);
_gaq.push(['_addIgnoredOrganic', '聚美']);
_gaq.push(['_addIgnoredOrganic', '聚美优品']);
_gaq.push(['_addIgnoredOrganic', 'tuanmei.net']);
_gaq.push(['_addIgnoredOrganic', 'www.tuanmei.net']);
_gaq.push(['_addIgnoredOrganic', 'tuanmei']);
_gaq.push(['_addIgnoredOrganic', '团美']);
_gaq.push(['_addIgnoredRef', 'jumei']);
_gaq.push(['_addIgnoredRef', 'tuanmei']);
_gaq.push(['_setDomainName', '.jumei.com']);
_gaq.push(['_setAllowHash', false]);
_gaq.push(['_trackPageview']);

window.jumeiSstatistics = window.jumeiSstatistics || [];

window.jumeiSstatisticsAction = '';

jumeiSstatistics.push(['log', '']);
jumeiSstatistics.push(['lo', '']);
jumeiSstatistics.push(['sid', '']);
jumeiSstatistics.push(['cl', '']);
jumeiSstatistics.push(['mat', '']);
jumeiSstatistics.push(['bs', '[]']);
jumeiSstatistics.push(['ps', '[]']);
jumeiSstatistics.push(['uid', '']);
jumeiSstatistics.push(['tm', '']);
jumeiSstatistics.push(['act', '']);
jumeiSstatistics.push(['aci', '[]']);
jumeiSstatistics.push(['ip', '']);

</script>

<script type="text/javascript" charset="utf-8" src="./website.min.js"></script>
<script type="text/javascript" charset="utf-8" src="./jquery.all_plugins_v1.min.js"></script>
<script type="text/javascript" charset="utf-8" src="./Jumei.Account.js"></script>
<script type="text/javascript" charset="utf-8" src="./Jumei.Core.min.js"></script>

</head>
<!-- KEEP THIS!
<body>
-->
<body class="OnSale"><div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" style="padding-bottom: 50px; padding-right: 50px; display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear:left"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxLoadedContent" style="width: 0px; height: 0px; overflow: hidden;" class=""></div><div id="cboxLoadingOverlay" class=""></div><div id="cboxLoadingGraphic" class=""></div><div id="cboxTitle" class=""></div><div id="cboxCurrent" class=""></div><div id="cboxNext" class=""></div><div id="cboxPrevious" class=""></div><div id="cboxSlideshow" class=""></div><div id="cboxClose" class=""></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear:left"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position:absolute; width:9999px; visibility:hidden; display:none"></div></div>

    <!--当前控制器和方法开始-->

<script language="javascript" type="text/javascript">
    var new_user_control_24 = 'order',
        new_user_action_24 = 'list',
        new_user_registerType_24 = '';
        new_user_redirct_24 = '';
</script>

<!--当前控制器和方法结束-->
<!--爆款开始-->
            <div class="newUserShade">
            </div>
            <div class="newUserCash">
                <div class="nuCashNum">
                    
                </div>
                <div class="nuCashTime">
                    <span class="num1"></span>
                    <span class="num2"></span>
                    <span class="num3"></span>
                </div>
                <div class="nuCashClose">
                </div>
                <!-- <div class="nuCashDelay png">
                </div>
                <div class="nuCashDelaySuccess"$logistic_corps>
                    延期
                </div> -->
                <div class="nuCashBang">
                    <p>聚美顾客都爱以下<span> 爆款单品</span>，使用现金券享超低价格</p>
                    <div class="nuCashBangPrev">
                    </div>
                    <div class="nuCashBangNext">
                    </div>
                    <div class="nuCashBangWrap">
                        <ul class="sell-list clearfix">
                        </ul>
                    </div>
                </div>
                <div class="browseHisBox">
                   <div class="seven_browselit">这是您曾经浏览的商品，使用现金券享超低价格，赶快抢购吧！</div>
                   <div class="nuCashBangPrev">
                    </div>
                    <div class="nuCashBangNext">
                    </div>
                    <div class="nuCashIbarWrap">
                        <ul class="broList clearfix">
                           
                        </ul>
                    </div>
                </div>
                <div class="answerCash">
                    <div class="select_a"></div>
                    <div class="select_b"></div>
                    <!-- <div class="select_c"></div> -->
                </div>
                <div class="shouquan">
                    <div class="cash_btn">知道了, 去领现金券</div>
                </div>
                <div class="cash_5">
                    <div class="go_shopping"></div>
                </div>
                <!--有效期-->
                <div class="qi_wen">
                    <div class="select_a"></div>
                    <div class="select_b"></div>
                    <!-- <div class="select_c"></div> -->
                </div>
                <div class="genuine">
                    <div class="cash_10">知道了, 去领现金券</div>
                </div>
                <div class="qi_wenquan">
                    <div class="xiang_quan"></div>
                </div>
            </div>
            <div class="lastCash">
                <div class="seven_litle">感谢回访，再次送上新手福利，愿您尽享优惠今日领取并下单，最高立减<em>70</em>元</div>
                <div class="cash_but">领取现金券</div>
                <a class="cash_buta" href="" target="_blank">领取现金券</a>
                <div class="receive_sucess">165元现金券已冲入到您的账户！</div>
                <div class="nuCashBang7">
                    <div class="seven_baolit">聚美顾客都爱以下<span> 爆款单品</span>，使用现金券享超低价格</div>
                    <div class="nuCashBangPrev">
                    </div>
                    <div class="nuCashBangNext">
                    </div>
                    <div class="nuCashBangWrap">
                        <ul class="sell-list clearfix">
                        </ul>
                    </div>
                </div>
                <div class="browseHisBox">
                   <div class="seven_browselit">这是您曾经浏览的商品，使用现金券享超低价格，赶快抢购吧！</div>
                   <div class="nuCashBangPrev">
                    </div>
                    <div class="nuCashBangNext">
                    </div>
                    <div class="nuCashIbarWrap">
                        <ul class="broList clearfix">
                           
                        </ul>
                    </div>
                </div>
                <div class="nuCashClose"></div>
            </div>
        <!--爆款结束-->
<div class="new_header_ab">
<div class="header header_wide_lv1 w960">
    <div class="header_top">
        <div class="header_top_box">
            <ul class="header_top_left" id="headerTopLeft">
                <li class="signin">欢迎您，
                    <a href=""><?=@$_SESSION['homeInfo']['username']?></a>
                    <a href="action.php?a=logout" class="user">退出登录</a> 
                </li>
            </ul>
            <div class="default-city">
                <span class="add-city-icons">
                    送至<span class="add-default-city">&nbsp;</span>
                    <s class="icon_arrow_down"></s>
                    <i class="user-local-icon"></i>
                </span>
                <div class="header-city-list"></div>
            </div>
            <ul class="header_top_right" id="headerTopRight">
                <li><a href="http://i.jumei.com/i/order/list" rel="nofollow">订单查询</a></li>
                <li><a href="http://i.jumei.com/i/product/fav_brands" rel="nofollow"><s class="icon_favorite"></s>收藏的品牌</a></li>
                <li class="item_ijumei">
                    <a href="http://i.jumei.com/i/order/list" rel="nofollow">我的聚美<s class="icon_arrow_down"></s></a>
                    <div class="sub_nav">
                        <ul>
                            <li><a href="http://i.jumei.com/i/order/list" rel="nofollow">我的订单</a></li>
                                                        <li><a href="http://i.jumei.com/i/membership/show_promocards" rel="nofollow">我的现金券</a></li>
                            <li><a href="" rel="nofollow">我的红包</a></li>
                            <li><a href="" rel="nofollow">我的余额</a></li>
                            <li><a href="" rel="nofollow">我的收藏</a></li>
                            <li><a href="" rel="nofollow">我的心愿单</a></li>
                            <li><a href="" rel="nofollow">会员中心</a></li>
                            <li><a href="" rel="nofollow">兑换礼品卡</a></li>
                        </ul>
                    </div>
                </li>
                <li class="item_mobile">
                    <a href="" rel="nofollow"><span class="line"></span><s class="icon_mobile"></s>手机聚美</a></li>
                <li class="item_koubei"><a href=""><s class="icon_koubei"></s>口碑中心</a></li>
                <li>
                    <span class="line"></span>
                </li>
                <li class="item_more">
                    <a href="">更多<s class="icon_arrow icon_arrow_down"></s></a>
                    <div class="sub_nav">
                        <s class="icon_arrow_up"></s>
                        <s class="icon_arrow_inner"></s>
                        <ul>
                            <li><a href="" target="_blank" rel="nofollow">邀请好友</a></li>
                            <li><a href="" rel="nofollow" id="bookmark_us"><span class="bottomline">加入收藏</span></a></li>
                            <li><a href="" class="er_box" rel="nofollow" target="_blank">新浪微博<span style="display: none;"><img src="./sina_er.png"></span></a></li>
                            <li><a href="" class="er_box" rel="nofollow">聚美微信<span style="display: none;"><img src="./jumei_weixin_header1.png"></span></a></li>
                            <li><a href="" class="er_box" target="_blank">百度贴吧</a></li>
                            <li><a href="" class="er_box" rel="nofollow" target="_blank">腾讯微博<span style="display: none;"><img src="./qq_er.png"></span></a></li>
                            <li><a href="" class="er_box" rel="nofollow" target="_blank">人人公众主页<span style="display: none;"><img src="./renren_er.png"></span></a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

    </div>

    <div class="header_center  clearfix">
	        <h1 class="logo">
                    <a href="" id="home" title="聚美优品" style="background:url(./img/logo.jpg) no-repeat top left;">
                    化妆品品牌排行榜大全网站
                    聚美优品
                    </a>
            </h1>
        <div class="header_icon_wrap">
	        <div id="cart_box" class="cart_box">
	            <a id="cart" class="cart_link" href="http://cart.jumei.com/i/cart/show?from=header_cart" rel="nofollow">
	                <img src="./usercenter/cart.gif" width="28" height="28" class="cart_gif">
	                <span class="text">去购物车结算</span>
	                <span class="num" style="display: none;"></span>
	                <s class="icon_arrow_right"></s>
	            </a>
	
	            <div class="cart_content" id="cart_content">
	                <i class="cart-icons"></i>
	                <div class="cart_content_all">
	                    <div class="con_all">
	                        <div class="price_whole"><span>共<span class="num_all">1</span>件商品</span></div>
	                        <div><span class="price_gongji">共计<em>￥</em><span class="total_price">69</span></span><a href="http://cart.jumei.com/i/cart/show?from=header_cart" class="cart_btn" rel="nofollow">去购物车结算</a></div>
	                    </div>
	                </div>
	            </div>
	        </div>
        </div>
    </div>
    <div class="header_bottom">
        <div class="channel_nav_box">
            <div class="channel_nav_list_wrap clearfix">
            <ul class="channel_nav_list">
                    <li><a href="" class="home">首页</a></li>
                    <li class="haitao_li"><a href="" target="_blank">极速免税店</a><span></span></li>
                    <li class="gif_301_wrap"><a target="_blank" href="" class="gif_301">
                    <img src="./usercenter/mystatic.jpg">
                    </a></li> 
                    <li><a href="" style="width:70px;height: 38px;padding-left: 16px;padding-right: 16px;">美妆商城</a></li>  
                    <li class="gif_301_wrap"><a target="_blank" hr0ef="" class="gif_301"><img src="./usercenter/lux2.jpg"></a></li>
                    <li><a href="" target="_blank">服装运动</a></li>
                    <li><a href="" target="_blank">鞋包配饰</a></li>
            </ul>
            <div class="header_pop_subAtc box-shadow" id="header_pop_subAct">
            </div>
                <!-- 加判断 -->
                <ul id="icon_wrap" class="icon_Wrap">
                        <li>
                            <div class="divlist divlist01">
                                <a target="_blank" href="http://hd.jumei.com/act/6-478-2230-aca.html?from=top"><span></span> <b>品牌防伪码</b></a>
                            </div>
                        </li>
                        <li>
                            <div class="divlist divlist02">
                                    <a target="_blank" href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=header#unconditionally_backtrack"><span class="th"></span><b>美妆30天无理由退货</b></a>
                            </div>
                        </li>
                        <li>
                            <div class="divlist divlist03">
                                    <a target="_blank" href="http://www.jumei.com/help/two_for_freeshipping?from=header"><span class="by"></span> <b>美妆满2件或299包邮</b></a>
                            </div>
                        </li>
                </ul>
                <!-- 加判断 -->
            </div>
        </div> 
            </div>
</div>
</div><div class="profile">
<script src="./jquery.selectui.min.js"></script>
<script type="text/javascript">
var checkuid = 120753608;

    if(checkuid != $.cookie('uid')){
        $.getJSON('http://www.jumei.com/i/tools/diff_cookie?callback=?',{},function(){})
    }
</script>

<style>
 .profile .nav .giftcard b {
     background-image: url(http://f1.jmstatic.com/static_account/dist/20170104/images/gift_card/giftcard_menu_icon.png)
 }
</style>
<script src="./jquery.lightbox.min.js"></script>
<script src="./Jumei.Order.min.js"></script>
<link href="./jumei_lightbox.min.css" rel="stylesheet">
<script>
  function onImageLoadError() {
    this.src = 'http://s0.jmstatic.com/templates/jumei/images/v1.0/gift_default.jpg';
    this.onerror = null;
  }
</script>
<script type="text/javascript" src="./Jumei.Order.js"></script>
<script>
 $(function(){Jumei.Order.init()});
</script>
<div class="sp_icon_pos_wrapper">
</div>
<h1>
    <a href="./person_shop_detail.php" target="_blank">返回我的订单中心</a>
    评价宝贝
</h1>

<link rel="stylesheet" href="./jumei_onsale_layer.min.css">
<link rel="stylesheet" href="./jumei_lightbox.min.css">
<style>
.invoice_layer .invoice_type {position:relative;top:3px;}
.invoice_layer .invoice_label {padding-left:10px;}
.invoice_layer .invoice_company {margin-top:25px;width:360px;}
.invoice_layer .onsale_layer_wrap {padding: 20px 0 0;}
.invoice_layer .onsale_input_wrap {padding: 0 30px;}
.invoice_layer .invoice_btn_wrap {padding:15px 0;margin-top:20px;background:#fafafa;text-align:center;}
.invoice_layer .invoice_cancel {box-shadow:none;}
.invoice_layer [type="text"][disabled],.invoice_layer [type="text"][readonly] { background: #f1f1f1; }
.OnSale #cboxContent { background: none; box-shadow: none; }
.package_info {padding-top: 0;}
.package_info .p_logistic_name {padding-top: 8px;}
.p_status_green_wraper {margin: 12px auto;}
.safety_notice{position:relative;background:#feffe5;border:1px solid #efe68b;padding:6px 8px 6px 32px;margin-bottom:15px;font-family: '宋体'}
.safety_notice img{width:14px; height:14px;position:absolute;left:14px;_left:-20px;top:8px}
</style>
<div id="change_invoice" style="display:none;">
    <div class="onsale_layer invoice_layer" style="width:430px;">
        <p class="onsale_tit" id="addWishTit">发票抬头</p>
        <div class="onsale_layer_wrap">
            <div class="onsale_input_wrap">
                <input type="radio" value="个人" class="invoice_type" name="invoice_type" checked="true"><span class="invoice_label">个人</span>
                <input type="radio" value="单位" class="invoice_type" name="invoice_type"><span class="invoice_label">单位</span>
                <br>
                <input name="company" class="onsale_mobile invoice_company" type="text">
                <br>
                <br>
                <div class="onsale_layer_err" style="color:#fff;">请输入正确的单位名称</div>
            </div>
            <div class="onsale_input_wrap onsale_btn_wrap invoice_btn_wrap">
                <input type="button" value="确定" class="submit_subscribe">
                <input type="button" value="取消" class="submit_subscribe onsale_disabled invoice_cancel">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $('body').addClass('OnSale');

        $('body').delegate('.modify_invoice', 'click', function() {
            var target = $(this);
            var orderId = target.attr('order-id');
            // 获取
            $.ajax({
                url:"/i/order/invoice?order_id=" + orderId,
                dataType:"json",
                type:"get",
                success:function(response) {
                    if(response && !response.error) {
                        var dialog = $.colorbox({
                            html:$('#change_invoice').html(),
                            title:false
                        });

                        $('.invoice_company').keydown(function(e) {
                            if (e.keyCode == 32) {
                                e.preventDefault();
                                return false;
                            }
                        });

                        var submit = $('#colorbox').find('.submit_subscribe');
                        var cancel = $('#colorbox').find('.invoice_cancel');
                        var company = $('#colorbox').find('[name=company]');
                        var radio = $('#colorbox').find('.invoice_type');
                        var lastValue = '';
                        radio.unbind('click').bind('click', function() {
                            radio.removeAttr('checked');
                            $(this).attr('checked', true);

                            if(this == radio[0]) {
                                company.attr('readonly', true);
                                lastValue = company.val();
                                company.val('');
                            }else {
                                company.removeAttr('readonly');
                                company.val(lastValue);
                            }
                        });

                        // 初始化抬头数据
                        if(response.data && response.data.invoice_header) {
                            company.val('');
                            if(response.data.invoice_header == '个人') {
                                radio.eq(0).click();
                            }else {
                                radio.eq(1).click();
                                company.val(response.data.invoice_header);
                            }
                        }

                        submit.unbind('click').bind('click', function() {
                            // check
                            var data = {
                                commit:1
                            };
                            if(radio.eq(1).attr('checked')) {
                                data.invoice_header = company.val();
                                if(!data.invoice_header.length) {
                                    $('#colorbox').find('.onsale_layer_err').css('color', '#ed145b');
                                    return false;
                                }
                            }else {
                                data.invoice_header = '个人';
                            }
                            $('#colorbox').find('.onsale_layer_err').css('color', '#fff');

                            $.ajax({
                                url:"/i/order/invoice?order_id=" + orderId,
                                dataType:"json",
                                type:"post",
                                data:data,
                                success:function(response) {
                                    if(response && !response.error) {
                                        alert("修改成功");
                                        cancel.click();
                                    }
                                }
                            });
                        });
                        cancel.unbind('click').bind('click', function() {
                            $('#cboxOverlay').click();
                        });
                    }else {
                        alert(response.msg);
                        target.remove();
                    }
                }
            });
        });
    });
</script>

<div class="content">
<?php
$orderstatus = @$_GET['order_status'];
if($orderstatus !== '确认收货'){
echo '<script>alert("还没有收到商品,还不能评价哦~~~");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
        exit;
    }
// var_dump($_GET);
?>

    <form action="action.php?a=adduserAppraise&goodsname=<?=$_GET['goodsname']?>&goodspic=<?=$_GET['goodspic']?>&oid=<?=$_GET['oid']?>" method="post">
        <div style="width:200px;height:200px;float:left;border:1px solid;border-color: #EA58A5">
            <div style="width:150px;height:150px;margin:10px 0px 0px 25px;"><img alt='345' height='150' width='150' src="../Public/Goods/<?=$_GET['goodspic']?>" /></div>
            <div style="width:150px;height:40px;margin:0px 0px 10px 25px;text-align: center;line-height: 40px;"><font color="#FF0066"><?=$_GET['goodsname']?></font></div>
        </div>
        <div style="width:20px;height:200px;float:left"></div>
        <div style="width:700px;height:140px;float:left;">
            <textarea name="pingjia" style="width:400px;height:130px;"></textarea>
        </div>
        <div  style="width:700px;height:20px;float:left;">
            <input type="radio" value="1" name="radio" />满意
            <input type="radio" value="2" name="radio" />不满意<br />         
        </div>
        <div  style="width:700px;height:50px;float:left;">
            <input type="submit" value="提交" >
            <input type="submit" value="重置">
        </div>
    </form>
<!-- 订单详情编辑功能 -->
<!--<a href='edit.php?id={$row['id']}&oid={$row['oid']}'>编辑</a> -->       

        
<style type="text/css">
    .order_list_title {
      background-color: white;
    }
    .separator td {
      height: 15px;
      border-left: 1px solid white;
      border-right: 1px solid white;
    }

    #cboxOverlay{
        z-index: 10003;
    }
    #colorbox{
        z-index: 10004;
    }
    #cboxContent{
        border: none;
        background: #FF659B;
    }
    #cboxLoadedContent{
        margin-top:0px;
    }
    #cboxClose {
        background: url(http://p0.jmstatic.com/templates/jumei/images/wish_deal/popup_new_close.jpg) no-repeat 0 0 transparent;
        width: 12px;
        height: 11px;
        top:8px;
        margin-right: 0px;
        text-align: left;
        text-indent: -9999px;
        padding-right: 10px;
    }
    #cboxClose:hover{
        background: url(http://p0.jmstatic.com/templates/jumei/images/wish_deal/popup_new_close.jpg) no-repeat 0 0 transparent;
    }
    .popup_box_new {
        width: 400px;
        _padding-bottom:20px;
    }
    .popup_box_new .title{
        height: 28px;
        line-height: 28px;
        text-indent: 15px;
        background: url(http://p0.jmstatic.com/templates/jumei/images/wish_deal/title_bg.jpg) repeat-x 0 0 transparent;
        color:#fff;
        font-size: 14px;
    }
    .popup_box_new .cont{
        padding: 15px;
    }
    .popup_box_new p{
        margin-top:20px;
        font-size: 16px;
        text-align: left;
        overflow: hidden;
        font-family: '微软雅黑','YaHei','黑体',Tahoma,Helvetica,arial,sans-serif;
    }
    .popup_box_new .btns{
        padding-left: 88px;
    }
    .popup_box_new .btn{
        float: left;
        display: block;
        width: 88px;
        height: 28px;
        line-height: 28px;
        text-align: center;
        overflow: hidden;
        background: url(http://p0.jmstatic.com/templates/jumei/images/wish_deal/btn_new_bg.jpg) repeat-x 0 0 transparent;
        font-family: 宋体;
    }
    .popup_box_new p a:hover{
        text-decoration: none;
    }
    .popup_box_new .btns .btn_confirm{
        color:#fff;
        margin-right: 15px;
    }
    .popup_box_new .btns .btn_cancel{
        color:#333;
        border-left: 1px solid #ccc;
        border-right: 1px solid #ccc;
        background-position: 0 -32px;
    }
</style>
    <div class="dialog_s charge_dialog cancle_order_dialog" title="取消订单确认">
        <div class="alert warning"></div>
        <div class="cont">
            <p class="alert_con"></p>
            ﻿<span class="spark">*</span>
            <span class="select_ui"><div class="select_arrow"></div><div class="select_text_ui" style="min-width: 7.5em;">等待加载...</div><select id="select_reasons">
                <option value="0">等待加载...</option>
            </select></span>
            <textarea style="margin-top: 20px"></textarea>
            <p class="input_error"></p>
        </div>
        <div class="btns">
            <a href="javascript:void(0)" class="btn_mid_pink">确认</a>
            <a href="javascript:void(0)" class="btn_mid_grey">取消</a>
        </div>
    </div>

    <div class="colorbox_html_ask" style="display: none;">
        <div class="popup_box_new">
            <div class="title">红包退货</div>
            <div class="cont">
                <p class="tips">
                    您确定要将红包退货吗？退货会删除您所购买的红包，并且您不能再次购买红包。相应的退款会退回您的聚美余额。
                </p>
                <p class="btns">
                    <a class="btn btn_confirm" href="javascript:void(0);">确定</a>
                    <a class="btn btn_cancel" href="javascript:void(0);">取消</a>
                </p>
            </div>
        </div>
    </div>
    <div class="colorbox_html_success" style="display: none;">
        <div class="popup_box_new">
            <div class="title">红包退货</div>
            <div class="cont">
                <p class="tips">
                    红包已成功退货，相应退货已退回您的聚美余额。
                </p>
                <p class="btns" style="padding-left: 0px;">
                    <a href="http://i.jumei.com/i/account/balance" class="btn btn_confirm" style="margin-left:20px;width:150px;">前往我的余额</a>
                    <a href="javascript:void(0);" class="btn btn_cancel" style="width:100px;">知道了</a>
                </p>
            </div>
        </div>
    </div>
    <div class="colorbox_html_fail" style="display: none;">
        <div class="popup_box_new">
            <div class="title">红包退货</div>
            <div class="cont">
                <p class="tips">
                    您的红包已被使用。若需退货，需将使用红包的订单商品全部退货。
                </p>
                <p class="btns" style="padding-left: 0px; text-align: center;">
                    <a class="btn btn_cancel" href="javascript:void(0);" style="width:100px; float:none; margin: auto;">知道了</a>
                </p>
            </div>
        </div>
    </div>
<script type="text/javascript">
    function alert_item(number) {
        var number;
        alert("抱歉，该商品暂时缺货" + number + "个，我们将为您单独补发，不随本单发出。\r\n由于缺货商品目前紧缺，补货时间较长，如果您不愿等待，建议您选择将补发订单（在您的订单列表可见）直接退货。\r\n聚美为给您带来的不便深深致歉！");
    }
    function alert_item_order() {
        alert("抱歉，本订单有部分商品缺货，我们将为您单独补发，不随本单发出。\r\n由于缺货商品目前紧缺，补货时间较长，如果您不愿等待，建议您选择将补发订单（在您的订单列表可见）直接退货。\r\n聚美为给您带来的不便深深致歉！");
    }

function cancel_red_envelope(order_id){
    var order_id;
    var html = $('.colorbox_html_ask').html();
    $.colorbox({html:html,title:false},function(){
        // 确定退红包
        $('.btn_confirm').click(function(e){
            e.preventDefault();
            $.ajax({
                url:"/i/ajax/cancel_red_envelope?order_id=" + order_id,
                success:function(data){
                    var data = $.parseJSON(data);

                    if ( data.type == 'success' ){
                        var html_success = $('.colorbox_html_success').html();
                        $('#cboxLoadedContent').html(html_success);
                        $('.btn_cancel').click(function(e){
                                e.preventDefault();
                                $('#cboxClose').click();
                        });
                    }else{
                        var html_fail = $('.colorbox_html_fail').html();
                        $('#cboxLoadedContent').html(html_fail);
                        $('.btn_cancel').click(function(e){
                                e.preventDefault();
                                $('#cboxClose').click();
                        });
                    }
                }
           });
        });

        // 取消按钮
        $('.btn_cancel').click(function(e){
            e.preventDefault();
            $('#cboxClose').click();
        });

    });
/*
    if(confirm("您确定要退货吗？退货会删除您所购买的红包，并且不能再次购买红包。"))
    {
           $.ajax({
                   url:"/i/ajax/cancel_red_envelope?order_id=" + order_id,
                   success:function(data){
                           var data = $.parseJSON(data);
                           alert(data.msg);
                   }
           });
    }
    */
}
</script>
    <div class="pageSplit">
            </div>
            <style>
        .cross_sale .price {
            font-size: 18px;
        }
        .cross_sale .price strong{
            font-size: 24px;
        }
        </style>
</div>
<div class="dc_fix"><a href="http://www.diaochapai.com/survey900699" target="_blank"></a></div>

<style>
    .profile td a.sp_icon {
        display: inline-block;
    }
    .order_package span {
        padding-right: 0;
    }
    .profile .filter+table th {
        border: 1px solid rgb(219, 214, 208);
        border-top: 0;
    }
</style>

<style type="text/css">
#dialog2{display: block;height:207px;width: 394px;position: relative;padding-top:30px;overflow:hidden;}
#cboxContent{border:none;background:url(http://p0.jmstatic.com/templates/jumei/images/account/corn_line.jpg) repeat-x bottom center;background-color:#767676;}
#cboxLoadedContent{margin-top:28px;}
#cboxTitle{font-size:14px;color:#FFF;top:0px;}
#cboxClose{top:0;text-indent:9999px;height:28px;overflow:hidden;}
.dia_pic{width:120px;height:120px;float:left;background:url(http://p0.jmstatic.com/templates/jumei/images/account/corn_00.jpg) no-repeat 20px;}
.dia_con{width:250px;margin-left:20px;float:left;color:#333;}
.dia_con p{font-size:12px;line-height:22px;}
.dia_con p.dia_title{font-size:20px;line-height:36px;font-weight:bold;}
.return{width:74px;height:27px;text-align:center;line-height:27px;background:url(http://p0.jmstatic.com/templates/jumei/images/home/btn_mid_pink.jpg) no-repeat top center;display:inline-block;color:#FFF;font-size:14px;letter-spacing: 2px;margin:20px 0 0 140px;}
.return:hover{text-decoration:none;}
</style>

<script>
    $(function(){
        var uidd = $.cookie("uid") || "";

        if ( uidd .length > 0 ){
            $('#links').show();
            $('#links_v2').hide();
        }else{
            $('#links').hide();
            $('#links_v2').show();
            return false;
        }

        $(".cuidan_now").click(function(){
            $.colorbox({html:'<div id="dialog2"><div class="dia_pic"></div><div class="dia_con"><p class="dia_title">请求已发送</p><p>我们已通知快递公司  中通总部</p><p>您的订单：**********</p><p>快递单号：***********</p><p>需要加急发货，请您耐心等待！</p></div><a class="return" id="fanhui" href="javascript:;">关闭</a></div>',
                title:'快递催单'});
        });
        $("#fanhui").live("click",function(){
            $("#cboxClose").click();
        });

    });
</script>
<style>
 #table-header-fixed {
   width: 769.5px;
   position: fixed;
   top: 0px; display:none;
   z-index: 2;
 }
 #table-header-fixed th {
   font-weight: normal;
   background: none;
   color: #afafaf;
 }
</style>
<script>
    $(function() {
        /* 去除最后一行分隔的border */
        $('.separator:last td').css({'border-bottom-color': 'white'});
        /* 固定表头 */
        if (!($.browser.msie && $.browser.version < 8)) {
            var $table = $("#order-list");

            if ($table[0]) {
                var tableOffset = $table.offset().top + 100;
                var $header = $("#order-list .order_list_title").clone();
                var $fixedHeader = $("#table-header-fixed").append($header);

                $(window).bind("scroll", function() {
                    var offset = $(this).scrollTop();

                    if (offset >= tableOffset && $fixedHeader.is(":hidden")) {
                        $fixedHeader.show();
                    }
                    else if (offset < tableOffset) {
                        $fixedHeader.hide();
                    }
                    if (offset > tableOffset + $table.height()) {
                        $fixedHeader.hide();
                    }
                });
            }
        }
        /**
         *多包裹时物流信息格式化
         */
//         var order_list = [];
//         $('.order_info_td').each(function(i, item) {
//             var par = $(item).parent();
//             par.data('row', $(item).attr('rowspan') ? $(item).attr('rowspan') * 1 : 1);
//             par.data('list', []);
//             order_list.push(par);
//         });

//         if (order_list.length > 0) {
//             var current = 0;
//             var current_max = order_list[current].data('row');
//             var current_index = 0;
//             var tr_list = $('#order-list tr').not('[class]');
//             tr_list.each(function(i, item) {
//                 if(i >= (current_index + current_max)) {
//                     current++;
//                     current_max = order_list[current] ? order_list[current].data('row') * 1 : -1;
//                     current_index = i;
//                 }
//                 if(i < (current_index + current_max)) {
//                     var temp_list = order_list[current].data('list');
//                     temp_list.push(item);
//                     order_list[current].data('list', temp_list);
//                 }
//             });

//             $(order_list).each(function(i, item) {
//                 var rowspan = $(item).find('.order_info_td').attr('rowspan');
//                 var rowspan_added = 0;
//                 item = $($(item).data('list'));
//                 var package = item.find('.package_info');
//                 if(package.length > 1) {
//                     var package_clone = package.clone();
//                     var status_clone = item.find('.status_green').parent().clone();
//                     var td = item.find('.order_package');
//                     var start = 0;
//                     item.find('.package_info').parent().remove();

//                     package_clone.each(function(pindex, pkg) {
//                         var count = -1;
//                         var tr_target = null;
//                         flag = true;
//                         item.each(function(ti, tr_item) {
//                             if(ti >= start) {
//                                 if(flag) {
//                                     count++;
//                                     if(ti == item.length-1) {
//                                         count++;
//                                     }
//                                     if(!tr_target) {
//                                         tr_target = $(tr_item);
//                                     }
//                                 }
//                                 if($(tr_item).find('.order_package').length && flag && ti > start) {
//                                     flag = false;
//                                     start = ti;
//                                 }
//                             }
//                         });

//                         if(tr_target.find('td').length >= 4) {
//                             var insert_td = $('<td class="insert_td" rowspan="'+ count +'"></td>').insertBefore(tr_target.find('td').last());
//                             insert_td.append(status_clone);
//                             insert_td.append(pkg);
//                             rowspan_added = rowspan_added + count;
//                         }else {
//                             var insert_td = $('<td class="insert_td" rowspan="'+count+'"></td>').insertAfter(tr_target.find('td').last());
//                             insert_td.append(pkg);
//                             rowspan_added = rowspan_added + count;
//                         }

//                         insert_td.css('vertical-align', 'top');
//                         insert_td.css('border-bottom-color', '#fff');
//                         if(rowspan == rowspan_added && pindex == (package_clone.length - 1)) {
//                             insert_td.css('border-bottom-color', '#dbd6d0');
//                         }
//                     });
//                     if (rowspan_added < rowspan) {
//                         item.each(function(ti, tr_item) {
//                             if (ti >= rowspan_added) {
//                                 var $td = $('<td class="insert_td_empty"></td>').insertAfter($(tr_item).find('td').last());
//                                 rowspan_added++;
//                                 if(rowspan_added == rowspan) {
//                                     $td.css('border-bottom-color', '#dbd6d0');
//                                 }
//                             }
//                         });
//                     }
//                 }
//             });
//             $('.package_info').css('padding-top', '10px');
//         }

        var threshold = 1000;
        var is_mouseout_popup = false;

        function hidePopup(){
            if (is_mouseout_popup) {
                $('.sp_icon_pos_wrapper').hide().removeClass('real_name_wrapper');
            }
        }

        $('.sp_icon.sp_icon_trigger').hover(function(){
            var $this = $(this);
            var html = $this.find('.sp_icon_pos_inner').html();
            var offset = $this.offset();
            offset.left = offset.left - 30;
            offset.top = offset.top + 20;
            $('.sp_icon_pos_wrapper').html(html).css(offset).show().addClass('real_name_wrapper');
            is_mouseout_popup = false;
        }, function(){
            is_mouseout_popup = true;
            setTimeout(hidePopup, threshold);
        });

        $('.sp_icon_pos_wrapper').hover(function(){
            is_mouseout_popup = false;
        }, function(){
            is_mouseout_popup = true;
            setTimeout(hidePopup, threshold);
        });

    });
</script>


<style>
 .profile td.insert_td_empty {
   border-top: solid 1px white;
   border-bottom: solid 1px white;
 }
 .sp_icon_pos_inner {
   display: none;
 }
 .sp_icon_pos_wrapper {
   position: absolute;
   z-index: 2;
   border: 1px solid #DBD6D0;
   /* width: 300px; */
   max-width: 220px;
   _width: 220px;
   line-height: 18px;
   padding: 5px 12px;
   background: #FCFCFC;
   color: #676767;
   display: none;
 }
</style>

<style>
 .cancel_success_input_tip{display:inline-block;text-decoration:none;background:#ec195c;background:-webkit-gradient(linear, left top, left bottom, from(#f4769d), to(#ec195c));background:-webkit-linear-gradient(top, #f4769d, #ec195c);background:-moz-linear-gradient(top, #f4769d, #ec195c);background:-o-linear-gradient(top, #f4769d, #ec195c);background:linear-gradient(to bottom, #f4769d, #ec195c);-webkit-box-shadow: 0 1px 2px 0 #bbb;text-decoration:none;box-shadow: 0 1px 2px 0 #bbb;text-shadow:1px 1px 3px #b9154a;vertical-align:middle;display:inline-block;font-family:inherit;word-break:keep-all;white-space:nowrap;font-weight:normal;text-align:center;line-height:32px;font-size:14px;cursor:pointer;height:32px;width:114px;color:#fff;border:0;filter: progid:DXImageTransform.Microsoft.gradient(startColorStr=#ffee1658, endColorStr=#ffee2467), progid:DXImageTransform.Microsoft.DropShadow(color=#ffb2b2b2, offX=0, offY=1, positives=true);}
 .cancel_success_input_tip:hover{text-decoration:none;}
 .cancel_success_layer_wrap {padding: 60px 20px 40px; text-align: center;}
 .cancel_success_input_wrap p {line-height: 50px;}
 .img_ok {
   background: url(http://s0.jmstatic.com/templates/jumei/images/ok.gif) no-repeat;
   padding-left: 36px;
   line-height: 36px;
   display: inline-block;
   font-size: 18px;
 }
 .order_info_td {
   width: 191px;
 }
 table {
   table-layout: fixed;
   width: 769px;
 }
</style>
<script src="./boot.js"></script>
<link rel="stylesheet" href="./sweet-alert.css">
<script>
 window.STATIC_FOLDER = "http://f5.jmstatic.com/static_account/dist/20170104/";
 $(function() {
     seajs.use('order/list');
     seajs.use('pcviews/yiqituan');

     //回到顶部跟随 footer
	 $(window).bind('scroll resize', function(){
         var bottomPx = $(window).scrollTop()-$('#footer_container').position().top + $(window).height();

		 if (bottomPx > 90) {
			 bottomPx = bottomPx + 20 + 'px';
			 $('.backtotop').css('bottom', bottomPx);
		 } else {
			 $('.backtotop').css('bottom', '100px');
		 }
	 });

 });
</script>
</div>
<div class="clear"></div>
<script type="text/javascript">
/*301 www域名跳转
 *jiel
 */
$(function () {
        var cur_location = $.cookie('default_site_25') || '';
        if (cur_location == '') {
        $.getJSON(RM_SITE_MAIN_WEBBASEURL_BACK + 'i/ajax/getsite?callback=?', function (data) {
            cur_location = data.site;
            })
        }
        var url_host = window.location.host.slice(0,2); //获取当前地址域名

        if(url_host =='bj' || url_host =='sh'|| url_host =='gz' || url_host =='cd'){
            if(url_host != cur_location) {
                $.cookie('default_site_25',url_host,{expires: 1,path: "/",domain: RM_SITE_MAIN_TOPLEVELDOMAINNAME});
                cur_location = url_host;
            }
        }
        $(".profile").delegate("a,area", "click", function () {
            if(cur_location == ''){ cur_location ='www'};
            var href = $(this).attr("href") || '';
            if(href.indexOf('/i/deal/mobile_subscribe')<0 && href !=''){
            var reg = new RegExp("^(http://)(hd(?=.jumei.com)|huodong(?=.jumei.com)|www(?=.jumei.com/i/deal))(.*)$","i");
            var href =href.replace(reg, "$1"+ cur_location +"$3");
            $(this).attr("href",href);
        }
    })
})
</script>
<style>
#footer_credit a.foot_link .corn_trusty {background:url(http://a4.jmstatic.com/4f687707139d8450/footer_0901.jpg) no-repeat;}
#footer_container {min-width: 960px;}
</style>

<div id="footer_container">
<div id="footer_textarea">
<div class="footer_top">
                <div class="footer_con" id="footer_credit">
                    <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer" class="foot_link mostmall" target="_blank" rel="nofollow">
                        <span class="corn corn_trusty"></span><span class="con"><b>值得信赖美妆电商</b></span>四千万用户信赖
                    </a>
                    <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer#jumei_ipo" class="foot_link quality" target="_blank" rel="nofollow">
                        <span class="corn"></span><span class="con"><b>成功在美上市</b></span>股票代码NYSE:JMEI
                    </a>
                    <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer#brand_con" class="foot_link back" rel="nofollow" target="_blank">
                        <span class="corn"></span><span class="con"><b>品牌防伪码</b></span>支持品牌官网验真
                    </a>
                    <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer#unconditionally_backtrack" class="foot_link depot" target="_blank" rel="nofollow">
                        <span class="corn"></span><span class="con"><b>30天无理由退货</b></span>只要不满意无理由退货
                    </a>
                    <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer#user_confide" class="foot_link consignment" target="_blank" rel="nofollow">
                        <span class="corn"></span><span class="con"><b>百万用户口碑</b></span>帮你只选对的,不选贵的
                    </a>
                    <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer#bold_consignment" class="foot_link packaging" target="_blank" rel="nofollow">
                        <span class="corn"></span><span class="con"><b>订单闪电发货</b></span>1.5小时订单急速出库
                    </a>
                    <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer#star_commend" class="foot_link confide" target="_blank" rel="nofollow">
                        <span class="corn"></span><span class="con"><b>大牌明星热荐</b></span>打造精致明星脸
                    </a>
                </div>
        </div>

    <div class="footer_top">
        <div class="footer_con" id="footer_links">
            <ul class="linksa png">
                <li class="links">服务保障</li>
                <li><a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer&amp;site=bj#brand_con" target="_blank" rel="nofollow">品牌真品防伪码</a></li>
                <li><a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer" target="_blank" rel="nofollow">100%正品保证</a></li>
                <li><a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer#unconditionally_backtrack" target="_blank" rel="nofollow">30天无条件退货</a></li>
                <li><a href="http://www.jumei.com/help/faq?from=footer" target="_blank" rel="nofollow">7×24小时客服服务</a></li>
                <li><span class="footer_zcemail">总裁邮箱ceo@jumei.com</span></li>
            </ul>

            <ul class="linksb png">
                <li class="links">使用帮助</li>
                <li><a href="http://www.jumei.com/help/guidebook?from=footer" target="_blank" rel="nofollow">新手指南</a></li>
                <li><a href="http://www.jumei.com/help/faq?from=footer" target="_blank" rel="nofollow">常见问题</a></li>
                <li><a href="http://www.jumei.com/help/main?from=footer" target="_blank" rel="nofollow">帮助中心</a></li>
                <li><a href="http://www.jumei.com/i/help/user_terms?from=footer" target="_blank" rel="nofollow">用户协议</a></li>
                <li><a href="http://www.jumei.com/activity_qiye_tuangou.html?from=footer" target="_blank" rel="nofollow">企业用户团购</a></li>

            </ul>

            <ul class="linksc png">
                <li class="links">支付方式</li>
                <li><a href="http://www.jumei.com/help/pay_cod?from=footer" target="_blank" rel="nofollow">货到付款</a></li>
                <li><a href="http://www.jumei.com/help/pay_online?from=footer" target="_blank" rel="nofollow">在线支付</a></li>
                <li><a href="http://www.jumei.com/help/pay_balance?from=footer" target="_blank" rel="nofollow">余额支付</a></li>
                <li><a href="http://www.jumei.com/help/pay_promocards?from=footer" target="_blank" rel="nofollow">现金券支付</a></li>
            </ul>

            <ul class="linksd png">
                <li class="links">配送方式</li>
                <li><a href="http://www.jumei.com/help/two_for_freeshipping?from=footer" target="_blank" rel="nofollow">包邮政策</a></li>
                <li><a href="http://www.jumei.com/help/delivery_state?from=footer" target="_blank" rel="nofollow">配送说明</a></li>
                <li><a href="http://www.jumei.com/help/delivery_fee?from=footer" target="_blank" rel="nofollow">运费说明</a></li>
                <li><a href="http://www.jumei.com/help/check_goods?from=footer" target="_blank" rel="nofollow">验货签收</a></li>
            </ul>

            <ul class="linkse png">
                <li class="links">售后服务</li>
                <li><a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer" target="_blank" rel="nofollow">正品承诺</a></li>
                <li><a href="http://www.jumei.com/help/faq?from=footer" target="_blank" rel="nofollow">售后服务</a></li>
                <li><a href="http://i.jumei.com/i/RMA/refund_policies?from=footer" target="_blank" rel="nofollow">退货政策</a></li>
                <li><a href="http://i.jumei.com/i/RMA/refund_handle?from=footer" target="_blank" rel="nofollow">退货办理</a></li>
            </ul>

            <span class="links_er_box">
                <ul class="linksf">
                    <li class="links">手机聚美</li>
                    <li><span class="link_bottom_pic"></span></li>
                    <li>下载移动客户端</li>
                </ul>
                <ul class="linksg">
                    <li class="links">聚美微信</li>
                    <li><span class="link_bottom_pic"></span></li>
                    <li>聚美官方微信</li>
                </ul>
            </span>
        </div>
    </div>
    
    <div class="footer_dy" id="footer_dy"></div>

    <div class="footer_center">
        <div class="footer_con" id="footer_link">
            <a href="http://www.jumei.com/about/about_us?from=footer" target="_blank" rel="nofollow">关于聚美优品</a>  |
                            <a href="http://jumei.investorroom.com/" target="_blank" rel="nofollow">Investor Relations</a>  |
                        <a href="http://www.jumei.com/activity_pop_invite_business.html?from=footer" target="_blank" rel="nofollow">商家入驻</a>  |
            <a href="http://www.jumei.com/help/get_update?from=footer" target="_blank" rel="nofollow">获取更新</a>  |
            <a href="http://www.jumei.com/about/hiring?from=footer" target="_blank" rel="nofollow">加入聚美</a>  |
            <a href="http://www.jumei.com/i/market/cooperation" target="_blank" rel="nofollow">品牌合作专区</a>  |
            <a href="http://union.jumei.com/" target="_blank" rel="nofollow">网站联盟</a>  |
            <a href="http://www.jumei.com/about/news_center" target="_blank" rel="nofollow">媒体报道</a>  |
            <a href="http://www.jumei.com/about/business" target="_blank" rel="nofollow">商务合作</a>  |
            <a href="http://www.jumei.com/about/friend_links" target="_blank" rel="nofollow">友情链接</a>
        </div>
    </div>
<div id="footer_copyright">
    <div class="footer_con">
        <p class="footer_copy_con">
            Copyright © 2010-2014 北京创锐文化传媒有限公司 Jumei.com 保留一切权利。客服热线：400-123-8888 <br>
            京公网安备 11010102001226 号 | <a href="http://www.miibeian.gov.cn/" target="_blank" rel="nofollow">京ICP证111033号</a> | 食品流通许可证 SP1101051110165515（1-1）
            | <a href="http://p2.jmstatic.com/activity/2013_chuangrui.jpeg" target="_blank" rel="nofollow">营业执照</a>
        </p>
        <p>
            <a href="javascript:void(0)" class="footer_copy_logo logo01" rel="nofollow"></a>
            <a href="https://www.itrust.org.cn/yz/pjwx.asp?wm=1693268180" target="_blank" class="footer_copy_logo logo02" rel="nofollow"></a>
            <a href="javascript:void(0)" class="footer_copy_logo logo03" rel="nofollow"></a>
            <a href="javascript:void(0)" class="footer_copy_logo logo04" rel="nofollow"></a>
            <a href="https://ss.cnnic.cn/verifyseal.dll?sn=e12070911010031011307708&amp;ct=df&amp;pa=453163" target="_blank" class="footer_copy_logo logo05" rel="nofollow"></a>
        </p>
        

    </div></div>

    </div>
</div>
<!--*连续登陆探测 

<script type="text/javascript">
$(document).ready(function () {
    Jumei.Core.init();
    for(var i in Jumei.Core.afterInitFunctions) {
        if (Jumei.Core.afterInitFunctions.hasOwnProperty(i)) {
            Jumei.Core.afterInitFunctions[i].call();
        }
    }
});
</script>
<!--点击流用-->
<script type="text/javascript" charset="utf-8" src="./Jumei.ClickMap.js"></script>



<script type="text/javascript">
// adwq
(function() {

    var new_signup = getCookie('new_signup');
    if ( new_signup !== null ){
        _adwq.push(['_setAction',
            '20rf07',
            RM_UID,       // 扩展参数, 可填 用户名 或 用户ID(可选)
            'new_signup' // 事件价值 (可选)
        ]);

        $.cookie('new_signup',null,{path:'/',domain:RM_SITE_MAIN_TOPLEVELDOMAINNAME});
    }


    var adw = document.createElement('script');
    adw.type = 'text/javascript';
    adw.async = true;
    adw.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://s') + '.emarbox.com/js/adw.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(adw, s);
})();

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

//<!--
    (function (d) {
        window.bd_cpro_rtid="rjfzrHc";
        var s = d.createElement("script");s.type = "text/javascript";s.async = true;s.src = location.protocol + "//cpro.baidu.com/cpro/ui/rt.js";
        var s0 = d.getElementsByTagName("script")[0];s0.parentNode.insertBefore(s, s0);
    })(document);
//-->
</script>


<div style="display:inline;visibility: hidden;"><img height="1" width="1" style="border-style:none;" alt="" src="./saved_resource(2)"></div><input id="search_page_wait_time_start" type="hidden" value="1484638275078"><input id="search_page_wait_time" type="hidden" value="52107"><iframe src="./_adw.html" id="emar_box_pv" style="width: 1px; border: 0px; position: absolute; left: -100px; top: -100px; height: 1px;"></iframe></body></html>