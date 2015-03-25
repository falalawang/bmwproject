<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title>立即预定-<?php echo ($config["webname"]); ?></title>
  	<meta name="description" content="<?php echo ($config["description"]); ?>">
  	<meta name="keywords" content="<?php echo ($config["keywords"]); ?>">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
	<link rel="shortcut icon" href="/project/Public/Home/image/favicon.png" /> 
	<!--<link rel="stylesheet" type="text/css" href="/project/Public/Home/css/index.css" media="screen">--> 
	<!--<link rel="stylesheet" href="/project/Public/home/css/date.css">-->
	<link rel="stylesheet" href="/project/Public/home/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="/project/Public/home/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/project/Public/home/bootstrap/css/bootstrap-theme.css">
	<link rel="stylesheet" href="/project/Public/home/bootstrap/css/bootstrap-theme.min.css">
	<script type="text/javascript" src="/project/Public/Home/bs/1.11.2.jquery.min.js"></script>
	<script type="text/javascript" src='/project/Public/home/bootstrap/js/bootstrap.min.js'></script>
	<script type="text/javascript" src="/project/Public/Home/js/jquery-1.8.3.js"></script>
	<script type="text/javascript" src="/project/Public/Home/js/scrollable.js"></script>
	<script src='/project/Public/home/laydate/laydate.js'></script>
	<style type="text/css">
		#wizard {font-size:12px;margin:20px auto; width:100%;overflow:hidden;} 
		#wizard .items{width:100%; clear:both; } 
		#wizard .right{float:right;} 
		#wizard #status{height:35px;padding-left:25px !important;border-radius:5px;} 
		#status li{float:left;color:#789;padding:10px 30px;list-style:none;display:none;} 
		#status li.active{background-color:#428bca;font-weight:normal;display:block;border-radius:5px;color:white;} 
		.input{width:10%; height:18px; margin:10px auto;line-height:20px;  
		border:1px solid #d3d3d3; padding:2px} 
		.page{padding:0px 30px;width:100%;float:left;} 
		.page h3{height:42px; font-size:16px; border-bottom:1px dotted #ccc; margin-bottom:20px; 
		 padding-bottom:5px} 
		.page h3 em{font-size:12px; font-weight:500; font-style:normal} 
		.page p{line-height:24px;} 
		.page p label{font-size:14px; display:block;} 
		.btn_nav{height:36px; line-height:36px; margin:20px auto;float:left;} 
		.prev,.next{width:100px; height:32px; line-height:32px;background:#ccc repeat-x bottom; border:1px solid #d3d3d3; cursor:pointer}
		.page span{width:20%;margin:10px 5px;}
		.page select{width:70%;border-radius:5px; }
		.page button{border-radius:7px;background:#428bca;color:white;border:0px;}
		.service span{
			font-size:12px;
			display:block;
			height:16px;
			width:100%;
			text-indent:5px;
		}
		#tol{
			width:150px;
			height:30px;
			line-height:30px;
		}
</style>	
</head>
<body onload='islogin()'>
<!--这里开始分布引导-->
  <div id="wizard"> 
    <ul id="status"> 
        <li class="active"><strong>步骤一:</strong>选择车辆型号</li> 
        <li><strong>步骤二:</strong>选择服务类型</li> 
        <li><strong>步骤三:</strong>填写个人信息</li> 
    </ul> 

    <div class="items"> 
        <div class="page"> 
			<div class="active">
			
			<!--<p><span>选择城市：</span>
				<select name="city_name" id="city_name">
					<!--ajax 返回值-->
			<!--		<option>选择城市</option>
				</select>
			</p>
			-->
			<p><span>选择车牌：</span>
				<select name="brand" id="brand">
					<!--ajax 返回值-->
					<option>选择车牌</option>
				</select>
			</p>
			<p><span>选择车系：</span>
				<select name="series" id="series">
					<!--ajax 返回值-->
					<option>选择车系</option>
				</select>
			</p>
			<p><span>选择车型：</span>
				<select name="model" id="model">
					<option value="">选择车型</option>
					<!--ajax 返回值-->
				</select>
			</p>
			</div>
			<div class="btn_nav">
				<button class="next right" id="next1">下一步 &raquo;</button>
			</div>
        </div> 
        <div class="page"> 
			<div class='service'>
           		<span><input type='checkbox' name='service[]' value='eoof'>&nbsp; 机油机滤</span>
           		<span><input type='checkbox' name='service[]' value='microfil'> &nbsp;微尘滤清器</span>
           		<span><input type='checkbox' name='service[]' value='rearbpiece'> &nbsp;后部制动片</span>
           		<span><input type='checkbox' name='service[]' value='rearbdisc'>&nbsp; 后部制动盘及制动片</span>
           		<span><input type='checkbox' name='service[]' value='fbpiece'> &nbsp;前部制动片</span>
           		<span><input type='checkbox' name='service[]' value='frontbdisc'> &nbsp;前部制动盘及制动片</span>
           		<span><input type='checkbox' name='service[]' value='ngk'> &nbsp;火花塞</span>
           		<span><input type='checkbox' name='service[]' value='carcheck'> &nbsp;车辆检查</span>
           		<span><input type='checkbox' name='service[]' value='aircleaner'> &nbsp;空气滤清器</span>
           		<span><input type='checkbox' name='service[]' value='nwb'> &nbsp;雨刮片</span>
           		<span id='tol'>价格：<font size='3' color='#f40'>0</font> 元</span>
			</div>
			<div class="btn_nav"> 
				<!--<button class="prev" style="float:left" value="上一步">上一步</button>-->
				<button class="next right" style='margin-top:0px' id="next2" />下一步</button> 
			</div>
        </div> 
        <div class="page"> 
			<form class="form-horizontal" name='reg' action='/project/index.php/Index/addorder' method='post'>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">手机号</label>
					    <div class="col-sm-10">
					    	<input type="text" class="form-control" name='tel' id="telinput" placeholder="11位手机号"><span class='tel'></span>
					    </div>
				</div>
				<?php if($tel): else: ?>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">验证手机</label>
					
					  	<div class="col-lg-6">
				            <div class="input-group">
				               	<input type="text" class="form-control" id='code' placeholder='6位验证码'>
				               	<span class="input-group-btn">
				                  	<button class="btn btn-default" type="button" id='verify' style='height:34px'>
				                    获取验证码
				                  	</button>
				               	</span>
				            </div>
				            <span class='getcode'></span>
         				</div>
				</div><?php endif; ?>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
					    <div class="col-sm-10">
					    	<input type="text" class="form-control"  id="nameinput" name='clientname' placeholder="姓名"><span class='name'></span>
					    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">VIN码</label>
					    <div class="col-sm-10">
					    	<input type="text" class="form-control" name='vin' id="inputEmail3" placeholder="行车证上的VIN码">
 					    </div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">预约时间</label>
					
					  	<div class="col-lg-6">
				            <div class="input-group">
				               	<input type="text" class="start form-control" id='start' name='hopedata' readonly/>
				               	<span class="input-group-btn">
				                  	<select class="form-control" name='hopetime' id='hopetime'>
									  	<option>8:00-9:00</option>
									  	<option>9:00-10:00</option>
									  	<option>10:00-11:00</option>
									  	<option>11:00-12:00</option>
									  	<option>12:00-13:00</option>
									  	<option>13:00-14:00</option>
									  	<option>14:00-15:00</option>
									  	<option>15:00-16:00</option>
									  	<option>16:00-17:00</option>
									  	<option>17:00-18:00</option>
									</select>
				               	</span>
				            </div>
				            <span class='time'></span>
         				</div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">选择常用地址</label>
					    <div class="col-sm-10" id='addressmsg'>
													
					    </div>
				</div>
				
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label"></label>
					    <div class="col-sm-10">
					    	<a class="btn btn-default orange-btn" style='background:#428bca;color:#fff;border-radius:7px;'><span id='addabd'>添加</span></a>
					    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">备注</label>
					    <div class="col-sm-10">
					    	<input type="text" class="form-control" name='massage' >
 					    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">当前费用</label>
					    <div class="col-sm-10">
					    	<input type="hidden" class='carservices' name='services'>
					    	<input type="hidden" class='carmodel' name='carmodel'>
					    	<input type="text" class="form-control"  id="price" name='oldprice' readonly>
					    </div>
				</div>
  
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">提交订单</button>
					</div>
				</div>
			</form>
		</div> 
  </div> 
  <!-- 添加地址弹窗 -->
  <div style='display:none' id='addpage'>
  		<div>
            <label style='margin-top:20px;margin-left:25px;'>详细地址: </label> 
        </div>
        <div class="col-sm-6" style='margin-left:10px;'>
            <textarea name="add" class='textarea' cols="30" rows="5"></textarea><br /><br />
            <p><button class='adds'  style='background:#428bca;color:#fff;border-radius:7px;'>添加</button></p>
        </div>
  </div>
<!--分布引导结束-->
<script type="text/javascript" src='/project/Public/home/laydate/laydate.js'></script>
<script type="text/javascript" src="/project/Public/Home/layer/layer.min.js"></script>
<script>
	$(document).ready(function(){
		$(".page").css("display","none");
		$(".page:first").css("display","block");
		$("#next1").attr("disabled",true);
		$("#next2").attr("disabled",true);
	})
	//调用分布引导
	$(function(){
		$("#wizard").scrollable({
			onSeek: function(event,i){
				$("#status li").removeClass("active").eq(i).addClass("active");
				$(".page").css("display","none").eq(i).css("display","block");
			},
		});
	});

// 用于选择车型的三级联动	
$(document).ready(function(){
		$.ajax({
			"url":"/project/index.php/Index/brand",
			"type":"post",
			"success":function(data){ 
				$("#brand").html(data);
			},
		})
		
		//$.ajax({
		//	"url":"/project/index.php/Index/city_name",
		//	"type":"post",
		//	"success":function(data){
		//		$("#city_name").html(data);
		//	}
		//})
});
	
$("#brand").change(function(){
		var brandname=$("#brand").val();
		
		$.ajax({
			"url":"/project/index.php/Index/series",
			"type":"post",
			"data":{'brandname':brandname},
			"success":function(data){
				$("#series").html(data);
			},
		})
		if(brandname=="选择车牌"){
			$("#next1").attr("disabled",true);
		}
});
$("#series").change(function(){
		var brandname=$("#brand").val();
		var seriesname=$("#series").val();
		$.ajax({
			"url":"/project/index.php/Index/model",
			"type":"post",
			"data":{'brandname':brandname,'seriesname':seriesname},
			"success":function(data){
				$("#model").html(data);
			},
		})	
		if((brandname=="选择车牌")||(seriesname=="选择车系")){
			$("#next1").attr("disabled",true);
		}
});
$("#model").change(function (){
	var brandname=$("#brand").val();
	var seriesname=$("#series").val();
	var modelname=$("#model").val();
	if((modelname!="选择车型") && (brandname!="选择车牌") && (seriesname!="选择车系")){
		 $("#next1").removeAttr("disabled");
	}
})
</script>
<!--lws 选择服务-->
<script type="text/javascript">
//lws 选择服务
$('.service input').change(function(){
	var brand = $("#brand").val()
	var series = $("#series").val()
	var model = $("#model").val()
	var services =''
	if(	$('.service input:checked').length){
		$("#next2").removeAttr("disabled");
	}else{
		$("#next2").attr('disabled',true);
	};
	
	$('.service input:checked').each(function(){
		services += $(this).val()+',' 
	})
	$('.carservices').val(services);
	$.ajax({
		"url":"/project/index.php/Index/serprice",
		"type":"POST",
		"data":{"brand":brand,"series":series,"model":model,"services":services},
		"success":function(data){
			$("#tol font").html(data)
			$('#price').val(data);
		}

	})
})
//lws选择服务
</script>
<!--选择车型三级联动结束-->

<script type="text/javascript">
	function islogin(){
		$.post('/project/index.php/Index/issession',function(data){
			if(data == 0){
				isTel = true;
				isCode = true;
				$.post('/project/index.php/Index/gettel',function(d){
					$('#telinput').val(d);
					$('#telinput').attr('readonly',true);
					$.post('/project/index.php/Index/address',{tel:$('#telinput').val()},
					function(data){
						$('#addressmsg').html(data);
					})
				})
			}else{
				isTel = false;
				isCode = false;
			}
		})
	}
	$('#addabd').click(function(){
		window.pagei = $.layer({
   	type: 1,   //0-4的选择,
    title: false,
    border: [0],
    closeBtn: [0],
    shadeClose: true,
    area: ['250px', '180px'],
    offset:['100px',''],
    page: {
        dom: '#addpage' //此处放了防止html被解析，用了\转义，实际使用时可去掉
    }
});
	})
	$('.adds').click(function(){
		$('#addpage').css('display','none')
		layer.close(window.pagei);
		$.post('/project/index.php/Index/add',{address:$('.textarea').val(),tel:$('#telinput').val()},
		function(data){
			if(data == '常用地址只能添加3个'){
				alert(data);
			}else{
				$('#addressmsg').html(data);
			}
			
		})
	})

	//删除常用地址
	function del(obj){
		$.post('/project/index.php/Index/del',{'filed':obj.value,'tel':$('#telinput').val()},
			function(data){
				$('#addressmsg').html(data);
			})
	}


	// 日历
var start = {
    elem: '#start',
    format: 'YYYY/MM/DD',
    min: laydate.now(), //设定最小日期为当前日期
    max: '2099-06-16 23:59:59', //最大日期
    istime: false,
    istoday: false,
    fixed: true,
    issure: false,
    isclear: true,
    zIndex: 200,
    min: laydate.now(1),
    max: laydate.now(7)
};

laydate(start);


//表单验证
// 手机号
var isName = false;
function checktel(){
	var tel = $('#telinput').val();
	var search = /^1[0-9]{10}$/;

	var msg = '';
	if($('#telinput').val().length == 0){
		msg = '手机号不能为空';
	}else if($('#telinput').val().length < 11){
		msg = '请输入正确的手机号';
	}else if(!search.test(tel)){
		msg = '手机号不合法';
	}else{
		isTel = true;
		$.post('/project/index.php/Index/address',{tel:$('#telinput').val()},
			function(data){
				$('#addressmsg').html(data);
			})

	}
	$('.tel').html(msg);
	$('.tel').css("color",'red');
}
$('#telinput').blur(function(){
	checktel();
});


// 验证码
var i=60;
var isTime = true;
$('#verify').click(function(){		
	if(isTime){
		isTime = false;
		$.post("/project/index.php/api/send",{tel:$('#telinput').val()});
		var time=setInterval(function(){
						 
			if(i>0){
				i--;
				var str=i+"秒后重新获取验证码";
				$("#verify").html(str);
			}
			if(i==0){ 
				var str="重新获取验证码";
				$("#verify").html(str);
				isTime = true;
				i = 60;
				clearInterval(time);
			}
		},1000);
	}
})
function checkcode(){
	if(!isCode){
		if($('#code').val().length == 0){
			$('.getcode').html('验证码错误');
			$('.getcode').css("color",'red');
			isCode = false;
		}else{
			$.post('/project/index.php/Index/getsession',{code:$('#code').val(),tel:$('#telinput').val()},
				function(da){
					if(da == 1){
						$('.getcode').html('验证码错误');
						$('.getcode').css("color",'red');
						isCode = false;
					}
					if(da == 0){
						$('.getcode').html('');
						isCode = true;
					}
				})
		}
		
	}		
}
$('#code').blur(function(){
	checkcode();
})


// 姓名
function checkname(){
	var name = $('#nameinput').val();
	var msg = '';
	var check = /[\u4e00-\u9fa5]/;
	if($('#nameinput').val().length == 0){
		msg = '姓名不能为空';
	}else if(!check.test(name)){
		msg = '名字必须是中文';
	}else{
		isName = true;
	}
	$('.name').html(msg);
	$('.name').css("color",'red');
}
$('#nameinput').blur(function(){
	checkname();
})

$('#model').change(function(){
	var msg = $('#brand').val()+' '+$('#series').val()+' '+$('#model').val();
	$('.carmodel').val(msg);
})

	//时间 
var isDate = false;
function checktime(){
	if($('#start').val().length == 0){
		$('.time').html('请选择时间');
		$('.time').css("color",'red');
		isDate = false;
	}else{
		$('.time').html('');
		isDate = true;
	}
}
$('#hopetime').change(function(){
	checktime();
})


var myform = document.reg;
myform.onsubmit = function(){
	if(!isTel){
		checktel();	
	}
	checkcode();
	checktime();
  	checkname();
  	if(isTel && isName && isCode && isDate){
        return true;
    }else{
        return false;
    }
}
</script>
</html>