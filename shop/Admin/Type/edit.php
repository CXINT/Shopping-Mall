<?php
//判断有没有传id,name,pid,path并进行赋值
$id = $_GET['id'];
$name = $_GET['name'];
$pid = $_GET['pid'];
$ypath = $_GET['path'];

//将分类数据先查出来
//包含配置文件
include '../../Public/config.php';
//连接数据库
$link = mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败。<a href="index.php">返回</a>');
//设置字符集
mysqli_set_charset($link, 'utf8');
//准备sql查询语句
$sql = 'select * from '.FIX."type where path not like '%,{$id},%' order by concat(path, id)";
// 对指定数据库进行查询
$res = mysqli_query($link, $sql);
//从结果集中取得所有行作为关联数组
$arr = mysqli_fetch_all($res, MYSQLI_ASSOC);
// var_dump($arr);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>分类管理编辑页面</title>
	<link rel="stylesheet" rev="stylesheet" href="../css/style.css" type="text/css" media="all" />
<style type="text/css">
<!--
.atten {font-size:12px;font-weight:normal;color:#F00;}
-->
</style>
</head>

<body class="ContentBody">
  	<form action="action.php?a=edit" method="post">
  		<input type="hidden" name="ypath" value="<?=$ypath?>" />
  		<input type="hidden" name="id" value="<?=$id?>" />
	<div class="MainDiv">
		<table width="99%" border="0" cellpadding="0" cellspacing="0" class="CContent">
			<tr>
			    <th class="tablestyle_title" >添加分类</th>
			</tr>
			<tr>
			    <td class="CPanel">
					<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
					<tr>
						<td width="100%">
							<fieldset style="height:100%;">
							<legend>添加分类</legend>
								<table border="0" cellpadding="2" cellspacing="1" style="width:100%">
								  <tr>
								    <td nowrap align="right" width="33%">移动到:</td>
								    <td width="41%">
										<select name="path">
							<?php
								foreach ($arr as $v) {
									if ($pid == $v['id']) {
										$sel = 'selected';
									} else {
										$sel = '';
									}
									//制作缩进
									$num = substr_count($v['path'], ',');
									$str = '--'.str_repeat('--', $num);
									//foreach循环遍历输出
									echo "<option $sel value='{$v['path']}{$v['id']}'>{$str}{$v['name']}</option>";
								}
							?>			
										</select>
								    </td>
								  </tr>

								  <tr>
								    <td nowrap align="right" width="33%">分类名:</td>
								    <td width="41%"><input value="<?=$name?>" name="name" class="text" style="width:150px" type="text" size="40" />
							        <span class="red"> *</span></td>
								  </tr>
								</table>
						 	<br />
							</fieldset>			
						</td>
					</tr>
					</table>
				</td>
			</tr>	
			<tr>
				<td colspan="2" align="center" height="50px">
					<input type="submit" value="修改" class="button" />　
					<input type="reset" value="重置" class="button" />
					<a href="index.php">
						<input type="button" value="返回" class="button" />
					</a>
				</td>		
			</tr>		
		</table>
	</div>	
</form>
</body>
</html>
