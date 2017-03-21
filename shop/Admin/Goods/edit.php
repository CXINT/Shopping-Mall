<?php
if (empty($_GET['id'])) {
	header('location:index.php');
	exit;
}

//包含配置文件
include '../../Public/config.php';
//连接数据库
$link = mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败。<a href="index.php">返回</a>');
//设置字符集
mysqli_set_charset($link, 'utf8');

//查出所有的分类
//准备sql语句
$sql = 'select * from '.FIX."type order by concat(path, id)";
// 对指定数据库进行查询
$res = mysqli_query($link, $sql);
//返回结果集中行数
if ($res && mysqli_num_rows($res) > 0) {
	//从结果集中取得所有行作为关联数组：
	$arr = mysqli_fetch_all($res, MYSQLI_ASSOC);
} else {
	echo '<script>alert("没有分类数据，请先编辑分类");location.href="../Type/add.php"</script>';
	exit;
}

//查出当前条商品信息
$id = $_GET['id'];
//准备sql查询语句
$sql = 'select * from '.FIX."goods where id=$id";
// 对指定数据库进行查询
$res = mysqli_query($link, $sql);
//返回结果集中行数
if ($res && mysqli_num_rows($res) > 0) {
	//从结果集中取得所有行作为关联数组：
	$info = mysqli_fetch_assoc($res);
} else {
	echo '<script>alert("亲，别乱来~~~");location.href="index.php"</script>';
	exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>项目管理系统 by www.nongfuit.com</title>
	<link rel="stylesheet" rev="stylesheet" href="../css/style.css" type="text/css" media="all" />
	<style type="text/css">
		<!--
		.atten {font-size:12px;font-weight:normal;color:#F00;}
		-->
	</style>
</head>

<body class="ContentBody">
  <form action="action.php?a=edit" method="post" enctype="multipart/form-data">
  	<input type="hidden" name="id" value="<?=$id?>" />
		<h2 style="color:#444851"><center>商品编辑页面</center></h2>
			<fieldset style="height:100%;">
				<table border="0" cellpadding="2" cellspacing="1" style="width:100%">
					  	<tr>
					    	<td nowrap align="right" width="30%">分类:</td>
					    	<td width="41%">
								<select name="tid">
				<?php 
					foreach ($arr as $v) {
						$dis = ($v['pid'] == 0) ? 'disabled': '';
						$sel = ($v['id'] == $_GET['tid']) ? 'selected': '';
						//制作缩进
						$num = substr_count($v['path'], ',');
						$str = '--'.str_repeat('--', $num); 
						echo "<option $dis $sel value='{$v['id']}'>{$str}{$v['name']}</option>";
					}
				?>
								</select>
					    	</td>
					  	</tr>
					  	<tr>
					    	<td nowrap align="right" width="30%">商品名:</td>
					    	<td width="41%"><input value="<?=$info['name']?>" name="name" class="text" style="width:180px" type="text" size="40" />
					  	</tr>
					  	<tr>
					    	<td nowrap align="right" width="30%">价格:</td>
					    	<td width="41%"><input value="<?=$info['price']?>" name="price" class="text" style="width:180px" type="number" size="40" />
					  	</tr>
					  	<tr>
					    	<td nowrap align="right" width="30%">商品图片:</td>
					    	<td width="41%">
					    		<input name="pic" class="text" style="width:180px" type="file" size="40" />
				        	</td>
					  	</tr>
					  	<tr>
					  		<td></td>
					  		<td><img src="<?='../../Public'.'/Goods/'.$info['pic']?>" height="80" /></td>
					  	</tr>
					  	<tr>
					    	<td nowrap align="right" width="30%">库存:</td>
					    	<td width="41%">
					    	<input value="<?=$info['store']?>" name="store" class="text" style="width:180px" type="number" size="40" />
				        	</td>
					  	</tr>

					  	<tr>
					   		<td nowrap align="right" width="30%" style="position: relative;">描述:</td>
					    	<td width="41%">
					    		<textarea name="des" cols="23" rows="5"><?=$info['des']?></textarea>
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
					</table>
			 		<br />
				</fieldset>	
			</table>
		</div>		
	</form>	
</body>
</html>	
	




