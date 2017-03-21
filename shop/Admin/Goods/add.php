<?php
//查出所有的分类
//包含配置文件
include '../../Public/config.php';
//连接数据库
$link = mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败。<a href="index.php">返回</a>');
//设置字符集
mysqli_set_charset($link, 'utf8');

//准备sql查询语句
$sql = 'select * from '.FIX."type order by concat(path, id)";
//接收处理数据
$res = mysqli_query($link, $sql);
//返回结果集中行数
if ($res && mysqli_num_rows($res) > 0) {
	//从结果集中取得所有行作为关联数组,获取数据
	$arr = mysqli_fetch_all($res, MYSQLI_ASSOC);
} else {
	echo '<script>alert("没有分类数据，请先添加分类");location.href="../Type/add.php"</script>';
	exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>添加商品分类</title>
	<link rel="stylesheet" rev="stylesheet" href="../css/style.css" type="text/css" media="all" />
<style type="text/css">

.atten {font-size:12px;font-weight:normal;color:#F00;}

</style>
</head>

<body class="ContentBody">
  	<form action="action.php?a=add" method="post" enctype="multipart/form-data">
	    <h2 style="color:#444851"><center>添加商品</center></h2>
			<fieldset style="height:100%;">
				<table border="0" cellpadding="2" cellspacing="1" style="width:100%">
					<tr>
						<td nowrap align="right" width="35%">分类:</td>
						<td width="41%">	    
							<select name="tid">		
					<?php 
						foreach ($arr as $v) {
							$dis = ($v['pid'] == 0) ? 'disabled': '';
							//制作缩进
							$num = substr_count($v['path'], ',');
							$str = '--'.str_repeat('--', $num); 
							echo "<option $dis value='{$v['id']}'>{$str}{$v['name']}</option>";
						}
					?>
							</select>		
						</td>	    
					</tr>	  	
					<tr>		
						<td nowrap align="right" width="35%">商品名:</td>
						<td width="41%"><input name="name" class="text" style="width:150px" type="text" size="40" />	     
					</tr>			   
					<tr>	  	
						<td nowrap align="right" width="35%">价格:</td>    	
						<td width="41%"><input name="price" class="text" style="width:150px" type="number" size="40" />
					</tr>
					<tr>
						<td nowrap align="right" width="35%">商品图片:</td>
						<td width="41%"><input name="pic" class="text" style="width:150px" type="file" size="40" />
					    </td>
					</tr>
					<tr>
						<td nowrap align="right" width="35%">库存:</td>
						<td width="41%">
							<input name="store" class="text" style="width:150px" type="number" size="40" />
						</td>
					</tr>
					<tr>
						<td nowrap align="right" width="35%">状态:</td>
						<td width="41%">
							<select name="status">
							    <option value="1">在售中</option>
							    <option value="2">已下架</option>
							</select>
						</td>
					</tr>
					<tr>
						<td nowrap align="right" width="35%">描述:</td>
						<td width="41%">
							<textarea name="des" cols="20" rows="5">
							</textarea>
						</td>
					</tr>
					<tr>
						<td nowrap align="right" width="35%"></td>
						<td width="41%">
							<input type="submit" value="添加" class="button" />　
							<input type="reset" value="重置" class="button" />
						</td>
					</tr>
				</table>
				<br />
			</fieldset>
		</table>
	</div>
	</form>
</body>
</html>
