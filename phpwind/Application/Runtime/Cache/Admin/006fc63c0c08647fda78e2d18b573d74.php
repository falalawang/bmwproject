<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta name="author" content="ThemeBucket">
	<link rel="shortcut icon" href="#" type="image/png">

	<title>宇瑞安后台管理系统</title>

	<!--icheck-->
	<link href="/Public/admin/js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
	<link href="/Public/admin/js/iCheck/skins/square/square.css" rel="stylesheet">
	<link href="/Public/admin/js/iCheck/skins/square/red.css" rel="stylesheet">
	<link href="/Public/admin/js/iCheck/skins/square/blue.css" rel="stylesheet">
    <link rel="stylesheet" href="/Public/admin/css/y.css">
	<!--dashboard calendar-->
	<link href="/Public/admin/css/clndr.css" rel="stylesheet">

	<!--Morris Chart CSS -->
	<link rel="stylesheet" href="/Public/admin/js/morris-chart/morris.css">

	<!--common-->
	<link href="/Public/admin/css/style.css" rel="stylesheet">
	<link href="/Public/admin/css/style-responsive.css" rel="stylesheet">

    <!--dynamic table-->
    <link href="/Public/admin/js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
    <link href="/Public/admin/js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="/Public/admin/js/data-tables/DT_bootstrap.css" />


	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="/Public/admin/js/html5shiv.js"></script>
	<script src="/Public/admin/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="sticky-header">

<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <img src="/Public/admin/images/logo.png" alt="">
        </div>

        <div class="logo-icon text-center">
            <a href="index.html"><img src="/Public/admin/images/logo_icon.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->

        <div class="left-side-inner">

            <!-- visible to small devices only -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <div class="media-body">
                        <h4><a href="#"><?php echo (session('hname')); ?></a></h4>
                    </div>
                </div>
            </div>

            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li><a href="/admin.php/Index/main"><i class="fa fa-home"></i> <span>后台首页</span></a></li>
                <?php if(($_SESSION['auth']== '0') or ($_SESSION['auth']== '1')): ?><li class="menu-list"><a href=""><i class="fa fa-user"></i> <span> 用户列表</span></a>
                        <ul class="sub-menu-list">
                            <li><a href="/admin.php/Customer/userList"> 所有用户</a></li>
                            <li><a href="/admin.php/Customer/wechat"> 微信用户</a></li>

                        </ul>
                    </li><?php endif; ?>
                <li class="menu-list"><a href=""><i class="fa fa-book"></i> <span> 订单管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="/admin.php/Order/index"> 订单列表</a></li>
                        <li><a href="/admin.php/Order/cancel"> 已取消订单</a></li>
                    </ul>
                </li>
				<li class="menu-list"><a href=""><i class="fa fa-ambulance"></i> <span> 车型管理</span></a>
                    <ul class="sub-menu-list">
                    <?php if($_SESSION['auth']!= '2'): ?><li><a href="/admin.php/Models/brandList"> 品牌列表</a></li>
                        <li><a href="/admin.php/Models/seriesList"> 车系列表</a></li><?php endif; ?>
                        <li><a href="/admin.php/Models/typesList"> 车型列表</a></li>
                    </ul>
                </li>
                <?php if($_SESSION['auth']!= '2'): ?><li class="menu-list"><a href=""><i class="fa fa-cogs"></i> <span> 网站管理</span></a>
                        <ul class="sub-menu-list">
                            <li><a href="/admin.php/Manage/set"> 网站配置</a></li>
                              <li><a href="/admin.php/Manage/onOff"> 网站开关</a></li>
                        </ul>
                    </li><?php endif; ?>
            
                <li class="menu-list"><a href=""><i class="fa fa-beer"></i> <span> 套餐管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="/admin.php/Combo/comboList"> 套餐列表</a></li>
                    <?php if($_SESSION['auth']!= '2'): ?><li><a href="/admin.php/Combo/addPrice"> 添加价格</a></li><?php endif; ?>
                        <li><a href="/admin.php/Combo/priceList"> 价格列表 </a></li>
                    </ul>
                </li>
                <?php if($_SESSION['auth']!= '2'): ?><li class="menu-list"><a href=""><i class="fa fa-dashboard"></i> <span> 后台人员管理</span></a>
                        <ul class="sub-menu-list">
                        <?php if($_SESSION['auth']== '0'): ?><li><a href="/admin.php/Manage/add"> 添加后台人员</a></li><?php endif; ?>  
                        <li><a href="/admin.php/Manage/myList"> 后台人员列表</a></li>
                                  
                        </ul>
                    </li><?php endif; ?>

                <li class="menu-list"><a href=""><i class="fa fa-truck"></i> <span> 4S店服务车管理</span></a>
                    <ul class="sub-menu-list">
                    <?php if($_SESSION['auth']!= '2'): ?><li><a href="/admin.php/ServerCar/storeList"> 4S店列表</a></li>
                        <li><a href="/admin.php/ServerCar/serverCarList"> 服务车列表</a></li>
                        <li><a href="/admin.php/ServerCar/servicemanList"> 技师列表</a></li><?php endif; ?>
                        <li><a href="/admin.php/ServerCar/storeCarList"> 配备列表</a></li>
                    </ul>
                </li>


                <?php if($_SESSION['auth']!= '2'): ?><li><a href="/admin.php/AutoReply/index"><i class="fa fa-pagelines"></i><span> 自动回复设置</span></a></li><?php endif; ?>

            </ul>
            <!--sidebar nav end-->
        </div>
    </div>
    <!-- left side end-->
    
    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

            <!--toggle button start-->
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            <!--toggle button end-->


            <!--notification menu start -->
            <div class="menu-right">
                <ul class="notification-menu">
					<li>
                        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            &nbsp;&nbsp;<?php echo (session('hname')); ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a href="/admin.php/Vip/index"><i class="fa fa-user"></i> 修改密码</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/admin.php/Login/logout" class="btn btn-default dropdown-toggle info-number">
                            <i class="fa fa-sign-out"></i>退出
                        </a>
                    </li>
                </ul>
            </div>
            <!--notification menu end -->

        </div>
        <!-- header section end-->

        <!-- page heading start-->
        <div class="page-heading">
            <h3>
            <?php if($_SESSION['auth']== '0'): ?>超级管理员
                <?php elseif($_SESSION['auth']== '1'): ?>管理员
                <?php elseif($_SESSION['auth']== '2'): ?>客服
                <?php elseif($_SESSION['auth']== '3'): ?>维修工<?php endif; ?><span>，您好</span>
            </h3> 
            <div class="state-info">
                <section class="panel">
                    <div class="panel-body">
                        <div class="summary">
                            <span>当前时间:</span>
                            <h3 id="myTime"></h3>
                           
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
        
