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

  <a class="navbar-brand" href="/index.php/Index/index">宇瑞安</a>

  </div>
<!--     <div class="navbar-collapse collapse" role="navigation">
        <ul class="nav navbar-nav navbar-right">
        <?php if($_SESSION['uid'] > 0): ?><li><a href="/index.php/Login/logout">退出</a></li>
          <?php else: ?>
            <li><a href="" class="<?php echo ($loginBtn); ?>">登录</a></li><?php endif; ?>
        </ul>
    </div> -->
</div>



  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="/Public/home/images/banner1.jpg" alt="...">
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <img src="/Public/home/images/banner2.jpg" alt="...">
        <div class="carousel-caption">
        </div>
      </div>
      </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


<div class="color_box">
  <br>
  <div class="container">
  <span class="col-xs-12 text-center navbar-brand">为什么选择4S店上门保养</span>
  <hr>
  <div class="col-xs-4 text-center right_line">100%<br /><small>正品配件</small></div>
  <div class="col-xs-4 text-center right_line">24H预约<br /><small>上门服务</small></div>
  <div class="col-xs-4 text-center">365天<br /><small>全年无休</small></div>
  <br><br>
  <span class="col-xs-12 text-center navbar-brand">宇瑞安是你最正确的选择</span>
 <!--   <div class="col-xs-4 text-center right_line"><a class="text-muted <?php echo ($loginBtn); ?>" href="/index.php/Center/order"><span class="glyphicon glyphicon-list-alt"></span><br>我的订单</a></div>
    <div class="col-xs-4 text-center right_line"><a class="text-muted <?php echo ($loginBtn); ?>" href="/index.php/Center/userCar"><span class="glyphicon glyphicon-plane"></span><br>管理车型</a></div>
    <div class="col-xs-4 text-center"><a class="text-muted <?php echo ($loginBtn); ?>" href="/index.php/Center/address"><span class="glyphicon glyphicon-home"></span><br>管理地址</a></div>-->
  </div>
</div>
<!-- 登录 -->
<div class="modal fade" id="myLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">手机验证</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group" id="user_tel">
            <label for="loginTel">手机号码</label>
            <input type="text" class="form-control" id="loginTel" placeholder="请输入您的手机号">
          </div>
          <div class="form-group" id="user_note">
            <label for="loginNote">短信验证码</label>
            <div class="row">
              <div class="col-xs-6">
                <input type="text" class="form-control" id="loginNote" placeholder="">
              </div>
              <div class="col-xs-6">
                <button type="button" id="loginNoteBtn" class="btn btn-default btn-block" disabled="">获取短信</button>
              </div>
            </div>
          </div>
          <button type="button" id="loginBtn" class="btn btn-primary btn-block">验证</button>
        </form>
      </div>
    </div>
  </div>
</div>
<input type="hidden" id="isLogin" value="<?php echo ($url); ?>" />


<!-- 底部导航 -->

  <br>
  <br>
  <br>
  <nav class="navbar-inverse navbar-fixed-bottom">
    <div class="container">
      <ul class="nav navbar-nav row" style="float:none; margin:0;">
        <li class="col-xs-4 text-center"><a href="/index.php/Index/index" style="padding:15px 0;">品牌介绍</a></li>
        <li class="col-xs-4 text-center"><a href="/index.php/Order/inputInfo" style="padding:15px 0;">立即预约</a></li>
        <li class="col-xs-4 text-center"><a href="/index.php/Center/index" class="<?php echo ($loginBtn); ?>" style="padding:15px 0;">个人中心</a></li>
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