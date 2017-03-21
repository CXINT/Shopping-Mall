<?php
//判断非法访问
if (empty($_GET['a'])) {
	header('location:index.php');
	exit;
}
session_start();

//包含配置文件
include '../../Public/config.php';
include '../../Public/function.php';
//连接数据库
$link = mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败。<a href="index.php">返回</a>');
//设置字符集
mysqli_set_charset($link, 'utf8');

switch ($_GET['a']) {
	case 'delorderappraise'://删除订单评价
		if (empty($_GET['id'])) header('location:index.php');
		$id = $_GET['id'];

		//准备删除的sql语句
		$sql = "delete from ".FIX."appraise where id=$id";
		//处理sql语句返回的数据结果
		$res = mysqli_query($link, $sql);
		if ($res && mysqli_affected_rows($link) > 0) {
			// header('location:index.php');
			echo '<script>alert("删除成功");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		} else {
			echo '<script>alert("删除失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		break;

	case 'status';
	$id = $_GET['id'];
	$status = $_GET['status'];
	if($status == 1){
		$status = 2;
	}
	$sql = "update shop_orders set status=$status where id=$id";
	// echo $sql;exit;
	$res = mysqli_query($link,$sql);
	if ($res && mysqli_affected_rows($link) > 0){
	// var_dump($_GET);exit;
		echo '<script>alert("修改成功");location.href="index.php"</script>';
			exit;
		} else{
			echo '<script>alert("修改失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		break;


	default:
		header('location:index.php');
}