<script src="/Public/admin/js/jquery.js"></script>
<div class="wrapper">
    <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
            <a href="/admin.php/ServerCar/servicemanList"> 技师列表</a>>>
                添加技师
            </header>
            <div class="panel-body">
                <form action="/admin.php/ServerCar/insertServiceman" id="myform" class="form-horizontal adminex-form" method="post">
                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <label class="col-sm-2 col-sm-2 control-label">用户名</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="name" id="name" />
                        </div>
                        <span class="col-sm-2 control-msg" id="nameMsg"></span>

                    </div>
					<div class="form-group">
                        <div class="col-sm-2"></div>
                        <label class="col-sm-2 col-sm-2 control-label">密码</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="password" id="pwd1" />
                        </div>
                        <span class="col-sm-2 control-msg" id="pwdMsg1"></span>
                    </div>
					<div class="form-group">
                        <div class="col-sm-2"></div>
                        <label class="col-sm-2 col-sm-2 control-label">重复密码</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="password2" id="pwd2">
                        </div>
                        <span class="col-sm-2 control-msg" id="pwdMsg2"></span>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <label class="col-sm-2 col-sm-2 control-label">手机号码</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="telephone" id="tel">
                        </div>
                        <span class="col-sm-2 control-msg" id="telMsg"></span>
                    </div>
					<div class="panel-body">
                        <div class="col-sm-5"></div>
						<button type="submit" class="btn btn-default">确认添加</button>
                    </div>
                </form>
            </div>
		</section>
		</div>
    </div>
</div>
        <script type="text/javascript">
            var isUserName = false;
            var isPwd = false;
            var isRePwd = false;
            var isTel = false;

            $('#name').blur(function(){
                checkUserName();
            });
            function checkUserName(){
                if($('#name').val() == ''){
                    $('#nameMsg').html('用户名不能为空').css({'color':'red'});
                }else if($('#name').val().length > 15){
                    $('#nameMsg').html('用户名位数不能大于15').css({'color':'red'});
                }else{
                    $.ajax({
                        type: "get",
                        url: "/admin.php/ServerCar/checkName",
                        data: "name="+$('#name').val(),
                        success: function(d){
                            if(d == '1'){
                            $('#nameMsg').html('用户名已存在').css({'color':'red'});
                        }else{
                            isUserName = true;
                            $('#nameMsg').html('用户名可用').css({'color':'green'});
                        }
                        }
                    });
                }
            }

            $('#pwd1').blur(function(){
                checkPwd();
            });
            function checkPwd(){
                if($('#pwd1').val() == ''){
                    $('#pwdMsg1').html('密码不能为空').css({'color':'red'});
                }else if($('#pwd1').val().length < 5){
                    $('#pwdMsg1').html('密码位数不能小于5').css({'color':'red'});
                }else if($('#pwd1').val().length > 16){
                    $('#pwdMsg1').html('密码位数不能大于16').css({'color':'red'});
                }else{
                    isPwd = true;
                    $('#pwdMsg1').html('密码可用').css({'color':'green'});
                }
            }

            $('#pwd2').blur(function(){
                checkRePwd();
            });
            function checkRePwd(){
                 if($('#pwd2').val() == ''){
                    $('#pwdMsg2').html('确认密码不能为空').css({'color':'red'});
                }else if($('#pwd1').val() == $('#pwd2').val()){
                    isRePwd = true;
                    $('#pwdMsg2').html('密码可用').css({'color':'green'});
                }else{
                    $('#pwdMsg2').html('两次输入的密码不一致').css({'color':'red'});
                }
            }
            $('#tel').blur(function(){
                checkTel();
            });
            function checkTel(){
                var tel = $('#tel').val();
                var preg = /1[3-9]\d{9}$/;
                if(tel == ''){
                    $('#telMsg').html('手机号码不能为空').css({'color':'red'});
                }else if(!preg.test(tel)){
                    $('#telMsg').html('手机号码格式不正确').css({'color':'red'});
                }else{
                    isTel = true;
                    $('#telMsg').html('手机号码可用').css({'color':'green'});
                }
            }

            $('#myform').submit(function(){
                checkUserName();
                checkPwd();
                checkRePwd();
                checkTel();

                if(isUserName && isPwd && isRePwd && isTel){
                    return true;
                }else{
                    return false;
                }
            });

        </script>


        </div>
        <!--body wrapper end-->

        <!--footer section start-->
        <footer>
            2015 &copy; 宇瑞安
        </footer>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>
