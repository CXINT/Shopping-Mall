<?php
session_start();
include '../Public/config.php';
// unset($_SESSION['shopcar']);
// var_dump($_SESSION);
?>
<!doctype html>
<html>
<head>
    <title>购物车</title>    
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/shoppingcar.css">
    <link rel="stylesheet" href="css/index.css">
     <link rel="icon" href="./image/favicon.ico">
</head>
<body style="width:980px;height: 530px;">
    <div class="top" style="border-bottom:none;width:980px;height:20px;">
        <!-- <a class="logo" href="index.php" title=""></a>   -->
        <div style="float: right">
        <?php if(empty($_SESSION['homeInfo'])) {?>
            <a href="./cxweb/jmlogin-register/passport/login.htm" style="color: #FF0066">登录</a> |
            <a href="./cxweb/jmlogin-register/passport/register.htm" class="user" style="color: #FF0066">注册</a>
        <?php } else {?>
            <span>您好，</span>
            <a href=""><?=$_SESSION['homeInfo']['username']?></a>
            <a href="action.php?a=logout" class="user">退出登录</a> | 
        <?php }?>
            <a href="">用户中心</a>
        </div>
    </div>

<!--     <div class="location"></div> -->
   
    <div class="car" style="padding-left:0px; width: 980px;height:70px;">
        <div style="float:left"><img src="./img/2017-01-16_155640.png"></div>
        <div style="float:right"><img src="./img/2017-01-16_155655.png"></div>
    </div>
    <div class="car" style="padding-left:0px; width: 980px;height:70px;">
        <div style="float:left">
            <span>
                <h3>选购清单中的商品无法保留库存，请在下单后 20 分钟内完成支付。</h3>
                <p>&nbsp;</p>
                <p>新用户首单满39元包邮,自营非食品类满两件或满299元包邮。</p>
            </span>
        </div>
        <div style="float:right"><img src="./img/2017-01-16_160354.png"></div>
    </div>
    <div class="shop-top">
        <input type="checkbox" class="all"><b>聚美优品发货</b>
        <span class="title" style="padding-left: 460px;"><b>聚美价</b></span>
        <span class="title3" style="padding-left: 40px;padding-right: 100px"><b>数量</b></span>
        <span class="title" style="padding-right: 50px;"><b>小计</b></span>
        <span class="title"><b>操作</b></span>
    </div>

<?php 
$total = 0; //总价变量
$nums = 0;  //总件数变量
if (empty($_SESSION['shopcar'])) {
    echo '<h1 style="font-size:30px">购物车空空如也，快去<a href="list.php" style="font-size:40px;color:#ff0099">购买</a>吧~~~</h1>';
} else {
    foreach ($_SESSION['shopcar'] as $v):
        $total += $v['price']*$v['num'];
        $nums += $v['num'];
?>
    <div class="shop-h">
        <input type="checkbox" class="radio" style="margin-left:10px;">
        <img width="50" height="50" src="<?=__PUBLIC__.'/Goods/'.$v['pic']?>" class="pic">
        <a href="detail.php?id=<?=$v['id']?>" style="display:inline-block;width:400px;line-height:16px"><?=$v['name']?></a>
        <span class="price">￥<?=$v['price']?></span>
        <a href="action.php?id=<?=$v['id']?>&a=cutNum" class="jian botton-n"><a>-</a>
        <input type="text" value="<?=$v['num']?>" size="2">
        <a href="action.php?id=<?=$v['id']?>&a=addNum" class="add botton-n">+</a>
        <span style="margin-left:70px;display:inline-block;width:80px"><?=number_format($v['price']*$v['num'], 2)?></span>
        <a href="action.php?a=delGoods&id=<?=$v['id']?>">删除</a>
    </div>
<?php 
    endforeach; 
}
?>

    <div class="under">
        <div class="under-t">
            <input type="checkbox" class="all">全选&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="list.php">继续购物 &nbsp; | </a>
            <a href="action.php?a=delAll">&nbsp;清除商品</a>
            
        </div>
        <div class="under-b">
            <div>
                <div>
                    <a href="order.php" style="font-size:20px;height: 50px;line-height: 50px;margin-left: 10px;padding-left: 25px;width: 80px;background-color: #FF0066;padding-right: 25px;float:right;text-align: center;font-size: 4px;"><font><span style="color:white;">去结算</span></font></a>
                </div>
                <div  style="width:250px;float:right;line-height: 50px;text-align: center;">商品应付总额：<font class="monney" style="color: #FF0066">￥<?=number_format($total, 2)?></font>
                </div>
                <div style="width:70px;height:54px;float:right;text-align: center;line-height: 54px;">共<font size="4px;" style="color: #FF0066"><?=$nums?></font>件商品
                </div>
                
            </div>
        </div>
    </div>
        <div>
            <img src="./img/2017-01-16_200506.png" style="margin-left:100px;">
        </div>
</body>

</html>
