<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title><?php echo ($config["webname"]); ?></title>
  	<meta name="description" content="<?php echo ($config["description"]); ?>">
  	<meta name="keywords" content="<?php echo ($config["keywords"]); ?>">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
	<link rel="stylesheet" type="text/css" href="/project/Public/Home/css/index.css" media="screen">
	<script type="text/javascript" src="/project/Public/Home/js/jquery-1.8.3.js"></script>
	<style type="text/css">
		.nav span{
			border-right:1px solid gray;
			width:33%;
			cursor:pointer;
		}
		#loginform{
			width:200px;
			height:200px;
			border:2px solid #b4b4b4;
			border-radius:10px;
			padding:3% 3%;
			background: #3da8cc;
			font-family:"Times New Roman", Times, serif;
			font-size:90%;
		}
		#loginform form{
			margin-top:5%;
			width:100%;
		}
		#loginform form div{width:100%;}
		#loginform label{ 
			width:95px;
			height:50px;  
		}
		#loginform button{
			width:100%;
			height:20px;
			font-size:70%;
			cursor:pointer;
			border-radius:2px;
			background:#ccc;
			border:1px;
			
		}
		#loginform div{
			margin:3px 3px;
			align:center;
		}
		#loginform div input{
			width:100%;
			font-size:100%;
			border:1px solid;
			border-radius:3px;
			height:20px;
			color:black;
		}
		#sign{
			padding-top:5px;
		}
		a{
			text-decoration:none;
		}
	</style>
</head>
<body>
	
	<div class='index'>	
			<header>
				<div class='status'> <b> &nbsp;&nbsp;&nbsp; 宇瑞安</b> | <b><span>上门汽车保养</span></b></div>
				<div class='toppic'>
					<img id = "obj" style="width:100%;height:100%;" src = "/project/Public/Home/image/web/top1.png" border = 0 />
				</div>
				<div class='nav'>
					<span onclick="funcLogin()"><b>个人中心</b>
					</span>
					<span onclick="funcLogin()"><b>我的预约</b>
					</span>
					<a href='/project/index.php/Estimate/index'><span id='navs'  style="border-right:0px solid gray;"><b>用户评价</b>
					</span></a>
				</div>
				<div class='listnav'>
					为什么选择上门保养</div>
				<div class='content'>
					<span><b>100% &nbsp;<br>正品配件</b>
					</span>
					<span><b>24h预约<br>上门服务</b>
					</span>
					<span ><b>200万<br>责任险</b>
					</span>
					<span ><b>365天 &nbsp;<br>全年无休</b>
					</span>
				</div>
				<div class='order' ><span onclick="funcOrder()" style="cursor: pointer;">立即预约</span></div>
				<div class='endpic'>
					
				</div>

			</header>
			<section> 
				<div></div>
				<div >值得托付的信赖，<br><span>源自无微不至的关怀。</span></div>
			</section>
			<footer>
				<div class='ftop'>
					<ul>
						<li>上门提供的服务种类等的介绍,加上各种介绍</li>
						<li>1对1服务，每辆车2位专业技师全时服务，无需等待，提供报告，全面排除安全隐患</li>
						<li>365天上门服务，随时随地
							<span><b>便捷</b> 上门服务，打破传统服务桎梏</span>
							<span><b>专注</b> 流程把控，全标准化服务品质</span>
							<span><b>可靠</b> 正品配件，4s出身专业技师</span>
						</li>
					</ul>

				</div>
				<div id='foot2'></div>
				<div class='fbot'>
					<div></div>
				</div>
				<!--lws 前台完善布局-->
				<div class='fbot1'>
					<ul>
						<li>汽修专业学校毕业，有多年4S店或专业修理厂维修保养经验，在经过于瑞安严格、专业的流程和技能培训每位技师必须完成过100次以上现场上门保养实操，熟练掌握30种以上车系车型，考试合格后才能上岗。
						</li>
					</ul>
				</div>
				<div class='fbot2'>
					<ul>
						<li>目前开通服务城市：北京、上海、天津、成都、广州、深圳、西安、大连、太原、杭州。
						</li>
					</ul>
				</div>
				<div class='fbot3'>
					<ul>
						<li>第一步：预订服务 > 审核订单 > 技师提前一天与您确认时间</li>
						<li>技师到达与您约定的服务地点。</li>
						<li>技师跟您确认服务项目及所用配件。
						</li>
						<li>为您的爱车进行车辆检查及施工单确认签字。
						</li>
						<li>技师为您进行全车32项安全监测并录入APP。
						</li>
					</ul>
				</div>
				<div class='fbot4'>
					<ul>
						<li>关注于瑞安微信服务号“yuruiancom”，有专业客服帮您答疑关于车的其他问题。</li>
						<li>关注@于瑞安微博，参与互动，及时获得优惠信息。</li>
						<li>如您想找人工客服解决问题，请拨打：400-000-9999
						</li>
					</ul>
				</div>
				<!--lws 前台完善布局-->
			</footer>
		</div>
	<!--登陆框模块-->	
		<div id="loginform" style="display:none;z-index:11111;">
			<form id="login_info">
				<div>
					<label id="forPhoneNo">输入您的手机</label> 
					<input type="email" id="exampleInputPhoneNo">
				</div>
				<div >
					<button type="button" id="getVerifyCode" onclick="countDown()">点击获取验证码</button>
				</div>
				
				<div>
					<label for="exampleInputPassword1">请输入验证码</label>
					<input type="text" id="exampleInputCode"  >
				</div>
				<div>
					<button type="button" onclick="check_login()">登陆</button>
				</div>
			</form>
		</div>
		<div class="footers">
			<div><?php echo ($config["copyright"]); ?></div>
		</div>
