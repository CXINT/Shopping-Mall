<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改个人信息</title>
<link rel="stylesheet" rev="stylesheet" href="../css/style.css" type="text/css" media="all" />
<style type="text/css">
<!--
.atten {font-size:12px;font-weight:normal;color:#F00;}
-->
</style>
</head>

<body class="ContentBody">
  	<form action="action.php?a=editUser" method="post">
			<table width="99%" border="0" cellpadding="0" cellspacing="0" class="CContent">
				<tr>
				    <th class="tablestyle_title" >修改个人信息</th>
				</tr>
		  		<tr>
		  			<td class="CPanel">
						<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
							<tr>
								<td width="100%">
									<fieldset style="height:100%;">
										<table border="0" cellpadding="2" cellspacing="1" style="width:100%">	 
										<tr>
										    <td nowrap align="right" width="13%" >用户名:<td nowrap align="right" width="13%">
										    <td width="41%"><input name="name" style="width:150px" type="text" size="40" />
										    </td>
										</tr>
										<tr>
										    <td nowrap align="right" width="13%">密码:</td>
										    <td width="41%"><input name="name" style="width:150px" type="text" size="40" />
										    </td>
										</tr>
										<tr>
											<td nowrap align="right" width="13%">手机号:</td>
											<td width="41%"><input name="phone" class="text" style="width: 150px" size="39" />
											</td>
										</tr>
										
										
										<tr>
										    <td nowrap align="right" width="13%">是否设置为默认:</td>
										    <td width="41%">
										    	<input value="1" type="checkbox" name="is_defaul"/>是
												<input value="2" type="checkbox" name="is_defaul" checked/>否
										    </td>
										</tr>
										</table>
								 	<br>
									</fieldset>			
								</td>
							</tr>	
						</table>
			 		</td>
					<tr>
						<td colspan="2" align="center" height="50px">
						<input type="submit" value="添加" class="button" />　
						<input type="reset" value="重置" class="button" />
						</td>
					</tr>
				</tr>
			</table>
		</div>
	</form>
</body>
</html>