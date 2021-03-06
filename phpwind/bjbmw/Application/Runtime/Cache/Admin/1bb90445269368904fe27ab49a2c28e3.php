<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">


<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/project/Public/Admin/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/project/Public/Admin/plugins/imgareaselect/css/imgareaselect-default.css" media="screen">
<link rel="stylesheet" type="text/css" href="/project/Public/Admin/plugins/jgrowl/jquery.jgrowl.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/project/Public/Admin/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/project/Public/Admin/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/project/Public/Admin/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/project/Public/Admin/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/project/Public/Admin/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/project/Public/Admin/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/project/Public/Admin/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/project/Public/Admin/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/project/Public/Admin/jui/css/jquery.ui.timepicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/project/Public/Admin/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/project/Public/Admin/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/project/Public/Admin/css/themer.css" media="screen">
<block naem="css"></block>
<title>于瑞安网后台管理系统</title>
</head>
<body>

	<!-- Themer (Remove if not needed) -->  
	<div id="mws-themer">
        <div id="mws-themer-css-dialog">
        	<form class="mws-form">
            	<div class="mws-form-row">
		        	<div class="mws-form-item">
                    	<textarea cols="auto" rows="auto" readonly="readonly"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Themer End -->

	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap" style='color:#ccc;font-size:18px;'>于瑞安网后台管理系统
			</div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
        	<!-- Notifications -->
        	
            
            <!-- Messages -->
            
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src="/project/Public/Admin/example/profile.jpg" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        您好，管理员
                    </div>
                    <ul>
                        <li><a href="/project/admin.php/Index/logout">注销</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        	<!-- Searchbox -->
        	
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    <li <?php if(isset($status) and ($status == 2)): ?>hidden<?php endif; ?>
                    >
                        <a href="/project/admin.php/user/index"><i class="icon-home"></i>用户管理</a>
                        
                    </li>
                    
                    <li <?php if(isset($status) and ($status == 2)): ?>hidden<?php endif; ?>
                    >
                        <a><i class="icon-pacman"></i>服务管理</a>
                        <ul class='closed'>
                            <li><a href="/project/admin.php/Service/index">服务项目管理</a></li>
                            <li><a href="/project/admin.php/Serprice/index">服务价格管理</a></li>
                        </ul>
                    </li>
                    <li <?php if(isset($status) and ($status == 2)): ?>hidden<?php endif; ?>
                    >
                        <a href="#"><i class="icon-list"></i>品牌管理</a>
                        <ul  class='closed'>
                            <li><a href="<?php echo U("Brand/index");?>">品牌列表</a></li>
                            <li><a href="<?php echo U("Series/index");?>">车系列表</a></li>
                            <li><a href="<?php echo U("Model/index");?>">车型列表</a></li>
                        </ul>
                    </li>
                    <li <?php if(isset($status) and ($status == 2)): ?>hidden<?php endif; ?>
                    ><a href="/project/admin.php/city/index"><i class="icon-graph"></i>城市管理</a></li>
                    <li <?php if(isset($status) and ($status == 2)): ?>hidden<?php endif; ?>
                    ><a href="/project/admin.php/shop/index"><i class="icon-calendar"></i>4S店管理</a></li>
                   
                    <li <?php if(isset($status) and ($status == 2)): ?>hidden<?php endif; ?>
                    >
                        <a href="#"><i class="icon-list"></i>服务车管理</a>
                        <ul  class='closed'>
                            <li><a href="<?php echo U("Car/index");?>">服务车列表</a></li>
                            <li><a href="<?php echo U("Car/carorder");?>">服务车排班表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a ><i class="icon-home"></i>订单管理</a>
                        <ul  class='closed'>
                            <li><a href="/project/admin.php/indent/index">订单列表</a></li>
                            <li><a href="<?php echo U("indent/cancel");?>">已取消的订单</a></li>
                            <li <?php if(isset($status) and ($status == 2)): ?>hidden<?php endif; ?>
                            ><a href="<?php echo U("Operate/index");?>">订单操作记录</a></li>
                        </ul>
                    </li>
                    
                    <li <?php if(isset($status) and ($status == 2)): ?>hidden<?php endif; ?>
                    >
                        <a href="#"><i  class="icon-cogs"></i>网站管理</a>
                        <ul  class='closed'>
                            <li><a href="<?php echo U("Config/switchs");?>">网站开关</a></li>
                            <li><a href="<?php echo U("Config/index");?>">网站配置</a></li>
                        </ul>
                    </li>
                </ul>
            </div> 
       
        </div>
        
        <!-- Main Container Start -->
		
    <div id="mws-container" class="clearfix">
            <!-- Inner Container Start -->
            <div class="container">
                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span  class="left block"><i class="icon-table">订单管理</i></span>
                        <form action="/project/admin.php/Indent/index" method="get">
                            <div class="right block">
                                
                                    <input type="text" placeholder="请输入条件" name='value' id='value' aria-controls="DataTables_Table_1">&nbsp;&nbsp;<select id='condition' name='condition'>
                                        <option value="o.ordernumber">订单号</option>
                                        <option value="c.clientname">姓名</option>
                                        <option value="o.tel">电话</option>
                                        <option value="o.hopedata">时间</option>
                                        <option value="r.carname">服务车</option>
                                    </select>&nbsp;
                                    <input type="submit" class="btn" value="查询">
                                
                            </div>
                        </form>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table">
                            <thead>
                                <tr>
                                    <th>订单号</th>
                                    <th>姓名</th>
                                    <th>电话</th>
                                    <!-- <th>保养项</th> -->
                                    <th>价格</th>
                                    <!-- <th>最终价格</th> -->
                                    <th>预约时间</th>
                                    <th>地点</th>
                                    <th>服务车</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody align='center'>
                                <?php if(is_array($order)): foreach($order as $key=>$order): ?><tr>
                                        <td><?php echo ($order["ordernumber"]); ?></td>
                                        <td><?php echo ($order["clientname"]); ?></td>
                                        <td><?php echo ($order["tel"]); ?></td>
                                        <!-- <td>--</td> -->
                                        <td><?php echo ($order["oldprice"]); ?></td>
                                        <!-- <td>--</td>                                         -->
                                        <td><?php echo ($order["hopedata"]); ?><br /><?php echo ($order["hopetime"]); ?></td>
                                        <td><?php echo ($order["address"]); ?></td>
                                        <td><?php echo ($order["carname"]); ?></td>
                                        <td>
                                            <?php if($order["status"] == 0): ?>已取消
                                            <?php elseif($order["status"] == 1): ?><font style='color:red'>已提交</font>
                                            <?php elseif($order["status"] == 2): ?>已确定
                                            <?php elseif($order["status"] == 3): ?>已出发
                                            <?php elseif($order["status"] == 4): ?>已接车
                                            <?php elseif($order["status"] == 5): ?>已完成
                                            <?php elseif($order["status"] == 6): ?>已付款
                                            <?php elseif($order["status"] == 7): ?>已评论<?php endif; ?> 
                                        </td>
                                        <td>
                                        <a href="/project/admin.php/Indent/detail/id/<?php echo ($order["id"]); ?>" class="btn"><i class="icol-arrow-refresh"></i></a>
                                        </td>
                                    </tr><?php endforeach; endif; ?>    
                                    <tr>
                                        <td colspan='8'><span style='float:right'><?php echo ($show); ?></span>        
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>

         <!-- Main Container End -->
        
   
    <!-- JavaScript Plugins -->
    <script src="/project/Public/Admin/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/project/Public/Admin/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/project/Public/Admin/js/libs/jquery.placeholder.min.js"></script>
    <script src="/project/Public/Admin/custom-plugins/fileinput.js"></script>

    <!-- jQuery-UI Dependent Scripts -->
    <script src="/project/Public/Admin/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/project/Public/Admin/jui/jquery-ui.custom.min.js"></script>
    <script src="/project/Public/Admin/jui/js/jquery.ui.touch-punch.js"></script>
    <script src="/project/Public/Admin/jui/js/timepicker/jquery-ui-timepicker.min.js"></script>

    <!-- Plugin Scripts -->
    <script src="/project/Public/Admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/project/Public/Admin/plugins/imgareaselect/jquery.imgareaselect.min.js"></script>
    <script src="/project/Public/Admin/plugins/jgrowl/jquery.jgrowl-min.js"></script>
    <script src="/project/Public/Admin/plugins/validate/jquery.validate-min.js"></script>
    <script src="/project/Public/Admin/plugins/colorpicker/colorpicker-min.js"></script>

    <!-- Core Script -->
    <script src="/project/Public/Admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/project/Public/Admin/js/core/mws.js"></script>
    
 

    <!-- Themer Script (Remove if not needed) -->
    <script src="/project/Public/Admin/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/project/Public/Admin/js/demo/demo.widget.js"></script>
    <script src="/project/Public/Admin/js/demo/demo.wizard.js"></script>

    <!-- Wizard Plugin -->
    <script src="/project/Public/Admin/custom-plugins/wizard/wizard.min.js"></script>
    <script src="/project/Public/Admin/custom-plugins/wizard/jquery.form.min.js"></script>


</body>
</html>