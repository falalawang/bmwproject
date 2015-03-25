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

  <a class="navbar-brand" style="padding-right:0;" href="/index.php/Center/index">
  <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> 我的爱车</a>

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
    <br>
    <div class="hidden" id="carClone">
      <div class="carCopy">
        <div class="row">
          <div class="col-xs-10 text-muted">
            <div class="carBrand"><strong>品牌：</strong></div>
            <div class="carSeries"><strong>系列：</strong></div>
            <div class="carType"><strong>型号：</strong></div>
          </div>
          <a class="text-muted addCarId" href="/index.php/Center/delCar/id/" onclick="return false">
            <div class="col-xs-2 text-right">
              <span class="glyphicon glyphicon-trash" style="line-height:60px;" aria-hidden="true"></span>
            </div>
          </a>
        </div>
        <hr>
      </div>
    </div>
<div id="carList">
<?php if(is_array($mycar)): foreach($mycar as $key=>$valCar): ?><div class="carResult">
  <div class="row">
    <div class="col-xs-10 text-muted">
      <div class="carBrand"><strong>品牌：</strong><?php echo ($valCar['brand']); ?></div>
      <div class="carSeries"><strong>系列：</strong><?php echo ($valCar['series']); ?></div>
      <div class="carType"><strong>型号：</strong><?php echo ($valCar['types']); ?></div>
    </div>
  <a class="text-muted addCarId"  href="/index.php/Center/delCar/id/<?php echo ($valCar['id']); ?>" onclick="return false">
    <div class="col-xs-2 text-right">
      <span class="glyphicon glyphicon-trash" style="line-height:60px;" aria-hidden="true"></span>
    </div>
  </a>
  </div>
    <hr>
</div><?php endforeach; endif; ?>
</div>
    <a class="btn btn-default btn-block" id="addCar" data-toggle="modal" data-target="#myModal">添加车型</a>
</div>
<!-- 选择车型 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">请选择车型</h4>
      </div>
      <div class="modal-body">
        <ul id="carList" class="list-unstyled">
<?php if(is_array($brands)): foreach($brands as $key=>$brand): ?><li class="brand">
    <a class="btn btn-link brandBtn" role="button"><?php echo ($brand); ?></a>
    <ul class="list-unstyled">
    <?php if(is_array($serieses)): foreach($serieses as $key=>$series): if($series[0] == $brand): ?><li class="series">
                <a class="btn btn-link seriesBtn" role="button"><?php echo ($series[1]); ?></a>
                <ul>
                    <?php if(is_array($types)): foreach($types as $key=>$type): if(($series[1] == $type[1]) and ($brand == $type[0])): ?><li class="type">
                                <button class="btn btn-link typeBtn" value="<?php echo ($type[3]); ?>"><?php echo ($type[2]); ?></button>
                            </li><?php endif; endforeach; endif; ?>
                </ul>
            </li><?php endif; endforeach; endif; ?>
    </ul>
</li><?php endforeach; endif; ?>
        </ul>
      </div>
    </div>
  </div>
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