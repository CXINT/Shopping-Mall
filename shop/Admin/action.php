<?php
//判断非法访问
if (empty($_GET['a'])){
	header('location:index.php');
	exit;
}

session_start();

//连接数据库
include '../Public/config.php';
$link = mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败,<a href="index.php">返回</a>');
//设置字符集
mysqli_set_charset($link, 'utf8');

switch ($_GET['a']) {
	case 'login':
		//接收数据
		$username 	= $_POST['username'];
		$pwd 		= md5($_POST['pwd']);
		$yzm 		= $_POST['yzm'];

		//判断是否是管理员
		// $res = $_POST['username'];
		// var_dump($res);
		// if($res != 'amdin'){
		// 	echo '<script>alert("非法登录,你不是本站管理员.");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
		// 	exit;
		// }

		//判断用户名是否合法：5~10个字符，可使用字母、数字、下划线，需以字母开头
		$res = preg_match('/^[a-zA-Z]\w\S{3,13}$/', $_POST['username']);
		if(!$res){
			echo '<script>alert("亲，用户名格式错误");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		
		//判断密码合法性以及长度(5-12位)
        $res = preg_match('/\d{3,15}\w\S/', $_POST['pwd']);
		if( (!$res) && (strlen($_POST['pwd']) < 5 || strlen($_POST['pwd']) > 12)){
			echo '<script>alert("亲，密码长度有误");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}

		//判断验证码
		if (strtolower($yzm) != strtolower($_SESSION['yzm'])) {
			echo '<script>alert("验证码错误");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}

		//从数据库查询匹配账号密码
		$sql = "select * from ".FIX."user where username='$username' and pwd='$pwd'";
		// echo $sql;
		// exit;
		//处理从数据库返回的数据
		$res = mysqli_query($link, $sql);
		if ($res && mysqli_num_rows($res) > 0) {
			//登录成功，将用户信息写入session
			// var_dump(mysqli_fetch_assoc($res));exit;
			$row = mysqli_fetch_assoc($res);
			if($row['role'] == 1){
				echo '<script>alert("非法登录,你不是本站管理员.");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
				exit;
			}
			$_SESSION['adminInfo'] = $row;
			header('location:index.php');

		} else {
			echo '<script>alert("用户名或密码错误");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
		}
		break;

	case 'logout':	//退出登录
		unset($_SESSION['adminInfo']);
		header('location:index.php');
		break;

	default:
		header('location:index.php');
}