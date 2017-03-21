<?php
session_start();
?>
<!doctype html>
<html>
<head>
    <title>商品详情页</title>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" href="./css/detail.css">
    <link rel="stylesheet" href="./css/css.css">
    <link href="./image">
    <link rel="icon" href="./image/favicon.ico">

</head>
<body>
<div container>
<?php 
    if (empty($_GET['id'])) {
        header('location:list.php');
        exit;
    }
    include './Public/header.php';
    // var_dump($_GET);
    $id = $_GET['id'];
    $sql = "update ".FIX."goods set clicknum=clicknum + 1 where id=$id";
    mysqli_query($link, $sql);
    // echo $sql;

    $sql = 'select * from '.FIX."goods where status=1 and id=$id limit 1";
    $res = mysqli_query($link, $sql);
    if ($res && mysqli_num_rows($res) > 0) {
        $info = mysqli_fetch_assoc($res);
    } else {
        header('location:index.php');
        exit;
    }

    // var_dump($info);
?>
    <!-- 主体开始 -->
    <div class="main">
        <div class="goods">
            <div class="goods-left left">
              <div class="goods-simg left">
                    <!-- 小图 -->
                    <img width="76" src="<?=__PUBLIC__.'/Goods/'.$info['pic']?>"-->
                </div> 
                <div class="goods-bimg right">
                    <img src="<?=__PUBLIC__.'/Goods/'.$info['pic']?>" width="400" height="400">
                </div>
            </div>
            <div class="goods-right right">

                <div class="tips" style="border:0px;width:450px;height:200px;">  
                    <ul>
                        <li><?=$info['name']?>
                        <span class="newy"><font color:#333333><?=$info['des']?></font></span></li>
                    </ul>
                </div>
                <div class="price">
                    <span style="float:left">￥</span>
                    <strong style="float:left"><font color:#333333><?=$info['price']?></font></strong>
                </div>
                <br />
             <?php if ($info['store'] > 0) {?>
                <div >
                    <a style="background: rgba(255, 0, 92, 0.87); width:150px;height:50px;font-size:5px;line-height:50px;text-align: center;" href="action.php?a=addGoods&id=<?=$id?>" class="add"><font size="4px;"><span style="color:white;">加入购物车</span><font></a>
                </div>
        <?php } else {
            echo '<span class="status">卖的太好了，暂时缺货~</span>';
        }?>
        
            </div>
        </div>
    </div>
    <?php include './Public/footer.php';?>
</div>
</body>
</html>