<?php
session_start();
if (empty($_SESSION['adminInfo'])) {
	header('Location:../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>订单详情</title>
	<style>
		a{text-decoration:none; color:#f60;}
	</style>
</head>
<body>
	<h1 style="color:#444851">
	<center>订单详情</center>
	</h1>
	<hr>
	<!--用户查询搜索开始-->
	<form action="" style="float:left;">
		商品名：<input type="text" value="<?=@$_GET['name']?>" name="name" />
		状态：<select name="status">
				 <option value="">--请选择--</option>
				 <option <?=@($_GET['status']==1)?'selected':''?> value="1">已付款，未发货</option>
				 <option <?=@($_GET['status']==2)?'selected':''?> value="2">已发货</option>
			  </select>
		<input type="submit" value="搜索">
	</form>
	<sapn style="float:right;"><a href="./index.php">返回</a></sapn>
	<!--用户查询搜索结束-->
	<div style="height:4px;"></div>
<!--用户数据遍历输出开始-->
	<table width="100%" border="1" cellspacing="0" cellpadding="10" style="color:#444851">
		<tr>
			<th>订单编号</th>
			<th>商品ID</th>
			<th>商品名称</th>
			<th>商品价格</th>			
			<th>商品图片</th>
			<th>购买数量</th>
		</tr>
<?php
//包含配置文件
include '../../Public/config.php';
//连接指定数据库
$link = @mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败。<a target="_top" href="../index.php">返回</a>');
//设置字符集
mysqli_set_charset($link, 'utf8');

/****************** 搜索开始 ******************/
// $where = '';
$search = '';
//拼接用户名搜索条件
// if (!empty($_GET['id'])) {
// 	$where .= " and id like '%{$_GET['id']}%'";
// 	$search .= '&id='.$_GET['id'];
// }
//拼接状态
// if (!empty($_GET['status'])) {
// 	$where .= " and status=".$_GET['status'];
// 	$search .= '&status='.$_GET['status'];
// 	}

/****************** 搜索结束 ******************/	

/****************** 分页开始 ******************/
//1.设置每页显示条数
$num = 4;

//4.查出总条数
$sql = 'select count(*) from '.FIX."orders where 1=1";
$res = mysqli_query($link, $sql);
$total = mysqli_fetch_row($res)[0];
// echo $total;
// exit;
//5.计算总页码数
$totalPage = ceil($total / $num);

//2.获取当前页
$p = isset($_GET['p'])?$_GET['p']:1;
if ($p < 1) {$p = 1;}
if ($p > $totalPage) {$p = $totalPage;}

//3.计算偏移量
$offset = ($p-1) * $num;
$limit = "limit $offset,$num";
/****************** 分页结束 ******************/
$id = $_GET['id'];
// var_dump($id);
// die;

$sql = "select shop_detail.*, shop_goods.id,shop_goods.name,shop_goods.price,shop_goods.pic from shop_detail,shop_goods where shop_detail.gid=shop_goods.id and shop_detail.oid = $id;";
// echo $sql;
// exit;
// 对指定数据库进行查询
$res = mysqli_query($link, $sql);
//返回结果集中行数
if ($res && mysqli_num_rows($res) > 0) {
	//从结果集中取得所有行作为关联数组
	while ($row = mysqli_fetch_assoc($res)) {
		echo "<tr align='center'>
				<td>{$row['oid']}</td>
				<td>{$row['gid']}</td>
				<td>{$row['name']}</td>
				<td>{$row['price']}</td>
				<td>
					<img alt='345' height='80' width='80' src='../../Public/Goods/{$row['pic']}' />
				</td>
				<td>{$row['num']}</td>
			</tr>";
	}
} else {
	echo "<tr><td colspan='9'><h2>数据库出错啦~\(≧▽≦)/~~~~~</a></h2></td></tr>";
}
?>
		<tr>
			<td colspan="9">
				共<?=$total?>条 第<?=$p?>/<?=$totalPage?>页
				<span style="float:right">
				<a href="index.php?p=1<?=$search?>">首页</a> |
				<a href="index.php?p=<?=($p-1).$search?>">上一页</a> |
				<a href="index.php?p=<?=($p+1).$search?>">下一页</a> |
				<a href="index.php?p=<?=$totalPage.$search?>">尾页</a>
				</span>
			</td>
		</tr>
	</table>
</body>
</html>