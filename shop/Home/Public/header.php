
 <!-- 头部顶部 -->
                <div class="header_top">
                    <!-- 头部顶部居中部分 -->
                    <div class="header_top_center cursor">
                        <ul class="ul-left left" style="width:228px;height:28px;margin-bottom:0px;padding-left:0px;margin-top:0;list-style:none;">
                            <li style="width:84px;height:28px;margin-right:20px;" class="left"><a ><font size="-4" color="#999">欢迎来到聚美！</font></a></li>
                            <li style="width:120px;height:28px;" class="left">
                                <?php if(empty($_SESSION['homeInfo'])) {?>
                                    <a href="./cxweb/jmlogin-register/passport/login.htm" style="color: #FF0066"><font size="-4" color="#999">登录</font></a>  
                                    <a href="./cxweb/jmlogin-register/passport/register.htm" class="user" style="color: #FF0066"><font size="-4" color="#999">注册</font></a>
                                <?php } else {?>
                                <a href=""><font size="-4" color="#999"><?=$_SESSION['homeInfo']['username']?></font></a>
                                <a href="action.php?a=logout" class="user"><font size="-4" color="#999">退出登录</font></a>  
                                <?php }?>
                            </li>
                           
                        </ul>
                       <!--  <span style="width:30px;height:28px;padding-right:10px;border:1px;" class="left"><font size="-4" color="#999">送至</span></font><span style="width:120px;height:16px"></span>  -->
                        <ul class="ul-right right" style="width:479px;height:28px;margin:0px;padding:0px;list-style:none;">
                            <li class="left" style="margin-left:14px;width:48px;height:28px"><font size="-4" color="#999">正品保证</font></li>
                            <li class="left" style="margin-left:14px;width:48px;height:28px"><font size="-4" color="#999">订单查询</font></li>
                            <li class="left" style="margin-left:14px;width:74px;height:28px"><font size="-4" color="#999">收藏的品牌</font></li>
                            <li class="left" style="margin-left:14px;padding-left:10px;padding-right:18px;width:48px;height:28px"><font size="-4" color="#999">我的聚美</font></li>
                            <li class="left" style="margin-left:14px;width:76px;height:28px"><font size="-4" color="#999">手机聚美</font></li>
                            <li class="left" style="margin-left:14px;width:13px;height:28px"></li>
                            <li class="left" style="margin-left:14px;width:24px;height:28px"><font size="-4" color="#999">更多</font></li>
                        </ul>
                    </div>  
                </div>
                <!-- 头部中间 -->
                <div class="header_center">
                    <div class="header_center_center">
                        <!-- 头部logo -->
                        <div class="logo left">
                                <img src="./img/logo.jpg" style="width:165px;height:85px;margin-top:13px;">
                        </div>
                        <!-- 头部搜索框以及底部文字 -->
                        <div class="searchbox left">
                            <input type="text">
                            <button><font size="2" color="#FFFFFF">搜索</font></button>
                            <ul class="little-word left cursor">
                                <li class="word-style left"><font size="-4" color="#999">保湿</font>
                                <span style="line right">|</span></li>
                                <li class="word-style left"><font size="-4" color="#999">面膜</font>
                                <span style="line left">|</span></li>
                                <li class="word-style left"><font size="-4" color="#999">洗面奶</font>
                                <span style="line left">|</span></li>
                                <li class="word-style left"><font size="-4" color="#999">补水</font>
                                <span style="line left">|</span></li>
                                <li class="word-style left"><font size="-4" color="#999">香水</font>
                                <span style="line left">|</span></li>
                                <li class="word-style left"><font size="-4" color="#999">眼霜</font>
                                <span style="line left">|</span></li>
                                <li class="word-style left"><font size="-4" color="#999">口红</font>
                                <span style="line left">|</span></li>
                                <li class="word-style left"><font size="-4" color="#999">护肤套装</font>
                                <span style="line left">|</span></li>
                                <li class="word-style left"><font size="-4" color="#999">BB霜</font></li>
                            </ul>
                        </div>
                        <!-- 头部中间购物车 -->
                        <div class="cart_box right">
                            <div class="cart left" style="background:url('./img/cart.gif') 10px 0px;background-repeat:no-repeat;"></div>
                            <span class="text"><font size="-2"><a href="" style="text-decoration:none;color:black;">去购物车结算</a></font></span>
                        </div>
                    </div>
                </div>
                <hr>

    <!-- nav开始 -->
    <div class="header-bottom center" style="background: rgba(255, 0, 102, 0.98);">
        <ul class="list-no">
            <li style="border:none;"><a href="list.php" style="color:white;">首页</a></li>

<?php
//查询分类数据
include '../Public/config.php';
$link = mysqli_connect(HOST, USER, PWD, DB);
mysqli_set_charset($link, 'utf8');

$sql = "select * from ".FIX."type where pid=0 limit 20";
// echo $sql;
// die;

$res = mysqli_query($link, $sql);
if ($res && mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        // var_dump($row);
        $sql = 'select * from '.FIX."type where pid={$row['id']}";
        $res2 = mysqli_query($link, $sql);
        $str = "<li>
            <a href='list.php?id={$row['id']}&name={$row['name']}' style='color:white;'>{$row['name']}</a>
            <ol class='fz'>";
        if ($res && mysqli_num_rows($res2) > 0) {
            while ($son = mysqli_fetch_assoc($res2)) {
                $str .= "<li><a href='list.php?id={$son['id']}&name={$son['name']}&pid={$son['pid']}' >{$son['name']}</a></li>";
            }
        } 
        // else {
        //     continue;
        // }
        $str .= '</ol>
          </li>';
        echo $str;
    }
}
?>      
        </ul>
    </div>
    <!-- nav结束 -->
</div>
<!-- 头部结束