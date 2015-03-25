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

      <a class="navbar-brand" href="/index.php/Index/index">
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
	<h3 class="text-center">请输入您的信息</h3><hr>
	<form role="form" action="submitOrder" method="post">
		<div class="form-group">
			<label id="ttt" value="111"><i class="red">*</i> 服务地址:</label>
			<a href="../Manage/addressManage">
				<button type="button" class="btn btn-xs btn-default pull-right">+添加地址</button>
			</a>
			<div>
			<?php if($city != null and $street != null): ?><div class="row" style="margin-bottom:10px;">
				<div class="col-lg-12">
				<label id="addressCity">
				<input type="radio" id="address" name="address" value="<?php echo ($city); ?> <?php echo ($street); ?>" checked><input type="hidden" name="city" value="<?php echo ($city); ?>"><input type="hidden" name="street" value="<?php echo ($street); ?>">&nbsp&nbsp<?php echo ($city); ?>&nbsp&nbsp<?php echo ($street); ?></label>
				</div>
			</div><?php endif; ?>
			<?php if($userAddresses != null): if(is_array($userAddresses)): foreach($userAddresses as $i=>$userAddress): if($i == 0 and $city == null and $street == null): ?><div class="row" style="margin-bottom:10px;">
					<div class="col-lg-12">
					<label id="addressCity">
					<input type="radio" id="address" name="address" value="<?php echo ($userAddress); ?>" checked>&nbsp&nbsp<?php echo ($userAddress); ?></label>
					</div>
				</div>
			<?php else: ?>
				<div class="row" style="margin-bottom:10px;">
					<div class="col-lg-12">
					<label id="addressCity">
					<input type="radio" id="address" name="address" value="<?php echo ($userAddress); ?>">&nbsp&nbsp<?php echo ($userAddress); ?></label>
					</div>
				</div><?php endif; endforeach; endif; endif; ?></div>
		</div>
		<hr>
		<div class="form-group">
			<label><i class="red" id="carAnchor">*</i> 您的车型:</label>
			<a href="../Manage/carTypeManage">
				<button type="button" class="btn btn-xs btn-default pull-right">+添加车型</button>
			</a>
			<?php if($brand != null and $series != null and $type != null): ?><div class="row" style="margin-bottom:10px;">
				<label class="col-lg-12">
					<input type="radio" id="carType" name="typeId" onclick="checkCombo(this)" value="<?php echo ($typeId); ?>">&nbsp&nbsp<?php echo ($brand); ?>&nbsp<?php echo ($series); ?>&nbsp<?php echo ($type); ?><input type="hidden" name="carType" value="<?php echo ($brand); ?>,<?php echo ($series); ?>,<?php echo ($type); ?>">
				</label>
			</div><?php endif; ?>
			<?php if($userTypes != null): ?><div class="row">
				<?php if(is_array($userTypes)): foreach($userTypes as $i=>$userType): ?><label class="col-lg-12" style="margin-bottom:10px;">
					<input type="radio" onclick="checkCombo(this)"  name="typeId" value="<?php echo ($userType['id']); ?>">&nbsp&nbsp<?php echo ($userType['brand']); ?>&nbsp<?php echo ($userType['series']); ?>&nbsp<?php echo ($userType['types']); ?>
					<input type="hidden" id="carType" name="carType" value="<?php echo ($userType['brand']); ?>,<?php echo ($userType['series']); ?>,<?php echo ($userType['types']); ?>">
					</label><?php endforeach; endif; ?>
			</div><?php endif; ?>
			<div class="form-group row selectCombo hidden bg-info text-info" style=" padding:10px 0;">
				<!-- <h4><small class="text-primary">*请选择您需要的保养套餐,您的车型有以下套餐可以选择:</small></h4> -->
				<div id="combo"></div>
			</div>
		</div>
		<div class="form-group">
		  	<label><i class="red">*</i> 车牌号:</label>
			<div class="row" style="margin-bottom:10px;">
			<div class="col-xs-4 col-sm-4" style="padding:0 5px 0 15px;">
			<select class="form-control" id="carF" name="carF">
			    <option>京</option><option>津</option><option>沪</option>
			    <option>晋</option><option>豫</option><option>冀</option>
			    <option>蒙</option><option>云</option><option>陕</option>
			    <option>辽</option><option>吉</option><option>黑</option>
			    <option>闽</option><option>湘</option><option>贵</option>
			    <option>皖</option><option>粤</option><option>川</option>
			    <option>鲁</option><option>新</option><option>青</option>
			    <option>苏</option><option>藏</option><option>浙</option>
			    <option>琼</option><option>赣</option><option>宁</option>
			    <option>鄂</option><option>渝</option><option>桂</option>
			    <option>甘</option>
			</select></div>
			<div class="col-xs-3 col-sm-3" style="padding:0 5px 0 5px;">
			<select class="form-control" id="carC" name="carC">
			    <option>A</option><option>B</option><option>C</option>
			    <option>D</option><option>E</option><option>F</option>
			    <option>G</option><option>H</option><option>I</option>
			    <option>J</option><option>K</option><option>L</option>
			    <option>M</option><option>N</option><option>O</option>
			    <option>P</option><option>Q</option><option>R</option>
			    <option>S</option><option>T</option><option>U</option>
			    <option>V</option><option>W</option><option>X</option>
			    <option>Y</option><option>Z</option>
			</select></div>
			<label class="col-xs-5 col-sm-" style="padding:0 15px 0 5px;">
			<input class="form-control" type="text" name="carNumber" id="carNumber"  maxlength="5"><a name="carNumber" id="carNumber"></a>
		  	</label>
		  	</div>
		</div>
		<div class="form-group">
		  	<label>VIN码后7位:</label>
			<div class="row" style="margin-bottom:10px;">
			<label class="col-sm-12 col-xs-12">
			<input class="form-control" style="height:35px;" type="text" placeholder="车辆识别代码" name="vin">
		  	</label></div>
		</div>
		<hr>
		<div class="form-group">
			<label><i class="red">*</i> 服务时间:</label>
			<div class="row">
			<div class="col-xs-12">
			<button type="button" id="appointment" class="btn btn-default form-control"  data-toggle="modal" data-target="#myModal">选择您要预约的时间</button>
			<span class="red" style="line-height:25px;">温馨提示:您可预约未来六天您方便的时间</span>
      		<input type="text" class="col-xs-12 col-sm-6 hidden" name="orderDate" value="" id="orderdate" disabled="disabled">
			<input type="text" class="col-xs-12 col-sm-6 hidden" name="orderTime" value="" id="ordertime" disabled="disabled">
			</div></div>
		</div>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
		    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">请选择您要预约的时间</h4>
		    </div>
		    <div class="modal-body">
        		<?php if(is_array($status)): foreach($status as $i=>$statu): ?><button type="button" class="date btn btn-default btn-block" style="margin:5px 0;"><?php echo ($i); ?></button>
          		<div class="time row">
          			<?php if(is_array($statu)): foreach($statu as $j=>$k): if($k == 0): ?><div class="col-xs-6 col-sm-6">
		            		<button type="button" class="Time btn btn-link btn-block" ><?php if($j == 0): ?>08:00-10:00<?php elseif($j == 1): ?>10:00-12:00<?php elseif($j == 2): ?>14:00-16:00<?php elseif($j == 3): ?>16:00-18:00<?php else: endif; ?></button>
	            		</div>
	          			<?php else: ?>
	          			<div class="col-xs-6 col-sm-6">
		            		<button type="button" class="Time btn btn-link btn-block" disabled="disabled"><?php if($j == 0): ?>08:00-10:00<?php elseif($j == 1): ?>10:00-12:00<?php elseif($j == 2): ?>14:00-16:00<?php elseif($j == 3): ?>16:00-18:00<?php else: endif; ?></button>
	            		</div><?php endif; endforeach; endif; ?>
          		</div><?php endforeach; endif; ?>
		    </div>
