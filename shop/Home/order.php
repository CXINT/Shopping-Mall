<?php
session_start();
// var_dump($_SESSION);
//判断是否登录
if (empty(@$_SESSION['homeInfo'])) {
    //没登录
    echo '请先登录,2秒后<a href="./cxweb/jmlogin-register/passport/login.htm">跳转</a>...';
    echo '<meta http-equiv="refresh" content="2;url=./cxweb/jmlogin-register/passport/login.htm">';
    // header('location:login.php');
    exit;
}
?>
<!doctype html>
<html>
<head>
    <title>确认提交订单</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/order.css">
     <link rel="icon" href="./image/favicon.ico">
</head>
<body style="width:1349px;height:900px">
<form action="action.php?a=addOrder" method="post">
    <div class="top" style="width:960px;height:32px;margin:0 auto;border-bottom:none;">
        <div class="help-center">
            <span>您好，</span>
            <a href=""><?=@$_SESSION['homeInfo']['username']?></a>
            <a href="action.php?a=logout" class="user" style="color:#FF0066;">退出登录</a>
        </div>
    </div>
    <div style="width:1349px;height:50px;padding-bottom:15px;border-bottom: 2px solid #e5e5e5;box-shadow: 0px 1px 2px rgba(0,0,0,0.1);">
        <div style="width:960px;height:32px;margin:0 auto;">
            <img src="./img/2017-01-16_215430.png">
        </div>
    </div>

    <div style="width:1349px;height:750px;padding-top: 15px;padding-bottom: 15px;background:#EEE7E1;">
        <div style="width:960px;height:250px;padding-left: 20px;padding-right: 20px;margin:0 auto;background:white;">
            <div style="width:960px;height:30px;">
                <h1>1.地址选择</h1>
            </div>
            <div style="width: 898px;height:16px;border: 1px solid #fabf7b;    margin-bottom: 20px;margin-left: 20px;font-size: 12px;text-indent: 26px;color: #ED145B;">
                <p>温馨提示：您的订单内含有海外购商品，根据国家法律规定，您需要上传身份证号，以便海关清关，否则有可能收不到包裹！</p>
            </div>

<?php 
    //查地址信息
    include '../Public/config.php';
    $link = mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败');
    mysqli_set_charset($link, 'utf8');

    $sql = "select * from ".FIX."address where uid={$_SESSION['homeInfo']['id']}";
    $res = mysqli_query($link, $sql);
    if ($res && mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            //判断地址是否是默认
            if ($row['is_defaul'] == 1) $sel = 'checked';
            //炫酷的地址表样式
            echo "<div style='width: 194px;height:88px;line-height: 14px;position:relative;float: left;border: 1px solid #ccc;margin-right: 4px;margin-bottom: 5px;color: #000;line-height: 26px;padding: 15px;cursor: pointer;background: url(./img/addr_bg.jpg) no-repeat;border-color: transparent;'>
                    <div class='address'><input type='radio' $sel name='address' value='{$row['id']}' />{$row['address']}</div>                                
                    <div class='phone'>{$row['phone']}</div>
                    <div class='name'>{$row['name']}收</div>
                    <div><a href='action.php?a=delAddress&address={$row['address']}'>删除</a></div>
                    </div>";
        }
    } else {
        echo '<p>没有地址</p>';
    }
?>                
            
        <div style="width:920px;height:28px;padding: 15px 0 5px;position: relative;float: left;">
            <a href="./addnewaddress.php" style="color: #FF0066;">使用新地址</a>
        </div>
    </div>
    <!-- 商品清单开始 -->
    <div style="width:960px;padding:0 20px 0 20px;margin:0 auto;background:white;">
        <div style="width:920px;height: 50px;">
            <div style="width:87px;height:37px;float:left;line-height:50px;"><h1>2. 商品清单</h1></div>
            <div style="width:87px;height: 37px;float:right;padding:0 10px 0 10px;margin-top:10px;"><a href="./shopcar.php" style="color:#FF0066;">返回修改购物车</a></div>
        </div>

    <table cellspacing="0" style="border:1px solid #ccc;">
        <tr style="background:#939589;">
            <th  style="width:470px;height: 36px;">商品名称</th>
            <th  style="width:119px;height: 36px;">单价</th>
            <th  style="width:160px;height: 36px;">数量</th>
            <th  align="center" style="width:170px;height: 36px;">小计</th>
        </tr>
<?php 
    $total = 0;//总价变量
    $nums = 0;//总价数变量
    
foreach(@$_SESSION['shopcar'] as $v){
    $total += $v['price']*$v['num'];//总金额
    $nums += $v['num'];//总数量
    ?>
        <tr align="center" height="36px">
           <td><a href="detail.php?id=<?=$v['id']?>"><?=$v['name']?></a></td>
           <td>￥<?=$v['price']?></td>
           <td><?=$v['num']?></td>
           <td>￥<?=number_format($v['price']*$v['num'], 2)?></td>
        </tr>
<?php 
}
?>       
    </table>
        <div style="width:918px;height: 30px;padding-bottom: 10px;">
                <a href="" style="line-height:30px;color:#FF0066;">使用现金券和红包</a>
        </div>
        <div style="width: 960px;height:15px;margin:0 auto;"></div> 
        <div style="width: 1000px;height:100px;margin:0 auto;background-color: white;">
            <div style="width: 910px;height:0px;padding:5px 25px 5px 25px;"></div>
            <div style="width: 920px;height:16px;padding:5px 25px 5px 5px;">
                <span style="float: left"><input type="checkbox"><label>索要发票</label></span>
                <span style="float: right">
                    <span>共<font style="color:#FF0066;"><?=$nums?></font>件商品，总金额：<span>¥</span><font style="color:#FF0066;"><?=number_format($total, 2)?></font></span>
                    
                </span>
            </div>
            <div style="width:920px;height:42px;padding:0 20px 20px 20px;">
                <a href="./shopcar.php" style="line-height: 42px;float:left;color:#FF0066;">返回修改购物车</a>
                <span>
                    <a href="action.php?a=addDetail"><input type="submit" value="提交订单" style="width: 170px;height: 40px;border:1px solid #fc6e9d;display: inline-block;background: #f8296d;line-height: 40px;text-align:center;color: #fff;float:right;"></a>
                </span>
                <div style="width: 120px;height:42px;padding-right: 20px;float: right;">
                    <span style="line-height: 42px;">应付金额：¥</span><span><font style="color:#FF0066;"><?=number_format($total, 2)?></font></span>
                </div>
                
                
            </div>
        </div>  
    </div>
     <!-- 页脚开始 -->
     <div style="width: 1349px;height: 136px;">
        <img src="./img/2017-01-17_023718.png">
     </div>
</form>
</body>
</html>