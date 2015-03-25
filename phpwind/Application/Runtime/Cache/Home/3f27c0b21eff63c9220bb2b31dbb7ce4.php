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

      <a class="navbar-brand" href="/index.php/Order/inputInfo">
      <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> 预约保养</a>

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
		<h3 class="text-center">请选择您的汽车品牌</h3>
		<?php if(is_array($brands)): foreach($brands as $key=>$brand): ?><div class="brand">
				<button type="button" class="btn btn-default btn-block" style="margin-bottom:10px;" onclick="getBrand(this)"><?php echo ($brand); ?></button>
				<?php if(is_array($serieses)): foreach($serieses as $key=>$series): ?><div class="series" style="display:none">
						<?php if( $series[0] == $brand): ?><button type="button" class="btn btn-default btn-block" style="margin-bottom:10px;" onclick="getSeries(this)"><?php echo ($series[1]); ?></button>
							<div class="type">
								<?php if(is_array($types)): foreach($types as $key=>$type): if(($series[1] == $type[1]) and ($brand == $type[0])): ?><button type="button" class="btn btn-default btn-block" style="margin-bottom:10px;" onclick="getType(this)"><?php echo ($type[2]); ?></button><?php endif; endforeach; endif; ?>
							</div><?php endif; ?>
					</div><?php endforeach; endif; ?>
			</div><?php endforeach; endif; ?>
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