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
<script type="text/javascript" language="javascript">
    $(document).ready(function () {

        $('.addressD').click(function(){
            $(this).next().css({'position':'absolute','z-index':10,'padding':'2px','margin-left':'20px'}).slideToggle("slow");
            myClose();
            return false;           
        });

        $('.modStatus').click(function(){

            $(this).next().next().css({'position':'absolute','z-index':10,'padding':'2px','margin-left':'-180px'}).slideToggle("slow");
            myClose();
            return false; 
        });
    }); 
    function myClose(){
        $(".close").click(function(){ 
            $(this).parent().parent().parent().hide("slow"); 
        }); 
    }
</script> 
<div class="wrapper">
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    订单列表
                </header>
                <div class="panel-body">
                    <div class="adv-table">
                        <table  class="display table table-bordered table-striped" id="dynamic-table">

                                <tr>
                                    <th width='6%'>编号</th>
                                    <th width='5%'>地址</th>
                                    <th width="15%">车型</th>
                                    <th width="6%" class="hidden-sm">总价格</th>
                                    <th width="5%">预约时间</th>
                                    <th width="6%" class="hidden-sm">车牌号</th>
                                    <th width="6%" class="hidden-sm">vin码</th>
                                    <th width="5%" class="hidden-sm">状态</th>
                                    <th width="7%">操作</th>
                                </tr>

                            <tbody>
                                <?php if(is_array($orders)): foreach($orders as $key=>$order): ?><tr class="gradeX">
                                        <td width="6%"><?php echo ($order['id']); ?></td>
                                        <td width="5%">
                                            <a href="#" class="addressD">地址</a>
                                            <div class="panel panel-info" style="display:none;">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">联系地址<span class="close" style="float:right;cursor:pointer;">X</span></h3>
                                                </div>
                                                <div class="panel-body">
                                                    <table border='0'>
                                                        <tr>
                                                            <td>联系人：</td>
                                                            <td><?php echo ($order['user']); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>电&nbsp;&nbsp;&nbsp;&nbsp;话：</td>
                                                            <td><?php echo ($order['telephone']); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>地&nbsp;&nbsp;&nbsp;&nbsp;址：</td>
                                                            <td><?php echo ($order['address']); ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        <td width="15%">
                                            <?php echo ($order['carType']); ?>
                                        </td>
                                        
                                        <td width="6%"  class="hidden-sm"><?php echo ($order['lastPrice']); ?>元</td>
                                        <td width="5%">
                                            <?php echo ($order['orderDate']); ?>&nbsp;<?php echo ($order['orderTime']); ?>
                                        </td>
                                        <td width="6%" class="hidden-sm"><?php echo ($order['carNumber']); ?></td>
                                        <td width="6%" class="hidden-sm"><?php echo ($order['vin']); ?></td>
                                        <td width="5%"  class="hidden-sm">
                                            <!--订单的id-->
                                            <input type='hidden' value="<?php echo ($order['id']); ?>" name="id" class="orderId" />
                                                <?php if($order['orderStatus'] === '1'): ?><font color='red'>未审核</font>
                                                <?php elseif($order['orderStatus'] === '2'): ?>
                                                    <font color='green'>审核通过</font>
                                                <?php elseif($order['orderStatus'] === '3'): ?>
                                                    <font color='green'>技师已出发</font>
                                                <?php elseif($order['orderStatus'] === '4'): ?>
                                                    <font color='green'>已付款</font>
                                                <?php elseif($order['orderStatus'] === '5'): ?>
                                                    <font color='green'>已完成,待评价</font>
                                                <?php elseif($order['orderStatus'] === '6'): ?>
                                                    <font color='green'>已评价</font><?php endif; ?>
                                        </td>
                                        <td width="7%">
                                            <?php if($order['orderStatus'] === '1'): ?><a href="/admin.php/Order/pass/id/<?php echo ($order['id']); ?>"title="审核" alt="审核" onclick="return check()"><i class="fa fa-smile-o"></i></a>&nbsp;<?php endif; ?>
                                            <?php if($order['serverCarId'] == '0' and $order['orderStatus'] === '2'): ?><a href="/admin.php/Tech/index/id/<?php echo ($order['id']); ?>"title="分配服务车" alt="分配服务车"><i class="fa fa-truck"></i></a>&nbsp;<?php endif; ?>
                                            <a href="/admin.php/Order/mod/id/<?php echo ($order['id']); ?>" title="编辑" alt="编辑"><i class="fa fa-edit"></i></a>
                                            &nbsp;<a href="/admin.php/Order/cancelOrder/id/<?php echo ($order['id']); ?>" title="取消" alt="取消" onclick="return check1()"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="9" class="hidden-sm">
                                            <input type="hidden" class="id" size="4" value="<?php echo ($order['id']); ?>" style="float:left;" />
                                            <!--定义一个变量 只当变量为0时显示确定按钮-->
                                            <b style="float:left;">服务：</b>
                                            <?php $num = 1; ?>
                                            <?php if(is_array($order["combo"])): foreach($order["combo"] as $k=>$c): if($order['interval'][$k] == 1): ?><span style="float:left;"><?php echo ($c); ?>:<?php echo ($order['price'][$k]); ?>元;&nbsp;</span>
                                                    <input type="text" class="p" size="5" style="float:left;">&nbsp;
                                                    <?php if($num == 1): ?><button class="yes">确定</button><?php endif; ?>
                                                    <?php $num++; ?>
                                                <?php else: ?>
                                                    <input type="hidden" class="one" value="<?php echo ($order['price'][$k]); ?>" /><span style="float:left;"><?php echo ($c); ?>:<?php echo ($order['price'][$k]); ?>元;&nbsp;</span><?php endif; endforeach; endif; ?>
                                        </td>
                                    </tr>
                                    <?php if(is_array($evaluate)): foreach($evaluate as $key=>$eval): if($order['id'] == $eval['orderId']): ?><tr>
                                                <td colspan="9" class="hidden-sm">
                                                    <!--定义一个变量 只当变量为0时显示确定按钮-->
                                                    <b style="float:left;">评价：</b>
                                                    <div style="float:left;">
                                                        <?php $__FOR_START_1591840060__=0;$__FOR_END_1591840060__=$eval['grade']+1;for($i=$__FOR_START_1591840060__;$i < $__FOR_END_1591840060__;$i+=1){ ?><i class="fa fa-star" style="color:#FDAA01"></i><?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <?php echo (date("Y-m-d H:i:s",$eval['time'])); ?>
                                                    </div>
                                                    <br />
                                                    <div style="float:left;text-indent:3em;"><?php echo ($eval['content']); ?></div>
                                                </td>
                                            </tr><?php endif; endforeach; endif; endforeach; endif; ?>
                            </tbody>             
                        </table>
                        <div style="float:right;"><?php echo ($show); ?></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
    <script>
        //验证审核
        function check(){
            var nv=confirm('您确定要审核此订单么？');
            if(nv){
                return true;
            }else{
                return false;
            }
        }
        //验证取消订单
        function check1(){
            var nv=confirm('您确定要取消此订单么？');
            if(nv){
                return true;
            }else{
                return false;
            }
        }
        $('.select').change(function(){
            var data = {orderStatus:$(this).val(),orderId:$(this).prev().val()};
            $.get('updateStatus',data,function(d){
                if(d==1){
                    location.href="/admin.php/Order/index";
                }
            });
        });
        //点击确定按钮时
        $('.yes').click(function(){
            //获得此按钮的所有input同辈元素
            var num = $(this).siblings('input.p').length;
            var sum = 0;
            for(n = 0 ; n < num; n++){
                s = $(this).siblings('input.p').eq(n).val();
                //算出之和                
                sum = s*1+sum;
            }
            //获取单个价格的值
            var one = $(this).siblings('input.one').val();
            var last = 0;
            //判断订单中是否有单个价格,若有则与输入框中的值相加,若没有则存入输入框中的值
            if(one){
                last = sum*1+one*1;
            }else{
                last = sum;
            }
            //获取订单的id
            var orderId = $(this).siblings('input.id').val();
            var data = {id:orderId,lastPrice:last};
            $.get('/admin.php/Order/modLastPrice',data,function(d){
                if(d==1){
                    location.href = "/admin.php/Order/index";
                }
            });
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