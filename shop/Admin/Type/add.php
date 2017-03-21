<?php
//判断是否拿到了id和path
if (!empty($_GET['id']) && !empty($_GET['path'])) {
	$pid = $_GET['id'];
	$path = $_GET['path'].$_GET['id'].',';
} else {
	$pid = 0;
	$path = '0,';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>分类管理添加页面</title>
	<link rel="stylesheet" rev="stylesheet" href="../css/style.css" type="text/css" media="all" />
<style type="text/css">
<!--
.atten {font-size:12px;font-weight:normal;color:#F00;}
-->
</style>
</head>

<body class="ContentBody">
  	<form action="action.php?a=add" method="post">
  		<input type="hidden" name="pid" value="<?=$pid?>" />
  		<input type="hidden" name="path" value="<?=$path?>" />
	<div class="MainDiv">
		<table width="99%" border="0" cellpadding="0" cellspacing="0" class="CContent">
	  		<tr>
	      		<th class="tablestyle_title" >添加顶级分类</th>
	  		</tr>
	  		<tr>
	    		<td class="CPanel">
					<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
						<tr>
						<td width="100%">
							<fieldset style="height:100%;">
								<legend>添加顶级分类</legend>
								<table border="0" cellpadding="2" cellspacing="1" style="width:100%">
								<tr>
								    <td nowrap align="right" width="33%">分类名:</td>
								    <td width="41%">
								    	<input name="name" class="text" style="width:150px" type="text" size="40" />
							        	<span class="red"> *</span>
							        </td>
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
				<input type="submit" value="添加" class="button" />　
				<input type="reset" value="重置" class="button" /></td>
			</tr>
		</table>
	</div>
</form>
</body>
</html>
