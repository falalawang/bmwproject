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
	
	
<html>

	<head>
		<meta charset="utf-8">
		<title>个人中心</title>
		<link rel="stylesheet" href="/bmw/Public/home/css/gerenzhongxin.css">
     <script src="/bmw/Public/home/js/jquery.js"></script>
     
  </head>
 
	<body>

<div class="container user-info i">

  <div class="row">
    <div class="col-md-12 title">
      个人信息
    </div>
  </div>

  <div class="row">
    <div class="col-md-3" >
  <ul class="menu">
    <li class="" style="background-color:#28abcc;">
      <a href="/bmw/index.php/order/order">我的订单</a>
    </li>
    
    <li class="" style="background-color:#28abcc;">
      <a href="/bmw/index.php/settings/setting">个人信息</a>
    </li>
  </ul>
</div>



    <div class="col-md-9 content">
      <div class="info" style="background-color:#28abcc;">
       
        <div style="display:none">
        <input name="utf8" value="✓" type="hidden">
        <input name="_method" value="patch" type="hidden">
        <input name="authenticity_token" value="q588laSmQQNSEgRESgNgjSV/xsAAic0QjGM/ek7W4co=" type="hidden">
        </div>

          <div class="address">
            <div class="header">
              评价订单
            </div>

            <div class="form-group addresses">
  

  <div class="col-sm-6">
    <div class="current_addresses">

        <div class="radio">
          <label class="addr col-sm-8 control-label">
            请您对本订单做出正确的评价
          </label>
         
        </div>


</div>

   
  </div>
</div>

          </div>

          <div class="settings">
            <div class="header">

              评价内容
            </div>
            
            <div class="form-group" style="margin-left:10%;">
              
              <div class="col-sm-8">
            (点击星星做出评价,5星满分)
              <div class='star' >
              <img src="/bmw/Public/home/imgs/star4.png" width="30px" height="30px">
              <img src="/bmw/Public/home/imgs/star4.png" width="30px" height="30px">
              <img src="/bmw/Public/home/imgs/star4.png" width="30px" height="30px">
              <img src="/bmw/Public/home/imgs/star4.png" width="30px" height="30px">
              <img src="/bmw/Public/home/imgs/star4.png" width="30px" height="30px">

          </div>
               
                <textarea id="textarea" class="form-control" id="user_phone_number" style="resize:none"></textarea>
              </div>

              
             <button class="btn btn-default" style="margin-left:10%;margin-top:10%;">评价订单</button>
             <input type="hidden" class="id" value="<?php echo ($id); ?>">
             
    
             
             </div>
         
            </div>
          </div>
         
          


     </div>
    </div>
  </div>
</div>
</body>
<script>

$('img').click(function(){

  $(this).prevAll().attr('src','/bmw/Public/home/imgs/star3.png');
  $(this).attr('src','/bmw/Public/home/imgs/star3.png');


})


$('button').click(function(){

  var a = $("img[src*='star3.png']").length;
 
  var b = $('#textarea').val(); 
  
  var c = $('.id').attr('value'); 

  
  $.get('/bmw/index.php/Order/dopopular',{star:a,evaluate:b,id:c},function(data){

    if(data){

     window.document.location.href="/bmw/index.php/Order/order";

    }

  });


})


 
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