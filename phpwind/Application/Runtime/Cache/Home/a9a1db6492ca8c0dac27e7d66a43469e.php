<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="renderer" content="webkit">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>宇瑞安</title>
  <meta name="keywords" content="汽车保养上门服务，4s店上门保养，宝马4s点保养" />
  <meta name="description" content="4s店汽车保养上门服务" />
  <link href="/Public/home/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/Public/home/css/bwm.css" rel="stylesheet" />
</head>
<body>
  <!-- 顶部导航 -->
<div class="navbar-default clearfix">
    <div class="navbar-header">
<!--         <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button> -->

      <a class="navbar-brand" href="/index.php/Center/order">
      <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> 我的订单</a>

    </div>
<!--       <div class="navbar-collapse collapse" role="navigation">
          <ul class="nav navbar-nav navbar-right">
          <?php if($_SESSION['uid'] > 0): ?><li><a href="/index.php/Login/logout">退出</a></li>
            <?php else: ?>
              <li><a href="" class="<?php echo ($loginBtn); ?>">登录</a></li><?php endif; ?>
          </ul>
      </div> -->
</div>

<div>
  
	<div class="container">
    <br>
	<p>尊敬的客户您好，您的保养预约订单已经产生，请您提前准备好车架号(在行驶本左页“车辆师表代码”)或者VIN码，客服会尽快和您确认，请您保持手机通畅，感谢您的配合。</p>
	<a href="/index.php/Center/order" class="btn btn-primary btn-block text-center">点此查看订单</a>
	</div>

</div>
</body>
  <script src="/Public/home/js/jquery.js"></script>
  <script src="/Public/home/js/bootstrap.min.js"></script>
  <script src="/Public/home/js/inputInfo.js"></script>
  <script src="/Public/home/js/addressManage.js"></script>
  <script src="/Public/home/js/carTypeManage.js"></script>
  <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=83db567683e3c103b671ce11951d2987"></script>
  <script src="/Public/home/js/mapApi.js"></script>
</html>