<script type="text/javascript" charset="utf-8">

	function funcLogin(){
		$.ajax({
			"url":"/project/index.php/Index/issession",
			"type":"post", 
			"success":function(data){
				if(data==0){
					window.location="<?php echo U('Personage/index');?>";
				}else {
					//添加底层蒙版
					var str="<div class="+"backlayer"+" style=filter:alpha(opacity:30);opacity:0.3;position:fixed;bottom:0;left:0;z-index:2222;width:100%;height:100%;background-color:#ccc;"+"> </div>";
					//设置登陆框随水平/垂直居中
					$("#loginform").css({ 
						position:"absolute",
						left:($(window).width()-$("#loginform").outerWidth())/2,
						top:($(window).height()-$("#loginform").outerHeight())/2, 
					});   
					$("body").append(str);
					$(window).resize();
					$("#loginform").show();
				}
			}		
		})
	
	}
		//调用底层蒙版单击隐藏登陆框
	$(".backlayer").live('click',function(){
		$(".backlayer").remove();
		$("#loginform").hide();
	})
		//文档加载时,调用resize方法
	$(function(){ 
		$(window).resize(); 
	}); 
		//页面载入时调用时大小居中,记得貌似是有一个跳转页面后不居中的bug
	$(document).ready(function(){
		$(window).resize();
	});
	$(window).scroll(
		function(){
			$(window).resize();
		}
	);
		//窗口调整大小时,登陆框的位置调整
	$(window).resize(function(){ 
		var	left =($(window).width() - $("#loginform").width())/2;
		var top=(document.documentElement.clientHeight-$("#loginform").height())/2;
		var scrollTop = document.body.scrollTop;  
        var scrollLeft = $(document).scrollLeft();   
		$("#loginform").css( { position : 'absolute', 'top': top+scrollTop-950, left : left});
	}); 
	
</script>
<!--弹出登陆框模块结束-->
<!--获取手机验证码模块-->
<script type="text/javascript" charset="utf-8">
	//手机号码合法性检查
	$("#exampleInputPhoneNo").blur(function(){
	var checkNo=$("#exampleInputPhoneNo").val();
	if(checkNo==""){
		$("#forPhoneNo").html("手机号不能为空");
		$("#exampleInputPhoneNo").focus();
		return;
	}
	var pattern=/^1[0-9]{10}$/;
	var msg='';
		if(!pattern.test(checkNo)){
			$("#forPhoneNo").html("非法手机号")
			$("#forPhoneNo").css("color","red");
		}
	})
	$("#exampleInputPhoneNo").focus(function(){
		$("#forPhoneNo").html("请输入手机号");
		$("#forPhoneNo").css("color","black");
	})
	
	function countDown(){
		var tel=$("#exampleInputPhoneNo").val();
	 
		var num=Math.random();
		$.ajax({
			"url":"/project/index.php/Api/sendMessage",
			"type":"post",
			"data":{'tel':tel+num,'num':num}
		})
		var i=60;
		var init=setInterval(function(){
			$("#getVerifyCode").attr('disabled',true); 
			if(i>0){
				i--;
				var countString=i+"秒后重新获取验证码";
				$("#getVerifyCode").html(countString);
			}
			if(i==0){ 
				$("#getVerifyCode").removeAttr('disabled'); 
				var countString="点击获取验证码";
				$("#getVerifyCode").html(countString);
				clearInterval(init);
			} 
		},1000);
	}
	
	$(document).ready(function(){
		$("#getVerifyCode").removeAttr('disabled'); 
	})
</script>
<!--获取验证码结束-->
<!--登陆验证模块,登陆成功跳转到个人中心-->
<script type="text/javascript" charset="utf-8">
	function check_login(){
		var inputCode=$("#exampleInputCode").val();
		var tel=$("#exampleInputPhoneNo").val();
		//alert(inputCode);
	$.ajax({
			"url":"/project/index.php/Index/check_login",
			"type":"post",
			"data":{'code':inputCode,"tel":tel},
			"success":function(data){
				if(data==1){
					//验证成功跳转到登陆页面;
					window.location="<?php echo U('Personage/index');?>";
				}else{
					//验证失败处理结果
					window.location="<?php echo U('Index/index');?>";
					$("exampleInputCode").html('验证码错误');
				}
			}});
	}
<!--验证登陆模块结束-->
</script>

<!--图片轮播模块-->
<script type="text/javascript" charset="utf-8">
	var curIndex = 0;
	var timeInterval = 2000;
	var arr = new Array();
	arr[0] = "/project/Public/Home/image/web/top1.png";
	arr[1] = "/project/Public/Home/image/web/top3.png";
	arr[2] = "/project/Public/Home/image/web/top2.png";
	setInterval(changeImg,timeInterval);
	function changeImg() {
		var obj = document.getElementById("obj");
		if (curIndex == arr.length-1) {
			curIndex = 0;
		} else {
			curIndex += 1;
		}
		obj.src = arr[curIndex];
	}
</script>
<!--图片轮播模块结束-->

<!--跳转订单页面-->
<script type="text/javascript" charset="utf-8">
	function funcOrder(){
		window.location.href="/project/index.php/Index/order";  
	}
</script>

<!--跳转订单结束-->


</body>
</html>