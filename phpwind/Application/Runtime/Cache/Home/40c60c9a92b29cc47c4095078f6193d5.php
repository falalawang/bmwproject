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
  <!-- 新 Bootstrap 核心 CSS 文件 -->
  <link rel="stylesheet" href="/Public/home/css/bootstrap.min.css">
  <link rel="stylesheet" href="/Public/home/css/center.css">
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

      <a class="navbar-brand " href="/index.php/Index/index"><span class="glyphicon glyphicon-menu-left"></span> 个人中心</a>

  </div>
<!--     <div class="navbar-collapse collapse" role="navigation">
        <ul class="nav navbar-nav navbar-right">
        <?php if($_SESSION['uid'] > 0): ?><li><a href="/index.php/Login/logout">退出</a></li>
          <?php else: ?>
            <li><a href="" class="<?php echo ($loginBtn); ?>">登录</a></li><?php endif; ?>
        </ul>
    </div> -->
</div>


  <div class="jumbotron">
    <div class="container">
      <h3>你好, <?php echo ($_SESSION['telephone']); ?></h3>
      <p>欢迎使用预约保养服务!</p>
    </div>
  </div>



  <div class="container">
    <div><a class="text-muted center-block" href="/index.php/Center/order"><span class="glyphicon glyphicon-list-alt"></span> 我的订单<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></div>
    <hr>
    <div><a class="text-muted center-block" href="/index.php/Center/userCar"><span class="glyphicon glyphicon-plane"></span> 我的爱车<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></div>
    <hr>
    <div><a class="text-muted center-block" href="/index.php/Center/address"><span class="glyphicon glyphicon-home"></span> 我的地址<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></div>
    <hr>
  </div>

<!-- 底部导航 -->

  <br>
  <br>
  <br>
  <nav class="navbar-inverse navbar-fixed-bottom">
    <div class="container">
      <ul class="nav navbar-nav row" style="float:none; margin:0;">
        <li class="col-xs-4 text-center"><a href="/index.php/Index/index" target="_self" style="padding:15px 0;">品牌介绍</a></li>
        <li class="col-xs-4 text-center"><a href="/index.php/Order/inputInfo" target="_self" style="padding:15px 0;">立即预约</a></li>
        <li class="col-xs-4 text-center"><a href="/index.php/Center/index" target="_self" style="padding:15px 0;">个人中心</a></li>
      </ul>
    </div>
  </nav>

<br>
<br>
<br>
</body>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="/Public/home/js/jquery.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="/Public/home/js/bootstrap.min.js"></script>
<script type="text/javascript">
    var JS_PUBLIC = "/Public";
    var JS_APP = "/index.php";
    var JS_ROOT = "";
</script>
<script src="/Public/home/js/city.js"></script>
<script src="/Public/home/js/carType.js"></script>
<script src="/Public/home/js/common.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=83db567683e3c103b671ce11951d2987"></script>
<script src="/Public/home/js/mapKey.js"></script>
</html>