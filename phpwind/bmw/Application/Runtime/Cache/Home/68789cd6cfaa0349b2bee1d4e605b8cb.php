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

    <link rel="stylesheet" href="/bmw/Public/home/bootstrap/css/bootstrap.min.css" media="screen" >
   
   	<script src="/bmw/Public/home/js/jquery.js"></script>
    <script src="/bmw/Public/home/js/area.js"></script>
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
				   <li class="" style="background-color:#28abcc;">
				  <a href="/bmw/index.php/order/outlogin">退出登录</a>
				</li>
            </ul>
        </div>



    <div class="col-md-9 content">
      <div class="info" style="background-color:#28abcc;">
        <form accept-charset="UTF-8" action="/bmw/index.php/Settings/add" class="form-horizontal" id="edit_user_18989" method="post">
        <div style="display:none">
            <input name="utf8" value="✓" type="hidden">
            <input name="_method" value="patch" type="hidden">
            <input name="authenticity_token" value="q588laSmQQNSEgRESgNgjSV/xsAAic0QjGM/ek7W4co=" type="hidden">

        </div>

          <div class="address">
            <div class="header">
              常用服务地址
            </div>

            <div class="form-group addresses">
              <label id="content" class="addr col-sm-2 control-label">
                选择常用地址:<br/>
              </label>
             

        <div class="col-sm-6">
          <div class="current_addresses">
         


          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
 添加
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title" id="myModalLabel">添加地址</h4>
      </div>
      <div class="modal-body">
        选择地址：<?php echo ($city); ?><br/><br/><br/>
        详细地址:<input type="text" id="suggestId" name='details' size="30" placeholder='*具体地址' class='inp' />
			
			<div id="container" style="display:none"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">提交</button>
      </div>
    </div>
  </div>
</div>



      </div>



        <?php if(is_array($rest)): foreach($rest as $key=>$v): if($v['status'] == '1'): ?><input type="radio" name="address" 
              /><?php echo ($v['city']); echo ($v['county']); echo ($v['address']); echo ($v['details']); ?>&nbsp;&nbsp;&nbsp;<a style="color:#fff;font-size:14px;font-weight:800"href="/bmw/index.php/Settings/delete/id/<?php echo ($v['id']); ?>">删除</a>&nbsp;&nbsp;&nbsp;<a style="color:#fff;font-size:14px;font-weight:800"href="/bmw/index.php/Settings/def/id/<?php echo ($v['id']); ?>">设为默认地址</a><br/>
<?php else: ?>
  <input type="radio" name="address"  checked
              /><?php echo ($v['city']); echo ($v['county']); echo ($v['address']); echo ($v['details']); ?>&nbsp;&nbsp;&nbsp;<a style="color:#fff;font-size:14px;font-weight:800"href="/bmw/index.php/Settings/delete/id/<?php echo ($v['id']); ?>">删除</a>&nbsp;&nbsp;&nbsp;<a style="color:#fff;font-size:14px;font-weight:800"href="/bmw/index.php/Settings/def/id/<?php echo ($v['id']); ?>">设为默认地址</a><br/><?php endif; endforeach; endif; ?>

  </div>
</div>

          </div>

          <div class="settings">
            <div class="header">
              个人信息
            </div>
            <div class="form-group">
              <label for="username" class="col-sm-2 control-label">姓名</label>
              <div class="col-sm-4">
                <input class="form-control" id="user_username" name="user[username]" type="text" value="<?php echo ($result[0]['username']); ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="phonenum" class="col-sm-2 control-label">手机号码</label>
              <div class="col-sm-4">
                <input class="form-control" disabled="disabled" id="user_phone_number" name="user[phone_number]" value="<?php echo ($result[0]['phone']); ?>" type="text">
              </div>
            </div>
          </div>

          

        
  </form>      

  </div>
    </div>
  </div>
</div>


  
</body>
<script>
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
 <script src="/bmw/Public/home/bootstrap/js/bootstrap.min.js"></script>
 
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