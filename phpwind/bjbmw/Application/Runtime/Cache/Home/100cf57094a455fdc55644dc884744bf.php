<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>技师登录<?php echo ($config["webname"]); ?></title>
    <meta name="description" content="<?php echo ($config["description"]); ?>">
    <meta name="keywords" content="<?php echo ($config["keywords"]); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="seawolfyx">
    <link href="/project/Public/Home/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/project/Public/Home/bootstrap/css/bootstrap-theme.css" rel="stylesheet"> 
  </head>
<body>
<div class="container">
		<div class="row">
		<div class="col-md-12" style="height:100px;"></div>
		<div class="col-md-4"></div>
		<div class="col-md-4">
		<form class="form-signin" id="loginform" action="/project/index.php/Tech/check_login" method="post">
		<h2 class="form-signin-heading">技师登录</h2>
		<label class="sr-only" for="inputEmail" >账号</label>
		<input type="text" autofocus="" name="uname" required="" placeholder="输入用户名" class="form-control" id="inputEmail">
		<label class="sr-only" for="inputPassword">密码</label>
		<input type="password" required="" name="pwd" placeholder="请输入密码" class="form-control" id="inputPassword">
        <div class="checkbox">
          <!--<label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>-->
        </div>
		<button type="submit" class="btn btn-lg btn-primary btn-block">登录</button>
	</form>
	</div>
	<div class="col-md-4"></div>
	
</div>
</div>

</body>
	<div style="width:100px;height:100%;"></div>
    <script src="/project/Public/Home/bs/1.11.2.jquery.min.js"></script>
    <script src="/project/Public/Home/bs/bootstrap.js"></script>
</html>