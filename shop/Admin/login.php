<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/css.css" rel="stylesheet" type="text/css" />
    <title>聚美优品后台管理系统</title>
    
   <style type="text/css">
    body {
    	margin-left: 0px;
    	margin-top: 0px;
    	margin-right: 0px;
    	margin-bottom: 0px;
    }
    </style>
    
</head>
<!--页面头部开始-->
  <body style="background: url('./images/bg03.jpg') round  no-repeat;">
    <div style="width:1366px;height:70px;background:#444851">
      <div style="width:119px;height:70px;margin-left:10px;float: left;"><img src="./images/2017-01-12_200354.png"></div>
      <div style="width:300px;height: 70px; float: left;background-color: #444851;line-height: 64px;"><font size="5" color="#FFFFFF">后台管理系统<font></div>
    </div>
    <center>
    <div style="width:700px;height:400px;position:relative;margin:0 auto;margin-top: 100px;">
    <!--表单设计-->
    <form action="action.php?a=login&username=admin" method="post" >
      <h2><font color="#ED5AB4">Welcome to Jumei</h2> 
      <font size="4">用&nbsp;户&nbsp;名:</font>
        <input class="span5 username" placeholder="请输入您的登录用户名" name="username" type="text" value=""  style="width:200px;height: 30px;"/><br> 

      <div style="height:4px"></div>

      <font size="4">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:</font>
      <input name="pwd" type="password" placeholder="请输入密码"  style="width:200px;height: 30px;"/><br>

      <div style="height:4px"></div>

      <font size="4">验&nbsp;证&nbsp;码:</font>
      <input class="span5 code" id="captcha_input" placeholder="请输入图片中的字符" name="yzm" type="text" style="width:200px;height: 30px;" />

      <div style="height:4px"></div>
        
      <div style="width:300px;height:40px;text-align:center;">
        <div style="width:100px;line-height: 30px;float:left;"><font size="4" >验证图片:</font></div>
        <div style="float:left;"><img onclick="this.src='../Public/yzm.php?'+Math.random()" src="../Public/yzm.php" width="120" height="40" /></div>
      </div>

      <div style="height:4px;width: 300px;"></div>

      <div style="padding-left:-350px;width: 200px;">
      <input type="submit" style="width:50px;height:25px;" value="登陆" /> 
      <input type="submit" style="width:50px;height:25px;" value="重置" />
      </div>

      </form>
    </div>
    </center>
</body>
</html>