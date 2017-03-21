<?php
//判断非法访问
if (empty($_GET['a'])) {
	header('location:index.php');
	exit;
}
session_start();

//包含配置文件
include '../../Public/config.php';
//连接数据库
$link = mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败。<a href="index.php">返回</a>');
//设置字符集
mysqli_set_charset($link, 'utf8');

switch ($_GET['a']) {
	case 'add':
		if (empty($_POST)) header('location:index.php');
		// var_dump($_POST);
		//接收数据
		$username 	= $_POST['username'];
		$pwd 		= md5($_POST['pwd']);
		$pwd2 		= md5($_POST['pwd2']);
        $phone      = $_POST['phone'];
        $qq         = $_POST['qq'];
		$role 		= $_POST['role'];
		$time 		= time();
		// exit;

		//判断用户名是否合法：5-10个字符，可使用字母、数字、下划线，需以字母开头
		$res = preg_match('/[a-zA-Z]\w{3,13}\S/', $_POST['username']);
		if(!$res){
			echo '<script>alert("亲，用户名格式错误");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}

		//判断密码合法性以及长度(5-12位)
        $res = preg_match('/\d{3,15}\w\S/', $_POST['pwd']);
		if( (!$res) && (strlen($_POST['pwd']) < 5 || strlen($_POST['pwd']) > 22)){
			echo '<script>alert("亲，密码长度有误");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}

		//判断两次密码是否一致
		if ($pwd != $pwd2) {
			echo '<script>alert("两次密码不一致");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}

		//判断手机号是否为空,是否合格
		$res = preg_match('/(1[358]{1}[0-9]{9})/i',$_POST['phone']);
		if((empty($res)) ||  (!$res)){
			echo '<script>alert("亲，手机号码填错了");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;	
		}
		//判断QQ号是否为空，是否合格，输入10位的QQ号
		$res = preg_match('/[1-9]{1}[0-9]\d/',$_POST['qq']);
		if((empty($res)) ||  (!$res)){
			echo '<script>alert("亲,QQ号码填错了");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}


		//准备插入数据的sql语句
		//添加数据
		$sql = "insert into ".FIX."user(username, pwd, role, phone, qq, addtime) values('$username', '$pwd', '$role', '$phone', '$qq', '$time')";
		//处理sql语句返回的数据结果
		$res = mysqli_query($link, $sql);
		if ($res && mysqli_affected_rows($link) > 0) {
			echo '<script>alert("添加成功");location.href="index.php"</script>';
			exit;
		} else {
			echo '<script>alert("添加失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		break;

	case 'status'://处理状态
		if (empty($_GET['id'])) header('location:index.php');
		$id = $_GET['id'];

		$sql = "select role from ".FIX."user where id='$id'";
		$res = mysqli_query($link,$sql);
		$role2 = mysqli_fetch_row($res)[0];
		$role =$_SESSION['adminInfo']['role'];
		if ($role < $role2) {
			echo '<script>alert("你没有权限");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		//判断是否是修改自己的状态
		if ($_SESSION['adminInfo']['id'] == $id) {
			echo '<script>alert("不能修改自己的状态");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		$status = ($_GET['status']==1)?2:1;
		//准备修改状态的sql语句
		$sql = "update ".FIX."user set status=$status where id=$id";
		//处理sql语句返回的数据结果
		$res = mysqli_query($link, $sql);
		if ($res && mysqli_affected_rows($link) > 0) {
			header('location:'.$_SERVER['HTTP_REFERER']);
		} else {
			echo '<script>alert("状态修改失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		break;

	case 'del'://删除用户
		if (empty($_GET['id'])) header('location:index.php');
		$id = $_GET['id'];

		$sql = "select role from ".FIX."user where id='$id'";
		$res = mysqli_query($link,$sql);
		$role2 = mysqli_fetch_row($res)[0];
		$role =$_SESSION['adminInfo']['role'];
		if ($role < $role2) {
			echo '<script>alert("你没有权限");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		//判断是否删的是自己
		if ($_SESSION['adminInfo']['id'] == $id) {
			echo '<script>alert("错误，你没有删除操作权限！");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		//准备删除的sql语句
		$sql = "delete from ".FIX."user where id=$id";
		//处理sql语句返回的数据结果
		$res = mysqli_query($link, $sql);
		if ($res && mysqli_affected_rows($link) > 0) {
			header('location:index.php');
		} else {
			echo '<script>alert("删除失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		break;

	case 'edit'://编辑用户
		if (empty($_POST)) header('location:index.php');
		var_dump($_POST);
		//接收数据
		$username 	= $_POST['username'];
		$role 		= $_POST['role'];
		$id 		= $_POST['id'];
		$phone		= $_POST['phone'];	
		$qq			= $_POST['qq'];
		

		$sql = "select role from ".FIX."user where id='$id'";
		$res = mysqli_query($link,$sql);
		$role2 = mysqli_fetch_row($res)[0];
		$role =$_SESSION['adminInfo']['role'];
		if ($role < $role2) {
			echo '<script>alert("你没有权限");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		//判断用户名是否合法
		$set = "username='$username', role=$role";
		if (!empty($_POST['pwd'])) {
			$pwd 		= md5($_POST['pwd']);
			$pwd2 		= md5($_POST['pwd2']);
			$set .= ", pwd='$pwd'";
		}

		//判断密码合法性以及长度(5-12位)
        $res = preg_match('/\d{3,10}\w\S/', $_POST['pwd']);
		if( (!$res) && (strlen($_POST['pwd']) < 5 || strlen($_POST['pwd']) > 22)){
			echo '<script>alert("亲，密码长度有误");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}

		//判断两次密码是否一致
		if ($pwd != $pwd2) {
			echo '<script>alert("两次密码不一致");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		//判断手机号是否为空,是否合格
		$res = preg_match('/(1[358]{1}[0-9]{9})/i',$_POST['phone']);
		if((empty($res)) ||  (!$res)){
			echo '<script>alert("亲，手机号码填错了");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;	
		}
		//判断QQ号是否为空，是否合格，输入10位的QQ号
		$res = preg_match('/^[1-9][0-9]{4,10}\d$/',$_POST['qq']);
		if((empty($res)) ||  (!$res)){
			echo '<script>alert("亲,QQ号码填错了");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		//准备修改的sql语句
		$sql = "update ".FIX."user set $set where id=$id";
		$res = mysqli_query($link, $sql);
		if ($res && mysqli_affected_rows($link) > 0) {
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