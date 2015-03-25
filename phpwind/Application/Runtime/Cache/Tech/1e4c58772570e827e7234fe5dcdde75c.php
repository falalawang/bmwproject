<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="renderer" content="webkit">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>宇瑞安</title>
  <meta type="keywords" content="宇瑞安,汽车保养">
  <meta type="description" content="宇瑞安汽车保养服务">

  <link rel="stylesheet" href="/Public/tech/css/bootstrap.min.css">
  <link rel="stylesheet" href="/Public/tech/css/tech.css">
</head>
<body>

<div class="navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    
  <a class="navbar-brand">宇瑞安</a>

    </div>
    <div class="navbar-collapse collapse" role="navigation">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/tech.php/Login/logout">退出</a></li>
      </ul>
    </div>
  </div>
</div>


<div class="jumbotron">
  <div class="container text-center">
  <h3>你好,<?php echo ($telephone); ?>!</h3>
  <p><?php echo ($day); ?> 共有 <kbd><?php echo ($count); ?></kbd> 条订单</p>
  </div>
  <a class="left carousel-control" href="/tech.php/Index/index/date/<?php echo ($prevDay); ?>" role="button">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="/tech.php/Index/index/date/<?php echo ($nextDay); ?>" role="button">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>


<div class="container">
  <div class="orderList text-muted">
    <br>
<?php if(is_array($orders)): foreach($orders as $key=>$order): ?><div class="orderLi">
      <div class="row">
        <a href="/tech.php/Index/order/id/<?php echo ($order['id']); ?>" class="text-muted">
        <div class="col-xs-10">
          <div class="row"><strong class="text-right col-xs-4" style="padding-right:0;">保养时间</strong><span class="col-xs-8"><?php echo ($order['orderTime']); ?></span></div>
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
          <div class="row"><strong class="text-right col-xs-4" style="padding-right:0;">车型</strong><span  class="col-xs-8"><?php echo ($order['carType']); ?></span></div>
        </div>
        <div class="col-xs-2">
            <span class="glyphicon glyphicon-chevron-right" style="line-height:60px;" aria-hidden="true"></span>
        </div>
        </a>
      </div>
      <hr>
    </div><?php endforeach; endif; ?>
  </div>

</div>
<br>
<br>
<br>
<!-- 底部导航 -->
<nav class="navbar-inverse navbar-fixed-bottom">
  <div class="container">
    <ul class="nav navbar-nav row" style="float:none; margin:0;">
      <li class="col-xs-4 text-center"><a href="/tech.php/Index/index/date/<?php echo ($prevDay); ?>" target="_self" style="padding:15px 0;"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
      <li class="col-xs-4 text-center"><a href="/tech.php/Index/index" target="_self" style="padding:15px 0;">今天</a></li>
      <li class="col-xs-4 text-center"><a href="/tech.php/Index/index/date/<?php echo ($nextDay); ?>" target="_self" style="padding:15px 0;"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
    </ul>
  </div>
</nav>


</body>
<script src="/Public/tech/js/jquery.js"></script>
<script src="/Public/tech/js/bootstrap.min.js"></script>
<script type="text/javascript">
    var JS_PUBLIC= "/Public";
    var JS_APP = "/tech.php";
    var JS_ROOT = "";
</script>
<script src="/Public/tech/js/tech.js"></script>
</html>