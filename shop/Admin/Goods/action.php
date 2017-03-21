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
	case 'add': //添加商品
		if (empty($_POST)) {
			header('location:index.php');
		}
		// var_dump($_POST);
		// var_dump($_FILES);
		// exit;
		$info = upload('pic', '../../Public/Goods');
		if ($info['status']) {
			$pic = $info['name'];
		} else {
			echo '<script>alert("'.$info['msg'].'");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		//接收数据
		$tid 	= $_POST['tid'];
		$name 	= $_POST['name'];
		$price 	= $_POST['price'];
		$store 	= $_POST['store'];
		$status = $_POST['status'];
		$des 	= $_POST['des'];
		$time 	= time();
		// var_dump($_POST);
		// var_dump($_FILES);
		// die;
		//准备sql语句
		$sql = "insert into ".FIX."goods(tid, name, price, pic, des, status, store, addtime) values('$tid', '$name', '$price', '$pic', '$des', '$status', '$store', '$time')";
		// echo $sql;
		// 对指定数据库进行查询
		$res = mysqli_query($link, $sql);
		//返回前一次 MySQL 操作所影响的记录行数。
		if ($res && mysqli_affected_rows($link) > 0) {
			echo '<script>alert("添加成功");location.href="index.php"</script>';
			exit;
		} else {
			echo '<script>alert("添加失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		break;

	case 'status'://处理状态
		//判断是否传了id过来
		if (empty($_GET['id'])) header('location:index.php');
		//给$id,$status赋值
		$id = $_GET['id'];
		$status = ($_GET['status']==1)?2:1;
		//sql查询
		$sql = "update ".FIX."goods set status=$status where id=$id";
		// echo $sql;
		// 对指定数据库进行查询
		$res = mysqli_query($link, $sql);
		//返回前一次 MySQL 操作所影响的记录行数。
		if ($res && mysqli_affected_rows($link) > 0) {
			header('location:'.$_SERVER['HTTP_REFERER']);
		} else {
			echo '<script>alert("状态修改失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		break;

	case 'del'://删除商品
		//判断是否传了id过来
		if (empty($_GET['id'])) header('location:index.php');
		//把传过来的id赋值给$id
		$id = $_GET['id'];
		//准备sql查询
		$sql = "delete from ".FIX."goods where id=$id";
		// 对指定数据库进行查询
		$res = mysqli_query($link, $sql);
		////返回前一次 MySQL 操作所影响的记录行数。
		if ($res && mysqli_affected_rows($link) > 0) {
			header('location:index.php');
		} else {
			echo '<script>alert("删除失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		break;

	case 'edit'://编辑商品
		if (empty($_POST)) header('location:index.php');
		// var_dump($_POST);
		// var_dump($_FILES);
		//接收数据
		$id 	= $_POST['id'];
		$tid 	= $_POST['tid'];
		$name 	= $_POST['name'];
		$price 	= $_POST['price'];
		$store 	= $_POST['store'];
		$des 	= $_POST['des'];
		$set = "tid=$tid, name='$name', price='$price', store='$store', des='$des'";

		//判断是否修改商品图片
		if ($_FILES['pic']['error'] != 4) {
			$info = upload('pic', '../../Public/Goods');
			if ($info['status']) {
				$set .= ", pic='{$info['name']}'";
			} else {
				echo '<script>alert("'.$info['msg'].'");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
				exit;
			}
		}
		//准备sql查询
		$sql = "update ".FIX."goods set $set where id=$id";
		// echo $sql;
		// 对指定数据库进行查询
		$res = mysqli_query($link, $sql);
		//返回前一次 MySQL 操作所影响的记录行数。
		if ($res && mysqli_affected_rows($link) > 0) {
			echo '<script>alert("修改成功");location.href="index.php"</script>';
			exit;
		} else{
			echo '<script>alert("修改失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		break;
	case 'del_order_appraise':
	

	default:
		header('location:index.php');
}