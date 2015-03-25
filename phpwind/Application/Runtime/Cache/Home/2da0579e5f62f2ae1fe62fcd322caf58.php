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

      <a class="navbar-brand" href="/index.php/Center/address">
      <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> 修改地址</a>

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

<form action="/index.php/Center/update" method="post">
  <br>
<?php if(is_array($address)): foreach($address as $key=>$valAddr): ?><div class="form-group">
    <label for="addressName">所在地区</label>
    <input type="text" class="form-control" name="city" id="addressCity" value="<?php echo ($valAddr['city']); ?>" placeholder="所在地区"  data-toggle="modal" data-target="#myModal">
  </div>
  <div class="form-group">
    <label for="addressPhone">街道地址</label>
    <input type="text" class="form-control" name="street" id="addressStreet" value="<?php echo ($valAddr['street']); ?>" placeholder="街道地址">
    <input type="hidden" name="id" value="<?php echo ($_GET['id']); ?>">
  </div><?php endforeach; endif; ?>
  <button type="submit" class="btn btn-primary btn-block" id="addressBtn">确定完成</button>
  <a href="/index.php/Center/delAddr/id/<?php echo ($valAddr['id']); ?>" id="addressDel" type="submit" class="btn btn-danger btn-block">删除</a>
</form>

</div>
<!-- 选择城市 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">请选择城市</h4>
      </div>
      <div class="modal-body">
        <ul id="cityList">
            <?php if(is_array($provinces)): foreach($provinces as $key=>$province): ?><li class="province">
                <button type="button" class="btn btn-link provinceBtn"><?php echo ($province); ?></button>
                <ul>
                <?php if(is_array($citys)): foreach($citys as $key=>$city): if($city[0] == $province): ?><li class="city">
                      <button type="button" class="btn btn-link cityBtn"><?php echo ($city[1]); ?></button>
                      <ul  class="list-unstyled">
                        <?php if(is_array($countys)): foreach($countys as $key=>$county): if($county[0] == $city[1]): ?><li class="county">
                              <button type="button" class="btn btn-link countyBtn"><?php echo ($county[1]); ?></button>
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