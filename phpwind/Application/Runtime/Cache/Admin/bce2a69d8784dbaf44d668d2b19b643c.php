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
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <section class="panel">
                    <header class="panel-heading custom-tab dark-tab">
                        <span class="nav nav-tabs" style="color:white">修改密码</span> 
                    </header>
                    <div class="panel-body">
                        <div class="tab-pane" id="about2">
                            <div class="row">
                                <div class="col-lg-12">
                                    <section class="panel">
                                        <div class="panel-body">
                                            <form class="form-horizontal" id="myForm" role="form" method="post" action="/admin.php/Vip/mod">
                                                <div class="form-group">
                                                    <label class="col-lg-3 col-sm-4 control-label">原&nbsp;密&nbsp;码：</label>
                                                    <div class="col-lg-5">
                                                        <input type="password" class="form-control" name="oPwd" id="pwd" placeholder="请输入原密码" />                
                                                    </div>
                                                    <label class="control-msg" id='pwdMsg'>原密码</label>
                                                </div>   
                                                <div class="form-group">
                                                    <label class="col-lg-3 col-sm-4 control-label">新&nbsp;密&nbsp;码：</label>
                                                    <div class="col-lg-5">
                                                        <input type="password" name="nPwd" class="form-control" id="pwd1" placeholder="请输入新密码" />                
                                                    </div>
                                                    <label class="control-msg" id='pwd1Msg'>新密码</label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-3 col-sm-4 control-label">重复密码：</label>
                                                    <div class="col-lg-5">
                                                        <input type="password" name="rePwd" class="form-control" id="pwd2" placeholder="请再次输入密码" />
                                                    </div>
                                                    <label class="control-msg" id='pwd2Msg'>确认密码</label>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-5 col-lg-12">
                                                        <button type="submit" class="btn btn-primary">修改</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
        <script>
            var pwd = $('#pwd');
            var pwd1 = $('#pwd1');
            var pwd2 = $('#pwd2');

            var pwdMsg = $('#pwdMsg');
            var pwd1Msg = $('#pwd1Msg');
            var pwd2Msg = $('#pwd2Msg');
            
            var isPwd = false;
            var isPwd1 = false;
            var isPwd2 = false;

            //验证原密码是否输入正确
            pwd.blur(function(){
                checkPwd();
            });

            function checkPwd(){
                //获取input表单中的值
                if(pwd.val() == ''){
                    pwdMsg.html('原密码不能为空');
                    pwdMsg.css('color','red');
                }else{
                    $.ajax({
                            "type":"GET",
                            "url":"/admin.php/Vip/checkPassword",
                            data: "oPwd="+pwd.val(),
                            success: function(d){
                                if(d == 1){
                                    pwdMsg.html('原密码正确');
                                    isPwd = true;
                                    pwdMsg.css('color','green');
                                }else{
                                    pwdMsg.html('原密码不正确');
                                    pwdMsg.css('color','red');
                                    isPwd = false;
                                }
                            }
                    });
                }
            }

            pwd1.blur(function(){
                checkPwd1();
            });

            //验证密码
           function checkPwd1(){
                if(pwd1.val() == ''){
                    pwd1Msg.html('密码不能为空').css('color','red');
                }else if(pwd1.val().length < 5){
                    pwd1Msg.html('密码的长度不能小于5位').css('color','red');
                }else{
                    isPwd1 = true;
                    pwd1Msg.html('密码可用').css('color','green');                   
                }
            }

            pwd2.blur(function(){
                checkPwd2();
            });
           
            //验证确认密码
            function checkPwd2(){
                if(pwd2.val() == ''){
                    pwd2Msg.html('确认密码不能为空').css('color','red');
                }else if(pwd1.val() == pwd2.val()){
                    isPwd2 = true;
                    pwd2Msg.html('密码一致').css('color','green');
                }else{
                    pwd2Msg.html('密码不一致').css('color','red');
                }
            }

            $('#myForm').submit(function(){
                checkPwd();
                checkPwd1();
                checkPwd2();
                if(isPwd && isPwd1 && isPwd2){
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