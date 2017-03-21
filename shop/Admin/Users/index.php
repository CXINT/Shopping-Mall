<?php
//开启session
session_start();
if (empty($_SESSION['adminInfo'])) {
	header('Location:../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户列表</title>
	<style>
		a{text-decoration:none; color:#f60;}
	</style>
</head>
<body>
	<h1 style="color:#444851"><center>用户列表</centre></h1>
	<hr>
<!--用户查询搜索开始-->
	<form action="">
		用户名：<input type="text" value="<?=@$_GET['username']?>" name="username" />
		角色：<select name="role">
				 <option value="">--请选择--</option>
				 <option <?=@($_GET['role']==1)?'selected':''?> value="1">普通会员</option>
				 <option <?=@($_GET['role']==2)?'selected':''?> value="2">管理员</option>
			  </select>
		<input type="submit" value="搜索">
	</form>
<!--用户查询搜索结束-->
	<div style="height:3px;"></div>
<!--用户数据遍历输出开始-->
	<table width="100%" border="1" cellspacing="0" cellpadding="10" style="color:#444851">
		<tr>
			<th>编号</th>
			<th>用户名</th>
			<th>角色</th>
			<th>状态</th>
			<th>手机号</th>
			<th>QQ号</th>
			<th>添加时间</th>
			<th>操作</th>
		</tr>
<?php
//连接数据库
include '../../Public/config.php';
$link = @mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败。<a target="_top" href="../index.php">返回</a>');
mysqli_set_charset($link, 'utf8');

/****************** 搜索开始 ******************/
$where = 'where 1=1';
$search = '';
//拼接用户名搜索条件
if (!empty($_GET['username'])) {
	$where .= " and username like '%{$_GET['username']}%'";
	$search .= '&username='.$_GET['username'];
}
//拼接角色
if (!empty($_GET['role'])) {
	$where .= " and role=".$_GET['role'];
	$search .= '&role='.$_GET['role'];
}
/****************** 搜索结束 ******************/

/****************** 分页开始 ******************/
//1.设置每页显示条数
$num = 6;

//4.查出总条数
$sql = 'select count(*) from '.FIX."user $where";
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

$sql = "select * from ".FIX."user $where order by role desc,id asc $limit";
// echo $sql;
$res = mysqli_query($link, $sql);
if ($res && mysqli_num_rows($res) > 0) {
	while ($row = mysqli_fetch_assoc($res)) {
		$role = ($row['role']==1)?'普通会员':'管理员';
		$status = ($row['status']==1)?'正常':'禁用';
		echo "<tr align='center'>
			<td>{$row['id']}</td>
			<td>{$row['username']}</td>
			<td>{$role}</td>
			<td>
				<a href='action.php?a=status&id={$row['id']}&status={$row['status']}'>{$status}</a>
			</td>
			<td>{$row['phone']}</td>
			<td>{$row['qq']}</td>
			<td>".date('Y-m-d H:i:s', $row['addtime'])."</td>
			<td>
				<a href='action.php?a=del&id={$row['id']}'>删除</a>
				<a href='edit.php?id={$row['id']}'>编辑</a>
			</td>
		</tr>";
	}	
}
?>
<!--用户数据遍历输出结束-->
<!--表格分页信息开始-->
		<tr>
			<td colspan="8">
				共<?=$total?>条 第<?=$p?>/<?=$totalPage?>页
				<span style="float:right">
				<a href="index.php?p=1<?=$search?>">首页</a> |
				<a href="index.php?p=<?=($p-1).$search?>">上一页</a> |
				<a href="index.php?p=<?=($p+1).$search?>">下一页</a> |
				<a href="index.php?p=<?=$totalPage.$search?>">尾页</a>
				</span>
			</td>
		</tr>
<!--表格分页信息结束-->
	</table>
</body>
</html>