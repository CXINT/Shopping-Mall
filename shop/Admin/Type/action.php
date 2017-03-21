<?php
//判断非法访问
if (empty($_GET['a'])) {
	header('location:index.php');
	exit;
}

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
		$name = $_POST['name'];
		$pid = $_POST['pid'];
		$path = $_POST['path'];
		
		//判断分类名是否合法
		$res = preg_match('/^\S\W{5,25}$/',$_POST['name']);
		if(!$res){
			echo '<script>alert("分类名格式错误，请重新输入");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}

		//准备sql语句
		$sql = "insert into ".FIX."type values(null, '$name', '$pid', '$path')";
		// echo $sql;
		//对指定数据库进行查询
		$res = mysqli_query($link, $sql);
		//返回前一次 MySQL 操作所影响的记录行数
		if ($res && mysqli_affected_rows($link) > 0) {
			echo '<script>alert("添加成功");location.href="index.php"</script>';
			exit;
		} else {
			echo '<script>alert("添加失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		break;

	case 'del'://删除分类
		//判断id是否为空
		if (empty($_GET['id'])) header('location:index.php');
		$id = $_GET['id'];

		//判断是否有子类
		//准备sql查询语句
		$sql = 'select * from '.FIX."type where pid=$id";
		// 对指定数据库进行查询
		$res = mysqli_query($link, $sql);
		//返回结果集中行数
		if ($res && mysqli_num_rows($res) > 0) {
			echo '<script>alert("请先删除掉你的后代");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		//判断是否有商品
		//准备sql查询语句
		$sql = 'select * from '.FIX."goods where tid=$id";
		// 对指定数据库进行查询
		$res = mysqli_query($link, $sql);
		//返回结果集中行数并进行判断
		if ($res && mysqli_num_rows($res) > 0) {
			echo '<script>alert("请删除掉商品");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		//准备sql查询语句
		$sql = "delete from ".FIX."type where id=$id";
		// 对指定数据库进行查询
		$res = mysqli_query($link, $sql);
		//返回前一次 MySQL 操作所影响的记录行数。
		if ($res && mysqli_affected_rows($link) > 0) {
			header('location:index.php');
		} else {
			echo '<script>alert("删除失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
			exit;
		}
		break;

	case 'edit'://编辑分类
		//判断post传来的值是否为空
		if (empty($_POST)) header('location:index.php');
		// var_dump($_POST);
		//1.先修改当前条数据
		$id = $_POST['id'];
		$name = $_POST['name'];
		$path = $_POST['path'].',';
		$pid = ltrim(strrchr($_POST['path'], ','), ',');
		$sql = "update ".FIX."type set name='$name', pid='$pid', path='$path' where id=$id";
		// echo $sql;
		mysqli_query($link, $sql);
		
		//2.处理后代数据
		$like = $_POST['ypath'].$id.',';
		//准备sql查询语句
		$sql = 'select * from '.FIX."type where path like '$like%';";
		// 对指定数据库进行查询
		$res = mysqli_query($link, $sql);
		//从结果集中取得所有行作为关联数组
		$son = mysqli_fetch_all($res, MYSQLI_ASSOC);
		//foreach循环遍历输出
		foreach ($son as $v) {
			$sonPath = str_replace($like, $path.$id.',', $v['path']);
			$sql = "update ".FIX."type set path='$sonPath' where id={$v['id']}";

			mysqli_query($link, $sql);
		}
		break;
	default:
		header('location:index.php');
}