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
    <script language="javascript" type="text/javascript" src="/bmw/Public/home/My97DatePicker/WdatePicker.js"></script>
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
        <form accept-charset="UTF-8" action="/bmw/index.php/Order/dosignconre" class="form-horizontal" id="edit_user_18989" method="post">

       
        

          <div class="settings">

            <div class="header">
              快速预约
            </div>

            <div class="form-group">
              <label for="username" class="col-sm-2 control-label">汽车品牌：</label>
              <div class="col-sm-4">
                <input class="form-control" readonly id="user_username" name="brand" type="text" value="<?php echo ($res[0]['brand']); ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="phonenum" class="col-sm-2 control-label">所属车系：</label>
              <div class="col-sm-4">
                <input class="form-control" readonly id="user_phone_number" name="series" value="<?php echo ($res[0]['series']); ?>" type="text">
              </div>
            </div>

            <div class="form-group">
              <label for="phonenum" class="col-sm-2 control-label">所属车型：</label>
              <div class="col-sm-4">
                <input class="form-control" readonly id="user_phone_number" name="models" value="<?php echo ($res[0]['models']); ?>" type="text">
              </div>
            </div>

             <div class="form-group">
              <label for="phonenum" class="col-sm-2 control-label">保养项目：</label>
                

             
              <div class="col-sm-4"  id="one">
                <input class="form-control" readonly required id="user_phone_number" name="combo" placeholder="点击选择保养项目" type="text">

              

              </div>
           

               
            </div>
          <div class="form-group">
            <div class="col-sm-4" id="none" style="display:none;">
               
                
					
				
				<?php if(is_array($resu)): foreach($resu as $key=>$re): ?><input type='checkbox' name='combo[]' value="<?php echo ($re['combo']); ?>" id='pri' /><span id='pre'><?php echo ($re['combo']); ?></span><span ><?php echo ($re['low_price']); ?></span><span><?php if($re['high_price'] != 0): ?>~<?php endif; ?></span><span><?php if($re['high_price'] != 0): echo ($re['high_price']); endif; ?></span><br/><?php endforeach; endif; ?>
				
					
					
					
                
				
				
              </div>
        </div>
             <div class="form-group">
              <label for="phonenum" class="col-sm-2 control-label">保养总价：</label>
              <div class="col-sm-4">
                <input class="form-control" readonly id="user_phone_number" name="price" value="" type="text"><span>含服务费200元</span>
              </div>
            </div>

             <div class="form-group">
              <label for="phonenum" class="col-sm-2 control-label">保养日期：</label>
              <div class="col-sm-4">
               
              <input class="form-control" name='date' required type="text" id="d221" placeholder='点击选择日期' onFocus="WdatePicker({startDate:'2015-03-24'})"/>
              </div>
            </div>

             <div class="form-group">
              <label for="phonenum" class="col-sm-2 control-label">保养时间：</label>
              <div class="col-sm-4">
               <select class="form-control" name='keep_time'>
                  <option>请选择保养项目</option>
                  <option value='10:00-12:00'>10:00-12:00</option>
                  <option value='12:00-14:00'>12:00-14:00</option>
                  <option value='14:00-16:00'>14:00-16:00</option>
                  <option value='16:00-18:00'>16:00-18:00</option>
            </select>
              </div>
            </div>

             <div class="form-group">
              <label for="phonenum" class="col-sm-2 control-label">保养地址：</label>
              <div class="col-sm-4">
                <input class="form-control" readonly id="user_phone_number" name="aa" value="<?php echo ($att[0]['city']); echo ($att[0]['county']); echo ($att[0]['address']); ?>" type="text">
              </div>
            </div>

            <div class="form-group">
              <label for="phonenum" class="col-sm-2 control-label">车牌号码：</label>
              <div class="col-sm-4">
                <input class="form-control"  id="user_phone_number" name="LPN" value="<?php echo ($res[0]['LPN']); ?>" type="text">
              </div>
            </div>

             <div class="form-group">
              <label for="phonenum" class="col-sm-2 control-label">用户留言：</label>
              <div class="col-sm-4">
                <input class="form-control"  id="user_phone_number" name="message" value="<?php echo ($res[0]['message']); ?>" type="text">
              </div>
            </div>

            <div class="form-group">
              <label for="phonenum" class="col-sm-2 control-label">VIN尾号：</label>
              <div class="col-sm-4">
                <input class="form-control"  id="user_phone_number" name="vin" value="<?php echo ($res[0]['vin']); ?>" type="text">
              </div>
            </div>

          <div class="form-group">
              <label for="phonenum" class="col-sm-2 control-label">手机号码：</label>
              <div class="col-sm-4">
                <input class="form-control" readonly id="user_phone_number" name="phone" value="<?php echo ($res[0]['phone']); ?>" type="text">
              </div>
            </div>

           <div class="form-group" style="margin-left:17%;">
              <input class="btn btn-default" type="submit" class="btn btn-default" value="提交">
              <a class="btn btn-default" href="/bmw/index.php/Make/index">修改</a>
            </div>




          </div>


</form> 
     </div>
    </div>
  </div>
</div>



</body>
<script>
  $('#one').click(function(){


    $('#none').css('display','block');


  })

 $("input[name='combo[]']").click(function () {
		// $("#total2").html() = GetCount($(this));
		if($(this).attr("checked")){
			$(this).attr("checked",false);
		}else{
			$(this).attr("checked",true);
		}
		getCount();
		//alert(conts);
	});
	function getCount(){
		var counts = 200;
		var heigh = 200;
		$("input[name='combo[]']").each(function(){
			//alert(typeof($(this)));
			if($(this).attr("checked")){
				//alert($(this).length);
				for(var i = 0;i < $(this).length;i++){
					//alert(i);
					counts += parseInt($(this).next("span").next().html());
					if($(this).next("span").next().next().next().html() == 0){
						heigh += parseInt($(this).next("span").next().html());
					}else{
						heigh += Number($(this).next("span").next().next().next().html());
					}
				}
			}
		});
		if(counts == heigh){
			$("input[name=price]").val(counts);
			
		}else{
			$("input[name=price]").val(counts+'~'+heigh);
			
		}
		
	}


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