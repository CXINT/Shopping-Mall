<?php
//判断非法访问
if (empty($_GET['a'])) {
	header('location:index.php');
	exit;
}
session_start();
// var_dump($_GET);
// die;

//连接数据库
include '../Public/config.php';
$link = mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败。<a href="index.php">返回</a>');
mysqli_set_charset($link, 'utf8');

switch ($_GET['a']) {
	case 'addGoods':	//添加单个商品到购物车
		if (empty($_GET['id'])) {
			header('location:shopcar.php');
			exit;
		}
		$id = $_GET['id'];
		if (empty($_SESSION['shopcar'][$id])) {
			//查出单条商品信息
			$sql = "select * from ".FIX."goods where id=$id limit 1";
			$res = mysqli_query($link, $sql);
			if ($res && mysqli_num_rows($res) > 0) {
				//找到了商品信息，将其写入session
				$info = mysqli_fetch_assoc($res);
				var_dump($info);
				$info['num'] = 1;

				$_SESSION['shopcar'][$id] = $info;
				header('location:shopcar.php');
			} else {
				header('location:shopcar.php');
				exit;
			}
		} else {
			$_SESSION['shopcar'][$id]['num']++;
			header('location:shopcar.php');
			exit;
		}
		break;

	case 'addNum': 	//处理购物车商品数量加1
		//判断非法访问
		if (empty($_GET['id'])) {
			header('location:shopcar.php');
			exit;
		}
		$id = $_GET['id'];

		//判断库存
		$sql = "select store from ".FIX."goods where id=$id limit 1";
		$res = mysqli_query($link, $sql);
		$store = mysqli_fetch_assoc($res)['store'];
		if ($store <= $_SESSION['shopcar'][$id]['num']) {
			echo '<script>alert("亲，库存不足了，别太贪心~~");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}

		//数量加加
		$_SESSION['shopcar'][$id]['num']++;
		header('location:shopcar.php');
		break;

	case 'cutNum':	//处理购物车商品数量减1
		//判断非法访问
		if (empty($_GET['id'])) {
			header('location:shopcar.php');
			exit;
		}
		$id = $_GET['id'];

		//判断不能小于1
		if ($_SESSION['shopcar'][$id]['num'] <= 1) {
			echo '<script>alert("亲，最后一个了，请删除商品~~");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		$_SESSION['shopcar'][$id]['num']--;
		header('location:shopcar.php');
		break;

	case 'delGoods':	//删除购物车中单个的商品
		//判断非法访问
		if (empty($_GET['id'])) {
			header('location:shopcar.php');
			exit;
		}
		$id = $_GET['id'];

		unset($_SESSION['shopcar'][$id]);
		header('location:shopcar.php');
		break;

	case 'delAll':	//清空购物车
		unset($_SESSION['shopcar']);
		header('location:shopcar.php');
		break;

	case 'login':	//处理前台登录
		//接收数据
		$username 	= $_POST['username'];
		$pwd 		= md5($_POST['pwd']);

		//判断用户名是否为空，是否合法
		$res = preg_match('/^[a-zA-Z]\w{4,13}$/', $_POST['username']);
		if(!$res){
			echo '<script>alert("亲，用户名格式错误");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}

		//判断账号和密码
		$sql = "select * from ".FIX."user where username='$username' and pwd='$pwd'";
		// echo $sql;exit;
		$res = mysqli_query($link, $sql);
		if ($res && mysqli_num_rows($res) > 0) {
			//登录成功，将用户信息写入session
			$info = mysqli_fetch_assoc($res);
			//判断状态
			
			//判断角色是否是管理员
			if ($info['status'] != 1) {
				echo '<script>alert("账号已被禁用，请联系管理员哥哥");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
				exit;
			}
			$_SESSION['homeInfo'] = $info;
			header('location:order.php');
		} else {
			echo '<script>alert("用户名或密码错误");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
		}
		break;

	case 'logout':	//退出登录
		unset($_SESSION['homeInfo']);
		header('location.href="'.$_SERVER['HTTP_REFERER'].'"');
		break;

	case 'addAddress':	//添加收货地址
		if (empty($_POST)) {
			echo '<script>alert("上传失败，请重新填写");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		// var_dump($_POST);
		//接收数据
		$address    = $_POST['address'];
        $phone      = $_POST['phone'];
        $name       = $_POST['name'];
        $is_defaul  = $_POST['is_defaul'];
        $uid        = $_SESSION['homeInfo']['id'];
  		//var_dump($_SESSION);
  		//var_dump($_POST);
		// die;

		//判断收件人名称是否合法：5~10个字符，可使用字母、数字、下划线，需以字母开头
		$res = preg_match('/^[a-zA-Z]\w\S{3,13}$/', $_POST['name']);
		if(!$res){
			echo '<script>alert("亲，用户名格式错误");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}

		//判断手机号是否为空,11位手机号
		$res = preg_match('/(1[358]{1}[0-9]{9})/i',$_POST['phone']);
		if((empty($res)) ||  (!$res)){
			echo '<script>alert("亲，手机号码填错了");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;	
		}

		//准备插入数据的sql语句
		//添加数据
		$sql = "insert into ".FIX."address(uid, address, name, phone, is_defaul) values($uid ,'$address', '$name', '$phone', $is_defaul)";
		// var_dump($sql);
		// die;
		//处理sql语句返回的数据结果
		$res = mysqli_query($link, $sql);
		if ($res && mysqli_affected_rows($link) > 0) {
			echo '<script>alert("添加成功");location.href="./order.php"</script>';
			exit;
		} else {
			echo '<script>alert("添加失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		break;
     
	case 'delAddress':	//删除地址
		if (empty($_GET['address'])) header('location:order.php');
		$address= $_GET['address'];
	
		//准备删除的sql语句
		$sql = "delete from ".FIX."address where address='$address'";
		// var_dump($sql);
		// die;
		//处理sql语句返回的数据结果
		$res = mysqli_query($link, $sql);
		if ($res && mysqli_affected_rows($link) > 0) {
			header('location:order.php');
		} else {
			echo '<script>alert("删除失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		break;		

	case 'addOrder':	//下单操作
		// var_dump($_POST);
		// var_dump($_SESSION);


		//判断选了地址没有
		if (empty($_POST['address'])) {
			echo '<script>alert("提交失败，请先填写一个收货地址~~~");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		} 

		//接收数据
		$uid = $_SESSION['homeInfo']['id'];
		$aid  = $_POST['address'];
		// var_dump($_SESSION);
		// var_dump($_POST);
		// die;		
		$total = 0;
		foreach($_SESSION['shopcar'] as $v){
    	$total += $v['price']*$v['num'];
		}
		// echo $total;
		$time = time();
		// var_dump($_POST);
		// var_dump($_SESSION);
		// var_dump($total);
		// die;

		$sql = 'insert into '.FIX."orders(total, addtime, uid, status, aid) values($total,  $time, $uid, 1, $aid)";
		// echo $sql;
		// die;
		$res = mysqli_query($link, $sql);
		if ($res && mysqli_affected_rows($link) > 0) {
			//再将商品信息插入订单详情
			$oid = mysqli_insert_id($link);
			$sql = 'insert into '.FIX."detail values";

			//循环拼接sql语句
			foreach ($_SESSION['shopcar'] as $v) {
				$sql .= "(null, $oid, {$v['id']}, {$v['num']}),";
			}
			//处理sql语句右边的逗号
			$sql = rtrim($sql, ',');
			// echo $sql;
			$res2 = mysqli_query($link, $sql);
			if ($res2 && mysqli_affected_rows($link) == count($_SESSION['shopcar'])) {
				//下单成功清空购物车
				unset($_SESSION['shopcar']);

				echo '<script>alert("亲，下单成功，请尽快付款");location.href="ok.php?oid='.$oid.'"</script>';
				exit;

			} else {
				echo '<script>alert("亲，下单失败，请联系客服人员");location.href="ok.php"</script>';
				exit;
			}
		} else {
			echo '<script>alert("亲，下单失败，请联系管理员");location.href="ok.php"</script>';
			exit;
		}

	case 'editUser':	//编辑用户
		if (empty($_POST)) header('location:./personinfo.php');
		//接收数据
		$id         = $_POST['id'];
		$username 	= $_POST['username'];
		$pwd 		= $_POST['pwd'];
		$phone		= $_POST['phone'];	
		$qq			= $_POST['qq'];
		// var_dump($_POST);
		$set = "username='$username', pwd='$pwd',phone='$phone',qq='$qq'";
		//判断用户名是否合法5~10个字符，可使用字母、数字、下划线，需以字母开头
		$res = preg_match('/^[a-zA-Z]\w\S{3,13}$/', $_POST['username']);
		if(!$res){
			echo '<script>alert("亲，用户名格式错误");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}

		//判断手机号是否为空,是否合格
		$res = preg_match('/(1[358]{1}[0-9]{9})/i',$phone);
		if((empty($res)) ||  (!$res)){
			echo '<script>alert("亲，手机号码填错了");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;	
		}
		//判断QQ号是否为空，是否合格
		$res = preg_match('/^[1-9][0-9]{4,10}\d$/',$qq);
		if((empty($res)) ||  (!$res)){
			echo '<script>alert("亲,QQ号码填错了");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		//准备修改的sql语句
		$sql = "update ".FIX."user set $set where id=$id";
		// var_dump($sql);
		// die;
		$res = mysqli_query($link, $sql);
		if ($res && mysqli_affected_rows($link) > 0) {
			echo '<script>alert("修改成功");location.href="personinfo.php"</script>';
			exit;
		} else{
			echo '<script>alert("修改失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		break;

	case 'del_Order':	//用户删除个人中心的订单
		//判断非法访问
		if (empty($_GET['oid'])) {
			header('location:./person_shop_detail.php');
			exit;
		}
		$id = $_GET['oid'];

		//准备删除的sql语句
		$sql = "delete from ".FIX."orders where id='$id'";
		// var_dump($sql);
		// die;
		//处理sql语句返回的数据结果
		$res = mysqli_query($link, $sql);
		if ($res && mysqli_affected_rows($link) > 0) {
			echo '<script>alert("删除成功");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		} else {
			echo '<script>alert("删除失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		break;

	case 'adduserAppraise':	//用户添加评价
		//判断是否有传值
		if (empty($_POST)) {
			echo '<script>alert("上传失败，请重新填写");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		//接收数据
    	$oid     = $_GET['oid'];
    	$pic     = $_GET['goodspic'];
    	$name    = $_GET['goodsname'];
    	$des     = $_POST['pingjia'];
    	$status  = $_POST['radio'];
    	// var_dump($_SESSION);
    	// var_dump($_POST);
    	// var_dump($_GET);
		// die;
		//准备插入数据的sql语句
		//添加数据
		$sql = "insert into ".FIX."appraise(oid, pic, name, des, status) values('$oid' ,'$pic', '$name', '$des', $status)";
		// var_dump($sql);
		// die;
		//处理sql语句返回的数据结果
		$res = mysqli_query($link, $sql);
		if ($res && mysqli_affected_rows($link) > 0) {
			echo '<script>alert("添加成功");location.href="./show_appraise.php"</script>';
			exit;
		} else {
			echo '<script>alert("添加失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		break;

	case 'delorderappraise':	//删除订单评价
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
	default:
		header('location:index.php');
}


