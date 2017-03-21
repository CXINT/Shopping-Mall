<?php
//判断非法访问
if (empty($_GET['a'])) {
	header('location:login.htm');
	exit;
}
session_start();

//连接数据库
include '../Public/config.php';
$link = mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败,<a href="login.php">返回</a>');
mysqli_set_charset($link, 'utf8');

switch ($_GET['a']) {
	case 'add':
		if (empty($_POST)) header('location:register.htm');
		//接收数据
		$username 	= $_POST['username'];
		$pwd 		= md5($_POST['pwd']);
		$pwd2 		= md5($_POST['pwd2']);
		$phone		= $_POST['phone'];
		$qq         = $_POST['qq'];
		// var_dump($_POST);
		// var_dump($_SESSION);
		// exit;
		
	}
		//判断用户名是否合法：5~10个字符，可使用字母、数字、下划线，需以字母开头
		$res = preg_match('/^[a-zA-Z]\w\S{4,13}$/', $_POST['username']);
		if(!$res){
			echo '<script>alert("亲，用户名格式错误");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}

		//判断密码合法性以及长度(5-12位)
        $res = preg_match('/\d{3,12}\w\S/', $_POST['pwd']);
		if( (!$res) && (strlen($_POST['pwd']) < 5 || strlen($_POST['pwd']) > 22)){
			echo '<script>alert("亲，密码长度有误");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}

		//判断两次密码是否一致
		if((md5($_POST['pwd'])) != (md5($_POST['pwd2']))){
			echo '<script>alert("两次输入的密码不一致");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}

		//判断手机号是否为空,是否合格
		$res = preg_match('/(1[358]{1}[0-9]{9})/i',$_POST['phone']);
		if((empty($res)) ||  (!$res)){
			echo '<script>alert("亲，手机号码格式填错了");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;	
		}
		//判断QQ号是否为空，是否合格，输入10位的QQ号
		$res = preg_match('/^[1-9][0-9]{4,10}\d$/',$_POST['qq']);
		if((empty($res)) ||  (!$res)){
			echo '<script>alert("亲,QQ号码填错了");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}

		
		//发送sql语句
		$sql = "insert into ".FIX."user(username, pwd,  phone, qq) values('$username', '$pwd', '$phone', '$qq')";
		// echo $sql;
		// exit;
		$res = mysqli_query($link, $sql);
		if ($res && mysqli_affected_rows($link) > 0) {
			header('location:./login.htm');
			exit;
		} else {
			echo '<script>alert("注册失败，请重新注册");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		exit;
?>






		