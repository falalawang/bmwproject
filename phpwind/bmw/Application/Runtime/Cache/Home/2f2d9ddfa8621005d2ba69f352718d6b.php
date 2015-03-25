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

	<div id="loginmodal" style="display:none;">

	  <p>请登录</p>
      <input placeholder='*手机号' type="text" name="phone" id="username" maxlength="11" class="txtfield" value="" ><span id="sp" style="font-size:12px;color:red"></span>
      <br />
      <input placeholder='*验证码' type="text" name="code" class="txtfiel" id="code" maxlength="4" value="" ><input type="button" id="getcode" class="flatbtn-w" value="获取验证码" >
      <br />
      <input type="submit" name="loginbtn" id="loginbtn" class="flatbtn-blu hidemodal" value="确定" tabindex="3">
  </div>


<!-- 代码 begin -->
	<!-- 代码 开始 -->
	<div class="box">
		<div class="t_news">
			<b style='width:40px'>公告:</b>
			<b style='width:80%'><marquee onMouseOver="this.stop()" onMouseOut="this.start()" scrolldelay ="200">未来三天将会有活动出现,大家注意查看……</marquee></b>
		</div>
	</div>
	
	
	<div class='contentb'>
		<form action='/bmw/index.php/Make/look' method='post'>
			<input class='inpa' name='date' id="d11" type="text" placeholder='点击选择日期' onClick="WdatePicker()"/>
			<select class='sela' name='keep_time' id='time'>
				<option>请选择时间</option>
				<option value='08:00-10:00' id='ond'>08:00-10:00</option>
				<option value='10:00-12:00' id='two'>10:00-12:00</option>
				<option value='14:00-16:00' id='three'>14:00-16:00</option>
				<option value='16:00-18:00' id='four'>16:00-18:00</option>
            </select><br />
			<input type='hidden' value="<?php echo ($zhi['brand']); ?>" name='brand'/>
			<input type='hidden' value="<?php echo ($zhi['series']); ?>" name='series'/>
			<input type='hidden' value="<?php echo ($zhi['models']); ?>" name='models'/>
			<input type='hidden' value="<?php echo ($zhi['price']); ?>" name='price'/>
			<input id="lpn" class='inp' type='text' name='LPN' value="" placeholder='*您的车牌号后六位' />
			<input class='inp' type='text' name='vin' placeholder='*您的VIN码' />
			<input class='inp' type='hidden' name='combo' value="<?php echo ($zhi['combo']); ?>"/>
			<?php echo ($city); ?>
			<input type="text" id="suggestId" name='address' size="30" placeholder='*具体地址' class='inp' />
			<!--<input type='text' name='address' placeholder='*街道' class='inp' /><br />-->
			<div id="container" style="display:none"></div>
			<input type='text' name='texts' placeholder='*备注' class='inp' /><br />
			<input type='submit' value='提交' class='inp' />
		</form>
	</div>
	<script>
		
		//var pre = "/^[A-Z]{1}[0-9]{5}$/";
		//alert(/^[A-Z]{1}\d{5}$/g.test(p));
		$("form").submit(function(){
				var p = $("#lpn").val();

			if(/^[A-Z]{1}\d{5}$/g.test(p)){
				//alert("111111");
				return true;
			}else{
				alert("车牌号格式不正确");
				return false;

			}
		});

		$('#d11').blur(function(){

			var date = $('#d11').val();
			
			var dto = date+'08:00-10:00';
			$.get('/bmw/index.php/Make/four',{'dto':dto},function(data){
			if(data.a == 4){
				$('#ond').attr({'disabled':'disabled'});
			}},'json');
			
			var dtt = date+'10:00-12:00';
			$.get('/bmw/index.php/Make/four',{'dtt':dtt},function(data){
			if(data.b == 4){
				$('#two').attr({'disabled':'disabled'});
			}},'json');
			
			var dts = date+'14:00-16:00';
			$.get('/bmw/index.php/Make/four',{'dts':dts},function(data){
			if(data.c == 4){
				$('#three').attr({'disabled':'disabled'});
			}},'json');
			
			var dtf = date+'16:00-18:00';
			$.get('/bmw/index.php/Make/four',{'dtf':dtf},function(data){
			if(data.d == 4){
				$('#four').attr({'disabled':'disabled'});
			}},'json');
		});
	function G(id) {
    return document.getElementById(id);
}

var map = new BMap.Map("container");
var point = new BMap.Point(116.3964,39.9093);
map.centerAndZoom(point,13);
map.enableScrollWheelZoom();

var ac = new BMap.Autocomplete(    //建立一个自动完成的对象
    {"input" : "suggestId"
    ,"location" : map
});

ac.addEventListener("onhighlight", function(e) {  //鼠标放在下拉列表上的事件
var str = "";
    var _value = e.fromitem.value;
    var value = "";
    if (e.fromitem.index > -1) {
        value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
    }    
    str = "FromItem<br />index = " + e.fromitem.index + "<br />value = " + value;
    
    value = "";
    if (e.toitem.index > -1) {
        _value = e.toitem.value;
        value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
    }    
    str += "<br />ToItem<br />index = " + e.toitem.index + "<br />value = " + value;
});

var myValue;
ac.addEventListener("onconfirm", function(e) {    //鼠标点击下拉列表后的事件
var _value = e.item.value;
    myValue = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
    
    setPlace();
});

	</script>
	<script type="text/javascript">
	$('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
		//});
	$('#loginbtn').click(function(){
			var p = $("#username").val();
			var c = $("#code").val();

			if(p !="" && c !=""){
				$.get('/bmw/index.php/Sms/checka',{'phone':p,'code':c},function(data){
					//alert(data)；
					//if(eval(data)){
						//alert('验证失败');
					//	window.location.reload();
					//}
					//window.location.reload();
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