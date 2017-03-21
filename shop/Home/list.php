<?php
session_start();

?>
<!doctype html>
<html>
    <head>
        <title></title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="./css/list.css">
            <link rel="stylesheet" href="./css/css.css">
            <link rel="stylesheet" href="./css/index.css">
            <link rel="icon" href="./image/favicon.ico"> 
            <meta name="keywords" content="">
            <meta name="descripiton" content="">
    </head>
    <body>
        <div class="container">
        
<?php 

//包含头部文件
include './Public/header.php';
//包含配置文件
include '../Public/config.php';
//连接数据库
$link = @mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败。<a target="_top" href="../index.php">返回</a>');
//设置字符集
mysqli_set_charset($link, 'utf8');

//检测是否已经拿到id
$id = isset($_GET['id']) ? $_GET['id'] : '';

/****************** 搜索开始 ******************/
$where = 'where 1=1';
$search = '';
//商品名搜索条件
if (!empty($_GET['name'])) {
    $where .= " and name like '%{$_GET['name']}%'";
}
// echo $where;
// die;
/****************** 搜索结束 ******************/

/****************** 面包屑开始 ******************/
$xie = '';
$sql = 'select * from '.FIX."goods where status=1";
if (!empty($id)) {
    //先找出儿子：如果没有儿子，就用当前的id去找商品
    $sonSql = 'select id from '.FIX."type where pid=$id";
        
    $res = mysqli_query($link, $sonSql);
    if ($res && mysqli_num_rows($res) > 0) {
        //通过id找出自己所有的儿子
        $sonId = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $sonId[] = $row['id'];
        }
        //将所有儿子的id拼接为:1,2,3,4这种格式
        $ids = join(',', $sonId);

        $xie = "&gt; <span>{$_GET['name']}</span>";
    } else {
        $ids = $id;

        //通过子类的pid找出父类的信息，用于拼接面包屑
        $parentSql = "select * from ".FIX."type where id={$_GET['pid']}";
        $parentName = mysqli_query($link, $parentSql);
        $parent = mysqli_fetch_assoc($parentName);
        $xie = "&gt; <a href='list.php?id={$parent['id']}&name={$parent['name']}'>{$parent['name']}</a> &gt; <span>{$_GET['name']}</span>";
    }

    //传了ID的情况，让sql语句加多一个条件
    $sql .= " and tid in($ids)";
}
// echo $sql;
$res = mysqli_query($link, $sql);
if ($res && mysqli_num_rows($res) > 0) {
     $arr = mysqli_fetch_all($res, MYSQLI_ASSOC);
} else {
    $arr = [];
}
/****************** 面包屑开始 ******************/

/****************** 分页开始 ******************/
//1.设置每页显示条数
$num = 4;

//4.查出总条数
$sql = 'select count(*) from '.FIX."goods $where";
// echo '$sql';
// die;
$res = mysqli_query($link, $sql);
$total = mysqli_fetch_row($res)[0];
// echo $total;exit;
//5.计算总页码数
$totalPage = ceil($total / $num);

//2.获取当前页
$p = isset($_GET['p'])?$_GET['p']:1;
if ($p < 1) $p = 1;
if ($p > $totalPage) $p = $totalPage;

//3.计算偏移量
$offset = ($p-1) * $num;
$limit = "limit $offset,$num";
/****************** 分页结束 ******************/    
?>

                <!-- 主体开始 -->
            <div class="main">
                <div class="topnav">
                    <div class="place">
                        <span>当前位置:</span>
                        <a href="list.php">所有商品</a>
                        <?=$xie?>
                    </div>
                </div>
                <div style="width:1200px;height:30px;">
                <!--用户查询搜索开始-->
                <form action="" style="width:1000px;height:20px;">
                    <span style="float:left;color:#FF0066">商品名：</span>
                    <span style="float:left">
                        <input type="text" value="<?=@$_GET['name']?>" name="name" style="width:200px;height:10px;border:2px solid #FF0066;margin-right: 3px;"/>
                    </span>
                    <input type="submit" value="搜索" style="width: 50px;height:28px;border:2px solid #FF0066;padding:0px;text-align: center;">
                </form>
                </div>
                <!--用户查询搜索结束-->         
                <div class="nav">
                    <div class="filterbar" style="border-bottom:#FF0066 2px solid">
                        <div class="left_filter left" style="background-color: #FF0066">
                            <a href="" >全部商品</a>
                        </div>
                    </div>
                </div>
                     
                <!--商品区-->
                <div class="goods-list">
                    <ul>
<?php
    if (empty($arr)) {
        echo '<h1>对不起，商品还没上架开卖</h1>';
    } else {
        foreach ($arr as $v) {?>
            <li>
                <a href="detail.php?id=<?=$v['id']?>"><img src="<?=__PUBLIC__.'/Goods/'.$v['pic']?>"></a>
                <p>
                    <a href="detail.php?id=<?=$v['id']?>"><?=$v['name']?></a>
                </p>
                <div>
                    <span style="color:#FF0066">售价￥<?=$v['price']?></span>
                </div>
            </li>
<?php
        }
    }
?>
                    </ul>
                </div>
                <!-- 商品区结束 -->
                <div class="pages">
                    <ul>
                        共<?=$total?>条 第<?=$p?>/<?=$totalPage?>页
                        <span style="float:right">
                        <a href="list.php?p=1<?=@$search?>">首页</a> |
                        <a href="list.php?p=<?=($p-1).@$search?>">上一页</a> |
                        <a href="list.php?p=<?=($p+1).@$search?>">下一页</a> |
                        <a href="list.php?p=<?=@$totalPage.@$search?>">尾页</a>
                        </span>
                    <ul>
                </div>
                </div>
                <hr>
                <!-- 主体结束 -->

                <!-- 包含尾部文件 -->
            <?php include './Public/footer.php';?>
        </div>
    </body>
</html>