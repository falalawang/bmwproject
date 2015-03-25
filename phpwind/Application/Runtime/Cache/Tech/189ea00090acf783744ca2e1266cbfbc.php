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
    
  <a class="navbar-brand" href="/tech.php/Index/index/date/<?php echo ($order['orderDate']); ?>">< 订单详情</a>

    </div>
    <div class="navbar-collapse collapse" role="navigation">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/tech.php/Login/logout">退出</a></li>
      </ul>
    </div>
  </div>
</div>



<div style="background:#EEE;padding:15px 0;">
<?php if($order['orderStatus'] > 1 and $order['orderStatus'] < 5): ?><div class="container" id="techMenu">
    <div class="col-xs-6 text-center right_line">
        <?php switch($order["orderStatus"]): case "2": ?><button class="btn btn-primary btn-block" id="techBtn" role="button" data-toggle="modal" data-target="#myModalS">技师已出发</button><?php break;?>
          <?php case "3": ?><button class="btn btn-primary btn-block" id="techBtn" role="button" data-toggle="modal" data-target="#myModalS">客户已付款</button><?php break;?>
          <?php case "4": ?><button class="btn btn-primary btn-block" id="techBtn" role="button" data-toggle="modal" data-target="#myModalS">订单已完成</button><?php break; endswitch;?>
    </div>
    <div class="col-xs-6 text-center">
    <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModal">取消订单</button>
    </div>
  </div>
<?php elseif($order['orderStatus'] == 5): ?>
  <div class="text-center">该订单已完成!</div>
<?php elseif($order['orderStatus'] == 0): ?>
  <div class="text-center">该订单已取消!</div><?php endif; ?>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">确认提醒</h4>
      </div>
      <div class="modal-body">
        <p>确定要取消该订单吗?</p>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-default" data-dismiss="modal">取消</a>
        <a type="button" class="btn btn-primary save" href="/tech.php/Index/closeOrder/id/<?php echo ($order['id']); ?>" role="button">确定</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="myModalS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">确认提醒</h4>
      </div>
      <div class="modal-body">
        <p>确定修改该订单状态吗?</p>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-default" data-dismiss="modal">取消</a>
        <a type="button" class="btn btn-primary save" href="/tech.php/Index/editOrder/id/<?php echo ($order['id']); ?>/status/<?php switch($order["orderStatus"]): case "2": ?>3<?php break;?>
          <?php case "3": ?>4<?php break;?>
          <?php case "4": ?>5<?php break; endswitch;?>" role="button">确定</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="container">
  <div class="orderInfo text-muted">
    <br />
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
        <?php if(($evaluate != NUll) and ($order['orderStatus'] == 6)): ?><div class="col-xs-3 text-right" style="padding-right:0px"><strong>服务评价</strong></div>
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
          <div class="col-xs-3 text-right" style="padding-right:0px"><strong>服务评价</strong></div>
          <div class="col-xs-9">尚未评价</div><?php endif; ?>
    </div>
  </div>
</div>


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