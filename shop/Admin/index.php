<?php
//开启session并且判断是否合法
	session_start();
	if (empty($_SESSION['adminInfo'])) {
		header('Location:login.php');
	}
?>

<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>聚美优品后台管理系统首页</title>
</head>
<!--框架集-->
<frameset rows="59,*" cols="*" frameborder="no" border="0" framespacing="0">
	<frame src="./files/header.html" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" style="background:#444851"/>
	<frameset cols="213,*" frameborder="no" border="0" framespacing="0">
	    <frame src="./files/left.php" name="leftFrame" scrolling="No" noresize="noresize" id="leftFrame" title="leftFrame" />
	    <frame src="./files/mainfra.php" name="mainFrame" id="mainFrame" title="mainFrame" />
 	</frameset>
</frameset>
<noframes>
</noframes>
</html>