<!-- 		    <div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	        	<button type="button"  id="save" class="btn btn-primary" data-dismiss="modal">保存</button>
	      	</div> -->
		    </div>
			</div>
		</div>
		<hr>
		<div class="form-group">
			<label><i class="red">*</i> 姓名:</label>
			<div class="row" style="margin-bottom:10px;">
				<label class="col-sm-12 col-xs-12">
				<input  class="form-control" type="text" id="user" name="user" value="<?php echo ($userName); ?>"><a name="user" id="user"></a>
				</label><!-- /.col-lg-12 -->
			</div>
		</div>
		<div class="form-group">
			<label><i class="red">*</i> 手机号:</label>
			<div class="row" style="margin-bottom:10px;">
			<label class="col-sm-12 col-xs-12">
				<input type="text" class="form-control" id="tel" name="telephone" placeholder="您的手机号"   style="margin-bottom:10px;"/><a name="telephone" id="telephone"></a>
			</label>
			<label class="col-xs-6" style="padding:0 5px 0 15px;">
				<input type="text" id="code" name="code" class="form-control" placeholder="动态密码" maxlength="4" /><a name="code" id="code"></a>
			</label>
			<label class="col-xs-6" style="padding:0 15px 0 5px;">
				<button type="button" id="btn" class="pull-right btn btn-sm btn-default form-control" onclick="sendMessage()">获取动态密码</button>
			</label>
			</div>
		</div>
		<div class="form-group" style="margin-bottom:60px;">
		  	<label>备注:</label>
			<div class="row" style="margin-bottom:10px;">
			<label class="col-xs-12 col-sm-12">
			<input class="form-control" type="text" placeholder="可填写其他信息或需求" name="remark" value=""></label>
		  	</div>
		</div>
		<br />
		<div class="bottom navbar-fixed-bottom btn-block">
			<h5 class="col-sm-8 col-xs-8">应付总额:<span id="lastPrice">0</span>元</h5>
		  	<input type="hidden" id="LastPrice" name="lastPrice" value="">
		  	<input type="submit" value="提交订单" class="btn btn-default btn-sm col-sm-4 col-xs-4" style="margin-top:3px;" id="submit">
		</div>
	</form>
</div>
<div id="test">
	<label class="col-sm-6 col-xs-12 packages">
	<input type="checkbox" name="packages[]" class="col-sm-1 col-xs-1 selectCombo text-right">
	<input type="hidden">
	<input type="hidden">
	<span class="col-xs-6"></span>
	<span class="col-xs-5 text-right"></span>
	</label>
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