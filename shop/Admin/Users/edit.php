<?php
//判读是否传了id
if (empty($_GET['id'])) {
	header('location:index.php');
	exit;
}
$id = $_GET['id'];
//连接数据库
include '../../Public/config.php';
$link = @mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败。<a target="_top" href="../index.php">返回</a>');
//设置字符集编码
mysqli_set_charset($link, 'utf8');
//发送sql查询语句
$sql = 'select * from '.FIX."user where id=$id limit 1";
//处理sql语句返回的数据
$res = mysqli_query($link, $sql);
if ($res && mysqli_num_rows($res) > 0) {
	$info = mysqli_fetch_assoc($res);
} else {
	header('location:index.php');
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑用户信息</title>
<link rel="stylesheet" rev="stylesheet" href="../css/style.css" type="text/css" media="all" />
<style type="text/css">
<!--
.atten {font-size:12px;font-weight:normal;color:#F00;}
-->
</style>
</head>

<body class="ContentBody">
  	<form action="action.php?a=edit" method="post">
	  	<input type="hidden" name="id" value="<?=$id?>" />
		<div class="MainDiv">
			<table width="99%" border="0" cellpadding="0" cellspacing="0" class="CContent">
	  			<tr>
	      			<th class="tablestyle_title" >用户编辑页面</th>
	  			</tr>
	  			<tr>
	    			<td class="CPanel">
			
					<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
						<tr>
							<td width="100%">
							<fieldset style="height:100%;">
							<legend>编辑用户</legend>
								<table border="0" cellpadding="2" cellspacing="1" style="width:100%">
							 
								  	<tr>
									    <td nowrap align="right" width="13%">用户名:</td>
									    <td width="41%"><input name="username" class="text" style="width:150px" type="text" value="<?=$info['username']?>" size="40" />
								        <span class="red"> *</span></td>
								  	</tr>
								  	<tr>
									    <td nowrap align="right" width="13%">密码:</td>
									    <td width="41%"><input name="pwd" class="text" style="width:150px" type="password" size="40" />
							        	<span class="red">请输入5-12位的密码</span></td>
								  	</tr>
									<tr>
									    <td nowrap align="right" width="13%">确认密码:</td>
									    <td width="41%"><input name="pwd2" class="text" style="width:150px" type="password" size="40" />
								        <span class="red">请再次输入密码</span></td>
									</tr>
								    <tr>
									    <td nowrap align="right" width="13%">手机号:</td>
									    <td width="41%"><input type="text" name="phone" class="text" style="width:150px"  size="40" />
								        <span class="red">请填写11位的手机号码</span></td>
								  	</tr>
								  	<tr>
									    <td nowrap align="right" width="13%">QQ号:</td>
									    <td width="41%"><input  name="qq" class="text" style="width:150px" type="text" size="40" />
							        <span class="red">请填写10位QQ号</span></td>
								 	</tr>

									<tr>
									    <td nowrap align="right" width="13%">角色:</td>
									    <td width="41%">
									    	<select name="role">
									    		<option value="1">普通用户</option>
									    		<option value="2">管理员</option>
									    	</select>
									    </td>
									</tr>
								</table>
					 			<br>
							</fieldset>			
							</td>
						</tr>
					</table>
					</td>
				</tr>	
				<tr>
					<td colspan="2" align="center" height="50px">
					<input type="submit" value="修改" class="button" />　
					<a href="index.php"><input type="button" value="返回" class="button" /></a>
					</td>
				</tr>	 
			</table>
		</div>
	</form>
</body>
</html>
