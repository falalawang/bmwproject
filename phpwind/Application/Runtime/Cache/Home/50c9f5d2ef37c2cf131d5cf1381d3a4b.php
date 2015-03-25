<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8" />
		<title>宇瑞安|4s到家汽车保养|登录</title>
		<meta name="keywords" content="汽车保养上门服务，4s店上门保养，宝马4s点保养" />
		<meta name="description" content="4s店汽车保养上门服务" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="/Public/home/css/bootstrap.min.css" rel="stylesheet" />
		<link href="/Public/home/css/bwm.css" rel="stylesheet" />
		<script src="/Public/home/js/jquery.js"></script>
	</head>
	<body>			
		<div class="container">
			<div class="center">
				<h1>
					<span class="red">4s</span>
					<span class="white">到家汽车保养</span>
				</h1>
				<h4 class="blue">&copy; 宇瑞安</h4>
			</div>
			<div class="content">
				<div class="top">
					<h4 class="center blue msg">请输入您的信息</h4>
					<form>
					<div class="row">
					<div class="col-xs-12">												
						<input type="text" class="col-sm-12 form-control" id="tel" placeholder="您的手机号" style="margin-bottom:20px;" />					
						<input type="text" id="code" class="col-xs-6" placeholder="动态密码" style="height:30px;" />
						<button type="button" id="btn" class="pull-right btn btn-sm btn-default" onclick="sendMessage()" style="width:90px;">获取动态密码</button>
					</div>
					</div>
						<div class="center">											
						<button type="button" class="btn btn-sm btn-primary"  style="margin-top:20px;" onclick="checkLogin()">登录</button>
							
						</div>		
					</form>										
				</div>	
				<div class="navbar-fixed-bottom bottom"></div>
			</div>
		</div>
		<script type="text/javascript">
		function checkLogin(){
			var tel=document.getElementById("tel");
			var code=$("#code").val();
			if(tel.value.length==11 && code){
				var data={telephone:tel.value,code:code};
				$.get("checkLogin",data);
			}else{
				return false;
			}
		}
		$("#tel").keyup(function(){alert(1);
			var tel=document.getElementById("tel");
			if(tel.value.length==11){
				$("#btn").css({ "color": "#fff", "background": "#3296b1" });
			}
		});
		function sendMessage(){
			$("#btn").attr("disabled","disabled");
			$("#btn").html(60);
			time = setInterval("dec()",1000);
			var tel=$("#tel").val();
			var data={telephone:tel};
			$.get("sendMessage",data);
		}

		function dec(){
			if($("#btn").html()==0){
				$("#btn").html("获取动态密码");
				$("#btn").removeAttr("disabled");
				clearInterval(time);
			}else{
				$time=$("#btn").html()-1;
				$("#btn").html($time);
			}
		}

		</script>		
	</body>
</html>