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
	<title>分类列表</title>
	<style>
		a{text-decoration:none; color:#f60;}
	</style>
</head>
<body>
	<h1 style="color:#444851"><center>分类列表</center></h1>
	<hr>
	<table width="100%" border="1" cellspacing="0" cellpadding="10">
	<!-- 表头 -->
		<tr>
			<th>编号</th>
			<th>分类名</th>
			<th>父类ID</th>
			<th>path路径</th>
			<th>操作</th>
		</tr>
<?php
//包含配置文件
include '../../Public/config.php';
//连接数据库
$link = @mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败。<a target="_top" href="../index.php">返回</a>');
//设置字符集
mysqli_set_charset($link, 'utf8');
//准备sql语句
$sql = "select * from ".FIX."type order by concat(`path`, `id`)";
// echo $sql;
// 对指定数据库进行查询
$res = mysqli_query($link, $sql);
//返回结果集中行数
if ($res && mysqli_num_rows($res) > 0) {
	//从结果集中取得所有行作为关联数组
	while ($row = mysqli_fetch_assoc($res)) {
		//制作缩进
		$num = substr_count($row['path'], ',');
		$str = '--'.str_repeat('--', $num);
		//循环遍历输出
		echo "<tr align='center'>
				<td>{$row['id']}</td>
				<td align='left'>{$str}{$row['name']}</td>
				<td>{$row['pid']}</td>
				<td align='left'>{$row['path']}</td>
				<td>
					<a href='action.php?a=del&id={$row['id']}'>删除</a>
					<a href='edit.php?pid={$row['pid']}&path={$row['path']}&id={$row['id']}&name={$row['name']}'>编辑</a>
					<a href='add.php?id={$row['id']}&path={$row['path']}'>添加子分类</a>
				</td>
			</tr>";
	}
}

?>
	</table>
</body>
</html>