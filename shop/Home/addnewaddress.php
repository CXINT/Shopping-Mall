<?php
session_start();
// var_dump($_SESSION);
// die;
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加新地址</title>
<style type="text/css">
<!--
.atten {font-size:12px;font-weight:normal;color:#F00;}
-->
</style>
</head>

<body >
  	<form action="action.php?a=addAddress" method="post">
		<center>
			<span><b>添加新地址</b><br /></span>
			<span>收货人姓名:<input name="name" style="width:150px" type="text" size="40" /></span><br />
			<span>手&nbsp;&nbsp;&nbsp;&nbsp;机&nbsp;&nbsp;&nbsp;号:<input name="phone" style="width:150px" type="text" size="40" margin-left="20px"/></span><br />
			<span style="text-align:top">收&nbsp;货&nbsp;地&nbsp;址:</span>
			<span>
				<textarea name="address" cols="18" rows="5"  margin-top:"1";>
				</textarea>
			</span><br />				   
			<span>是否设置为默认:
				<input value="1" type="checkbox" name="is_defaul"/>是
				<input value="2" type="checkbox" name="is_defaul" checked/>否
			</span><br />	
			<span>
				<input type="submit" value="添加" class="button" />
				<input type="reset" value="重置" class="button" />　
			</span>			    
		</center>																
	</form>	
</body>
</html>		
						
						
		
								
				
	
