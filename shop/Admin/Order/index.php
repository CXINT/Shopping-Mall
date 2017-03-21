<?php
session_start();
// var_dump($_SESSION);
// die;
if (empty($_SESSION['adminInfo'])) {
	header('Location:../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>订单列表</title>
	<style>
		a{text-decoration:none; color:#f60;}
	</style>
</head>
<body>
	<h1 style="color:#444851"><center>订单列表</center></h1>
	<hr>
	<!--用户查询搜索开始-->
	<form action="">
		 订单编号：<input type="text" value="<?=@$_GET['id']?>" name="id" /> 
		状态：	<select name="status">
				 	<option value="">--请选择--</option>
				 	<option <?=@($_GET['status']==1)?'selected':''?> value="1">已付款，未发货</option>
					 <option <?=@($_GET['status']==2)?'selected':''?> value="2">已发货</option>
			  	</select>
				<input type="submit" value="搜索">
	</form>
	<!--用户查询搜索结束-->
	<div style="height:4px;"></div>
	<!--用户数据遍历输出开始-->
	<table width="100%" border="1" cellspacing="0" cellpadding="10" style="color:#444851">
		<tr>
			<th>订单编号</th>
			<th>订单总价</th>
			<th>下单时间</th>
			<th>下单用户ID</th>
			<th>订单状态</th>
			<th>操作</th>
		</tr>
<?php
//包含配置文件
include '../../Public/config.php';
//连接数据库
$link = @mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败。<a target="_top" href="../index.php">返回</a>');
//设置字符集
mysqli_set_charset($link, 'utf8');

/****************** 搜索开始 ******************/
$where = 'where 1=1';
$search = '';
//拼接用户名搜索条件
if (!empty($_GET['id'])) {
$where .= " and id={$_GET['id']}";
$search .= '&id='.$_GET['id'];
}
//拼接状态
if (!empty($_GET['status'])) {
$where .= " and status=".$_GET['status'];
$search .= '&status='.$_GET['status'];
}

/****************** 搜索结束 ******************/	

/****************** 分页开始 ******************/
//1.设置每页显示条数
$num = 3;

//4.查出总条数
$sql = 'select count(*) from '.FIX."orders $where";
$res = mysqli_query($link, $sql);
$total = mysqli_fetch_row($res)[0];
// echo $total;
// exit;
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
$id = @$_SESSION['homeInfo']['id'];
//准备sql语句
$sql = "select * from shop_orders";
// echo $sql;
// exit;
// 查询指定数据库
$res = mysqli_query($link, $sql);
//返回结果集中行数
if ($res && mysqli_num_rows($res) > 0) {
	//从结果集中取得所有行作为关联数组
	while ($row = mysqli_fetch_assoc($res)) {
		//3三元运算符判断状态
		$status = ($row['status']==1)?'待发货':'已发货，待收货';
		//循环遍历输出
		echo "<tr align='center'>
				<td>{$row['id']}</td>
				<td>{$row['total']}</td>
				<td>".date('Y-m-d H:i:s', $row['addtime'])."</td>
				<td>{$row['uid']}</td>
				<td>
					<a href='action.php?a=status&id={$row['id']}&status={$row['status']}'>{$status}</a>
				</td>
				<td>
					<a href='./index_detail.php?id={$row['id']}'>订单详情</a>
				</td>
			</tr>";
	}
} else {
	echo "<tr><td colspan='9'><h2>数据库没有数据</a></h2></td></tr>";
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