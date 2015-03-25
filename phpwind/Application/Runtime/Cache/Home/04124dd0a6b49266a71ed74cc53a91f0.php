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

  <?php if($_GET['id'] >= 1): ?><a class="navbar-brand" href="/index.php/Center/order"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> 订单详情</a>
  <?php else: ?>
    <a class="navbar-brand" href="/index.php/Center/index"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> 我的订单</a><?php endif; ?>

  </div>
<!--     <div class="navbar-collapse collapse" role="navigation">
        <ul class="nav navbar-nav navbar-right">
        <?php if($_SESSION['uid'] > 0): ?><li><a href="/index.php/Login/logout">退出</a></li>
          <?php else: ?>
            <li><a href="" class="<?php echo ($loginBtn); ?>">登录</a></li><?php endif; ?>
        </ul>
    </div> -->
</div>




<div class="container">
<?php if($_GET['id'] >= 1): ?><div class="orderInfo text-muted">
    <br />
      <div class="row">
        <strong class="col-xs-3 text-right" style="padding-right:0px">订单号</strong>
        <span class="col-xs-9" style="padding-right:0px"><?php echo ($order['id']); ?></span>
      </div>
      <div class="row">
        <strong class="col-xs-3 text-right" style="padding-right:0px">下单时间</strong>
        <span class="col-xs-9" style="padding-right:0px"><?php echo (date( "Y-m-d H:i:s",$order['createTime'])); ?></span>
      </div>
      <div class="row">
        <strong class="col-xs-3 text-right" style="padding-right:0px">订单状态</strong>
        <span class="col-xs-9" style="padding-right:0px">
          <?php switch($order["orderStatus"]): case "0": ?>已取消<?php break;?>
            <?php case "1": ?>未审核<?php break;?>
            <?php case "2": ?>审核通过<?php break;?>
            <?php case "3": ?>技师已出发<?php break;?>
            <?php case "4": ?>已付款<?php break;?>
            <?php case "5": ?>已完成,待评价<?php break;?>
            <?php case "6": ?>已评价<?php break; endswitch;?>
        </span>
      </div>
      <div class="row">
        <strong class="col-xs-3 text-right" style="padding-right:0px">应付总额</strong>
        <span class="col-xs-9" style="padding-right:0px"><?php echo ($order['lastPrice']); ?>元</span>
      </div>
    <hr>
      <div class="row">
        <strong class="col-xs-3 text-right" style="padding-right:0px">保养时间</strong>
        <span class="col-xs-9" style="padding-right:0px"><?php echo ($order['orderDate']); ?> <?php echo ($order['orderTime']); ?></span>
      </div>
      <div class="row">
        <strong class="col-xs-3 text-right" style="padding-right:0px">保养爱车</strong>
        <span class="col-xs-9" style="padding-right:0px"><?php echo ($order['carType']); ?></span>
      </div>
      <div class="row">
        <strong class="col-xs-3 text-right" style="padding-right:0px">保养车牌</strong>
        <span class="col-xs-9" style="padding-right:0px"><?php echo ($order['carNumber']); ?></span>
      </div>
      <div class="row">
        <strong class="col-xs-3 text-right" style="padding-right:0px">Vin码值</strong>
        <span class="col-xs-9" style="padding-right:0px"><?php echo ($order['vin']); ?></span>
      </div>
      <div class="row">
        <strong class="col-xs-3 text-right" style="padding-right:0px">保养项目</strong>
        <span class="col-xs-9" style="padding-right:0px"><?php echo ($order['combo']); ?></span>
      </div>
    <hr>
      <div class="row">
        <strong class="col-xs-3 text-right" style="padding-right:0px">联系人</strong>
        <span class="col-xs-9" style="padding-right:0px"><?php echo ($order['user']); ?></span>
      </div>
      <div class="row">
        <strong class="col-xs-3 text-right" style="padding-right:0px">联系电话</strong>
        <span class="col-xs-9" style="padding-right:0px"><?php echo ($order['telephone']); ?></span>
      </div>
      <div class="row">
        <strong class="col-xs-3 text-right" style="padding-right:0px">联系地址</strong>
        <span class="col-xs-9" style="padding-right:0px"><?php echo ($order['address']); ?></span>
      </div>
    <hr>
      <div class="row">
        <strong class="col-xs-3 text-right" style="padding-right:0px">订单留言</strong>
        <span class="col-xs-9" style="padding-right:0px"><?php echo ($order['remark']); ?></span>
      </div>
    <hr>
      <div class="row">
        <?php if(($evaluate != NUll) and ($order['orderStatus'] == 6)): ?><div class="col-xs-3 text-right" style="padding-right:0px"><strong>我的评价</strong></div>
          <div class="col-xs-9">
            <div><?php echo (date( "Y-m-d H:i:s",$evaluate["time"])); ?></div>
            <div class="grade" grade="<?php echo ($evaluate['grade']); ?>">
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
            </div>
            <div><?php echo ($evaluate['content']); ?></div>
          </div>
        <?php elseif($order['orderStatus'] == 5): ?>
          <div class="col-xs-3 text-right" style="padding-right:0px"><strong>我的评价</strong></div>
          <div class="col-xs-9">尚未评价，<a href="/index.php/Center/evaluate/id/<?php echo ($order['id']); ?>" class="text-danger">点击这里评价~</a></div><?php endif; ?>
    </div>
  </div><?php endif; ?>


<?php if($_GET['id'] < 1): ?><div class="orderList text-muted">
    <br>
<?php if(is_array($orders)): foreach($orders as $key=>$order): ?><div class="orderLi">
      <div class="row">
        <a href="/index.php/Center/order/id/<?php echo ($order['id']); ?>" class="text-muted">
        <div class="col-xs-10">
          <div class="row"><strong class="text-right col-xs-4" style="padding-right:0;">下单时间</strong><span class="col-xs-8"><?php echo (date( "Y-m-d H:i:s",$order['createTime'])); ?></span></div>
          <div class="row"><strong class="text-right col-xs-4" style="padding-right:0;">车型</strong><span  class="col-xs-8"><?php echo ($order['carType']); ?></span></div>
          <div class="row"><strong class="text-right col-xs-4" style="padding-right:0;">订单状态</strong>
          <span  class="col-xs-8">
            <?php switch($order["orderStatus"]): case "0": ?>已取消<?php break;?>
            <?php case "1": ?>未审核<?php break;?>
            <?php case "2": ?>审核通过<?php break;?>
            <?php case "3": ?>技师已出发<?php break;?>
            <?php case "4": ?>已付款<?php break;?>
            <?php case "5": ?>已完成,待评价<?php break;?>
            <?php case "6": ?>已评价<?php break; endswitch;?>
          </span>
          </div>
        </div>
        <div class="col-xs-2 text-right">
            <span class="glyphicon glyphicon-chevron-right" style="line-height:60px;" aria-hidden="true"></span>
        </div>
        </a>
      </div>
      <hr>
    </div><?php endforeach; endif; ?>
  </div>
  <a class="btn btn-default btn-block" href="/index.php/Order/inputInfo">我要预约</a><?php endif; ?>

</div>

<!-- 底部导航 -->

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