<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<meta charset='utf-8' />
		<title><?php echo ($result[0]['title']); ?></title>
		<meta name="keywords" content="<?php echo ($result[0]['keywords']); ?>">
		<meta name="description" content="<?php echo ($result[0]['description']); ?>">
		<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;"/>
		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
		<meta name="format-detection" content="telephone=no"/>
		<link rel="stylesheet" type="text/css" href="/bmw/Public/home/css/lanrenzhijia.css" />
		<link rel="stylesheet" type="text/css" href="/bmw/Public/home/css/pho.css" />
		<link rel="stylesheet" type="text/css" media="all" href="/bmw/Public/home/css/style.css"/>
		<link rel="stylesheet" href="/bmw/Public/home/css/ary.css"/>
		
		<script src='/bmw/Public/home/js/ajax.js'></script>
		<script src="/bmw/Public/home/My97DatePicker/WdatePicker.js"></script>
		<script src="/bmw/Public/home/js/area.js"></script>
		<script src="/bmw/Public/home/js/jquery-1.9.1.min.js"></script>
  		<script src="/bmw/Public/home/js/jquery.js"></script>
  		<script src="/bmw/Public/home/js/jquery.leanModal.min.js"></script>
		<script src="/bmw/Public/home/js/ary.js"></script>
		<script src="/bmw/Public/home/js/respond.js"></script>
		<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.2"></script>
		<link rel="stylesheet" href="/bmw/Public/home/css/gerenzhongxin.css">

	    <link rel="stylesheet" href="/bmw/Public/home/bootstrap/css/bootstrap.min.css" media="screen" >
	   	<script src="/bmw/Public/home/bootstrap/js/bootstrap.min.js"></script>

    <style>
		.demo-nav.fixed.fixed-top{z-index:8;background:#fff;width:100%;padding:0;border-bottom:solid 4px #28adcc;-webkit-box-shadow:0 3px 6px rgba(0, 0, 0, .175);box-shadow:0 3px 6px rgba(0, 0, 0, .175);}
    </style>
		
	</head>
<body>



<!-- 代码 begin -->
	<!-- 代码 开始 -->
	<div class="box">
		<div class="t_news">
			<b style='width:40px'>公告:</b>
			<b style='width:80%'><marquee onMouseOver="this.stop()" onMouseOut="this.start()" scrolldelay ="200">未来三天将会有活动出现,大家注意查看……</marquee></b>
		</div>
	</div>
	
	
	<div class='contentb'>
		<form action='/bmw/index.php/Make/add' method='post' onsubmit="return fun()">
			<table class='tab' width='100%' cellspacing='0'>
				<tr style='border-bottom:1px solid #ccc;line-height:40px'>
					<td bgcolor='#4392a4' style='text-align:center'>名称</td>
					<td bgcolor='#28accd' style='text-align:center'>详情</td>
				</tr>
				<tr style='border-bottom:1px solid #ccc'>
					<td bgcolor='#aec6cb' style='text-align:center'>品牌</td>
					<td bgcolor='#b7d6db'><input readonly class='inpb' type='text' name='brand' value="<?php echo ($value['brand']); ?>" readonly /></td>
				</tr>
				<tr style='border-bottom:1px solid #ccc'>
					<td bgcolor='#aec6cb' style='text-align:center'>车型</td>
					<td bgcolor='#b7d6db'><input readonly class='inpb' type='text' name='series' value="<?php echo ($value['series']); ?>"/></td>
				</tr>
				<tr style='border-bottom:1px solid #ccc'>
					<td bgcolor='#aec6cb' style='text-align:center'>车系</td>
					<td bgcolor='#b7d6db'><input readonly class='inpb' type='text' name='models' value="<?php echo ($value['models']); ?>"/></td>
				</tr>
				<tr style='border-bottom:1px solid #ccc'>
					<td bgcolor='#aec6cb' style='text-align:center'>保养日期</td>
					<td bgcolor='#b7d6db'><input readonly class='inpb' type='text' name='date' value="<?php echo ($value['date']); ?>"/></td>
				</tr>
				<tr style='border-bottom:1px solid #ccc'>
					<td bgcolor='#aec6cb' style='text-align:center'>保养时间</td>
					<td bgcolor='#b7d6db'><input readonly class='inpb' type='text' name='keep_time' value="<?php echo ($value['keep_time']); ?>"/></td>
				</tr>
				<tr style='border-bottom:1px solid #ccc'>
					<td bgcolor='#aec6cb' style='text-align:center'>保养项目</td>
					<td bgcolor='#b7d6db'><input readonly class='inpb' type='text' name='combo' value="<?php echo ($value['combo']); ?>" readonly /></td>
				</tr>
				<tr style='border-bottom:1px solid #ccc'>
					<td bgcolor='#aec6cb' style='text-align:center'>保养总价</td>
					<td bgcolor='#b7d6db'><input readonly class='inpb' type='text' name='price' value="<?php echo ($value['price']); ?>"/></td>
				</tr>
				<tr style='border-bottom:1px solid #ccc'>
					<td bgcolor='#aec6cb' style='text-align:center'>车牌号</td>
					<td bgcolor='#b7d6db'><input readonly class='inpb' type='text' name='LPN' value="<?php echo ($value['LPN']); ?>"/></td>
				</tr>
				<tr style='border-bottom:1px solid #ccc'>
					<td bgcolor='#aec6cb' style='text-align:center'>VIN码</td>
					<td bgcolor='#b7d6db'><input readonly class='inpb' type='text' name='vin' value="<?php echo ($value['vin']); ?>"/></td>
				</tr>
				<tr style='border-bottom:1px solid #ccc'>
					<td bgcolor='#aec6cb' style='text-align:center'>保养地址</td>
					<td bgcolor='#b7d6db'><input readonly class='inpb' type='text' value="<?php echo ($value['city']); echo ($value['county']); echo ($value['address']); ?>"/><input readonly class='inpc' type='hidden' name='city' value="<?php echo ($value['city']); ?>"/><input readonly type='hidden' name='county' value="<?php echo ($value['county']); ?>"/><br /><input readonly type='hidden' name='address' value="<?php echo ($value['address']); ?>"/></td>
				</tr>
				<tr style='border-bottom:1px solid #ccc'>
					<td bgcolor='#aec6cb' style='text-align:center'>留言</td>
					<td bgcolor='#b7d6db'><input readonly class='inpb' type='text' name='texts' value="<?php echo ($value['texts']); ?>"/></td>
				</tr>
				<tr id='ye' style='height:80px'>
					<?php if(($_SESSION['phone'] == '')): ?><td colspan='2' style='text-align:center'><input  href="#loginmodal" class='inp' type='submit' id="modaltrigger" value='请登录' /></td>
					<?php else: ?><td colspan='2' style='text-align:center'><input class='inp' type='submit' name='sub' value='确认订单' /></td><?php endif; ?>
				</tr>
			</table>
			
		</form>
	</div>
	<div id="loginmodal" style="display:none;">
	<p>请登录</p>
    <!--<form id="loginform" name="loginform" method="post" onsubmit='return false'>-->
      <input placeholder='*手机号' type="text" name="phone" id="username" maxlength="11" class="txtfield" value="" ><span id="sp" style="font-size:12px;color:red"></span>
      <br />
      <input placeholder='*验证码' type="text" name="code" class="txtfiel" id="code" maxlength="4" value="" ><input type="button" id="getcode" class="flatbtn-w" value="获取验证码" >
      <br />
      <input type="submit" name="loginbtn" id="loginbtn" class="flatbtn-blu hidemodal" value="确定" tabindex="3">
    <!--</form>-->
  </div>
  <script type="text/javascript">
		/*$(function(){
		$('#loginform').submit(function(e){
			var p = $("#username").val();
			var c = $("#code").val();
			if(p !="" && c !=""){
				return true;
			}else{
				return false;
			}
		});*/
		$('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
		//});
	$('#loginbtn').click(function(){
		
			var p = $("#username").val();
			var c = $("#code").val();

			if(p !="" && c !=""){
				$.get('/bmw/index.php/Sms/checka',{'phone':p,'code':c},function(data){
					if(eval(data)){
						$('#ye').html("<td colspan='2' style='text-align:center'><input class='inp' type='submit' name='sub' value='确认订单' /></td>");
						//window.location.reload();
					}else{
						alert('验证失败');
					}
				})
			}
	});
</script>

	<div class='bottom'>
		<img src="/bmw/Public/home/imgs/log.png" />
		<a class="flatbtn" href="/bmw/index.php/Make/index">立即预约</a>
		<?php if($_SESSION['phone'] == ''): ?><a  href="#loginmodal" class="flatbtn" id="modaltrigger">个人中心</a>

			
		<?php else: ?>
		
		<a class="flatbtn"  href="/bmw/index.php/order/order">我的订单</a><?php endif; ?>

		
	</div>

	<script type="text/javascript">

	$(function(){
  	$('#loginform').submit(function(e){
  		var p = $("#username").val();
  		var c = $("#code").val();
  		
  		if(/^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/.test(p)){
  			return true;
  		}else{
  			return false;
  		}

    
  	});
  
  	$('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
	});
	
	//p ==""?$("#getcode").attr("disabled", "true"):$("#getcode").removeAttr("disabled");

	$('#getcode').click(function(){
		var p = $("#username").val();
		var curCount=60;
		var len = $("#username").val().length
		if(/^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/.test(p)){
			$.get("/bmw/index.php/Sms/sendMessage",{"phone":p},function(data){
			});
		$("#sp").html("");

			function SetRemainTime() {
		        if (curCount == 0) {                  
		            window.clearInterval(InterValObj);//停止计时器  
		            $("#getcode").removeAttr("disabled");//启用按钮  
		            $("#getcode").val("重新获取验证码");  
		           // code = ""; //清除验证码。如果不清除，过时间后，输入收到的验证码依然有效      
		        }else {  

		            curCount--;  
		            $("#getcode").val(curCount + "秒后重新获取");
		        }  
	    	}
		

			
			$("#getcode").val(curCount + "秒后重新获取");
			$("#getcode").attr("disabled", "true");
			InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次  
	        //向后台发送处理数据
	        
		}else{
			//$("#getcode").attr("disabled", "true");
			$("#sp").html("手机号不正确");
		}

	});
</script>
	<!-- 代码 end -->
	
</body>
</html>