</body>
<!-- Placed js at the end of the document so the pages load faster -->
<script src="/Public/admin/js/jquery-1.10.2.min.js"></script>
<script src="/Public/admin/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="/Public/admin/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/Public/admin/js/bootstrap.min.js"></script>
<script src="/Public/admin/js/modernizr.min.js"></script>
<script src="/Public/admin/js/jquery.nicescroll.js"></script>


<!--dynamic table-->
<script type="text/javascript" language="javascript" src="/Public/admin/js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="/Public/admin/js/data-tables/DT_bootstrap.js"></script>

<!--dynamic table initialization -->
<script src="/Public/admin/js/dynamic_table_init.js"></script>

<!--easy pie chart-->
<script src="/Public/admin/js/easypiechart/jquery.easypiechart.js"></script>
<script src="/Public/admin/js/easypiechart/easypiechart-init.js"></script>
<!--Sparkline Chart-->
<script src="/Public/admin/js/sparkline/jquery.sparkline.js"></script>
<script src="/Public/admin/js/sparkline/sparkline-init.js"></script>
<!--icheck -->
<script src="/Public/admin/js/iCheck/jquery.icheck.js"></script>
<script src="/Public/admin/js/icheck-init.js"></script>
<!-- jQuery Flot Chart-->
<script src="/Public/admin/js/flot-chart/jquery.flot.js"></script>
<script src="/Public/admin/js/flot-chart/jquery.flot.tooltip.js"></script>
<script src="/Public/admin/js/flot-chart/jquery.flot.resize.js"></script>
<script src="/Public/admin/js/morris-chart/morris.js"></script>
<script src="/Public/admin/js/morris-chart/raphael-min.js"></script>
<script src="/Public/admin/js/calendar/clndr.js"></script>
<script src="/Public/admin/js/calendar/evnt.calendar.init.js"></script>
<script src="/Public/admin/js/calendar/moment-2.2.1.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
<script src="/Public/admin/js/scripts.js"></script>
<script src="/Public/admin/js/dashboard-chart-init.js"></script>

<script type="text/javascript">
        var myTime = document.getElementById('myTime');
        function myClock(){
            var mydate = new Date();
            var myYear = mydate.getFullYear();
            var myMonth = mydate.getMonth()+1;
            var myDate = mydate.getDate();
            var myHours = mydate.getHours();
            var myMin = mydate.getMinutes();
            var mySec = mydate.getSeconds();
            
            if(0 < myHours && myHours < 10){
                myHours = '0'+myHours;
            }
            if(myMin <= 9){
                myMin = '0'+myMin;
            }
            if(mySec <= 9){
                mySec = '0'+mySec;
            }     
            mytime = "<font color='#51D4CC' size='+1'>"+myYear+"-"+myMonth  +"-"+myDate+"&nbsp;"+myHours+":"+myMin+":"+mySec+"</font>";
            myTime.innerHTML = mytime;
            setTimeout("myClock()",1000);
        }
        myClock();


        /*function getCookie(name){
            //'username=abc; password=123456; aaa=123; bbb=4r4er'
            var arr=document.cookie.split('; ');
            var i=0;  
            //arr->['username=abc', 'password=123456', ...] 
            for(i=0;i<arr.length;i++){
                //arr2->['username', 'abc']
                var arr2=arr[i].split('=');   
                if(arr2[0]==name){
                  return arr2[1];
                }
            } 
            return '';
        }

        var a = getCookie('nav') - 1;
        // // alert(a);
        $('li.menu-list').eq(a).addClass('nav-active');*/

</script>
</html>