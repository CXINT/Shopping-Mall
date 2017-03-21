<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>添加用户</title>
	<link rel="stylesheet" rev="stylesheet" href="../css/style.css" type="text/css" media="all" />
<style type="text/css">
<!--
.atten {font-size:12px;font-weight:normal;color:#F00;}
-->
</style>
</head>

<body class="ContentBody">
  	<form action="action.php?a=add" method="post">
		<div class="MainDiv">
			<table width="99%" border="0" cellpadding="0" cellspacing="0" class="CContent">
				<tr>
				    <th class="tablestyle_title" >用户添加页面</th>
				</tr>
		  		<tr>
		  			<td class="CPanel">
						<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
							<tr>
								<td width="100%">
									<fieldset style="height:100%;">
									<legend>添加用户</legend>
										<table border="0" cellpadding="2" cellspacing="1" style="width:100%">	 
										<tr>
										    <td nowrap align="right" width="13%" >用户名:</td>
										    <td width="41%"><input name="username" class="text" style="width:150px" type="text" size="40"  />
									        <span class="red">5~10个字符，可使用字母、数字、下划线，需以字母开头</span></td>
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
											<td width="41%"><input name="phone" class="text" style="width: 150px" size="39" />
											<span class="red"> 请填写11位的手机号码</span></td>
										</tr>
										<tr>
											<td nowrap align="right" width="13%">QQ:</td>
											<td width="41%"><input name="qq" class="text" style="width:150px" size="39" />
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
					<input type="submit" value="添加" class="button" />　
					<input type="reset" value="重置" class="button" />
					</td>
				</tr>
			</table>
		</div>
	</form>
</body>
</html>
