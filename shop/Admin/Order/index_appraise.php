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
	<title>订单评价</title>
	<style>
		a{text-decoration:none; color:#f60;}
	</style>
</head>
<body>
	<h1 style="color:#444851"><center>订单评价</center></h1>
	<hr>
	<!--用户查询搜索开始-->
	<form action="">
		订单编号：<input type="text" value="<?=@$_GET['id']?>" name="id" />
		满意度：<select name="status">
				 	<option value="">--请选择--</option>
				 	<option <?=@($_GET['status']==1)?'selected':''?> value="1">满意</option>
					 <option <?=@($_GET['status']==2)?'selected':''?> value="2">不满意</option>
			  	</select>
				<input type="submit" value="搜索">
	</form>
	<!--用户查询搜索结束-->
	<div style="height:4px;"></div>
	<!--用户数据遍历输出开始-->
	<table width="100%" border="1" cellspacing="0" cellpadding="10" style="color:#444851">
		<tr>
			<th>评价表ID号</th>
			<th>订单编号</th>
			<th>商品图片</th>
			<th>商品名称</th>
			<th>对此次购物的评价</th>
			<th>满意度</th>
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
//拼接角色
if (!empty($_GET['status'])) {
	$where .= " and status=".$_GET['status'];
	$search .= '&status='.$_GET['status'];
}
/****************** 搜索结束 ******************/

/****************** 分页开始 ******************/
//1.设置每页显示条数
$num = 2;

//4.查出总条数
$sql = 'select count(*) from '.FIX."appraise $where";
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

$sql ="select * from shop_appraise $where order by status desc,id asc $limit";
$res = mysqli_query($link,$sql);
if ($res && mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
    	$status = ($row['status']==1)?'满意':'不满意';
            echo "<tr align='center'>
            		<td>{$row['id']}</td>
            		<td>{$row['oid']}<br /></td>
            		<td>
                		<img alt='345' height='80' width='80' src='../../Public/Goods/{$row['pic']}' />
            		</td> 
            		<td><span>{$row['name']}</span></td>   
            		<td><span>{$row['des']}</span></td>
            		<td>{$status}</td>
           		 	<td>
						<a href='action.php?a=delorderappraise&id={$row['id']}'>删除</a>
					</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='9'><h2>数据库没有数据</h2></td></tr>";
}
?>
		<tr>
			<td colspan="9">
				共<?=$total?>条 第<?=$p?>/<?=$totalPage?>页
				<span style="float:right">
				<a href="index_appraise.php?p=1<?=$search?>">首页</a> |
				<a href="index_appraise.php?p=<?=($p-1).$search?>">上一页</a> |
				<a href="index_appraise.php?p=<?=($p+1).$search?>">下一页</a> |
				<a href="index_appraise.php?p=<?=$totalPage.$search?>">尾页</a>
				</span>
			</td>
		</tr> 
	</table>
</body>
</html>