<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<style>
    .color{
        background:red;
    }

</style>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/bmw/Public/Admin/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/bmw/Public/Admin/wizard/wizard.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/bmw/Public/Admin/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/bmw/Public/Admin/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/bmw/Public/Admin/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/bmw/Public/Admin/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/bmw/Public/Admin/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/bmw/Public/Admin/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/bmw/Public/Admin/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/bmw/Public/Admin/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/bmw/Public/Admin/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/bmw/Public/Admin/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/bmw/Public/Admin/css/themer.css" media="screen">

<title>BMW Admin - Dashboard</title>

</head>

<body>

	<!-- Themer (Remove if not needed) -->  
	<div id="mws-themer">
        <div id="mws-themer-content">
        	<div id="mws-themer-ribbon"></div>
            <div id="mws-themer-toggle">
                <i class="icon-bended-arrow-left"></i> 
                <i class="icon-bended-arrow-right"></i>
            </div>
        	<div id="mws-theme-presets-container" class="mws-themer-section">
	        	<label for="mws-theme-presets">Color Presets</label>
            </div>
            <div class="mws-themer-separator"></div>
        	<div id="mws-theme-pattern-container" class="mws-themer-section">
	        	<label for="mws-theme-patterns">Background</label>
            </div>
            <div class="mws-themer-separator"></div>
            <div class="mws-themer-section">
                <ul>
                    <li class="clearfix"><span>Base Color</span> <div id="mws-base-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Highlight Color</span> <div id="mws-highlight-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Color</span> <div id="mws-text-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Glow Color</span> <div id="mws-textglow-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Glow Opacity</span> <div id="mws-textglow-op"></div></li>
                </ul>
            </div>
            <div class="mws-themer-separator"></div>
            <div class="mws-themer-section">
	            <button class="btn btn-danger small" id="mws-themer-getcss">Get CSS</button>
            </div>
        </div>
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
        	<div id="mws-logo-wrap">
            	<img src="/bmw/Public/Admin/images/mws-logo.png" alt="mws admin">
			</div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
        	<!-- Notifications -->
        	<div id="mws-user-notif" class="mws-dropdown-menu">
            	<a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-exclamation-sign"></i></a>
                
                <!-- Unread notification count -->
                <span class="mws-dropdown-notif">35</span>
                
                <!-- Notifications dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-notifications">
                        	<li class="read">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="read">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="#">View All Notifications</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Messages -->
            <div id="mws-user-message" class="mws-dropdown-menu">
            	<a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-envelope"></i></a>
                
                <!-- Unred messages count -->
                <span class="mws-dropdown-notif">35</span>
                
                <!-- Messages dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-messages">
                        	<li class="read">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="read">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="#">View All Messages</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src="/bmw/Public/Admin/example/profile.jpg" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello, John Doe
                    </div>
                    <ul>
                    	<li><a href="#">Profile</a></li>
                        <li><a href="#">修改密码</a></li>
                        <li><a href="/bmw/admin.php/login">退出</a></li>
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
        	<div id="mws-searchbox" class="mws-inset">
            	<form action="typography.html">
                	<input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
					<!-- <li class="active"><a href="dashboard.html"><i class="icon-home"></i> Dashboard</a></li> -->
                    <li><a href="/bmw/admin.php/user/home"><i class="icon-home"></i> 主页 </a>
                       
                    </li>
                    <?php if(session('gid') == 1): ?><li><a href="#" class="nav"><i class="icon-graph"></i> 用户管理</a>
						<ul class="list">
							<li><a href="/bmw/admin.php/User/userList">用户列表</a></li>
							<li><a href="/bmw/admin.php/User/userAdd">添加用户</a></li>
						</ul> 
					</li><?php endif; ?>
                    <li><a href="#" class="nav"><i class="icon-calendar"></i> 订单管理</a>
						<ul class="list">
						 <li><a href="/bmw/admin.php/Order/orderList">订单列表</a></li>
                         <li><a href="/bmw/admin.php/Order/orderRecyclebin">回收站</a></li>
						</ul>
					</li>
                    <?php if(session('gid') == 1): ?><li><a href="#" class="nav"><i class="icon-folder-closed"></i> 日志管理</a>
						<ul class="list">
							<li><a href="/bmw/admin.php/Log/logList">日志列表</a></li>
							
						</ul>
					</li>
                    
                    <li><a href="#" class="nav"><i class="icon-folder-closed"></i> 品牌管理</a>
                        <ul class="list">
                            <li><a href="/bmw/admin.php/Service/brandList">品牌列表</a></li>
                            <li><a href="/bmw/admin.php/Service/addSeries">添加系列</a></li>
                            <li><a href="/bmw/admin.php/Service/Models">添加型号</a></li>
                        </ul>
                    </li>
                    
                    
                    <li><a href="#" class="nav"><i class="icon-table"></i>服务管理</a>
						<ul class="list">
							<li><a href="/bmw/admin.php/Service/carList"> 品牌列表</a></li>
                            <li><a href="/bmw/admin.php/Service/keepProjectList">保养服务列表</a></li>
							<li><a href="/bmw/admin.php/Service/priceList">服务价格列表</a></li>
						</ul>
					</li><?php endif; ?>
                    <li><a href="#" class="nav"><i class="icon-list"></i> 排班查看</a>
                        <ul class="list">                    
                            <li><a href="/bmw/admin.php/Scheduling/SchedulingList"> 排班列表</a></li>
                            <li><a href="/bmw/admin.php/Scheduling/Completed">已完成列表</a></li>    
                        </ul>
                    </li>
                    <?php if(session('gid') == 1): ?><li><a href="#" class="nav"><i class="icon-cogs"></i> 系统管理</a>
                       <ul class="list">
                            <li><a href="/bmw/admin.php/Config/configRoutine"> 常规管理</a></li>
                            <li><a href="/bmw/admin.php/Config/configLinks">友情链接</a></li>
                            <li><a href="/bmw/admin.php/LinksList">友情列表</a></li>
							<li><a href="/bmw/admin.php/Config/configLogo">网站logo</a></li>
							<li><a href="/bmw/admin.php/Config/configStatus">网站开关</a></li>
                        </ul>						
					</li><?php endif; ?>
                    <li><a href="#" class="nav"><i class="icon-list"></i> 微信管理</a>
                        <ul class="list">                    
                            <li><a href="/bmw/admin.php/Wechat/wechat"> 文字自动回复</a></li>
                            <li><a href="/bmw/admin.php/Wechat/imagerely">图文自动回复</a></li>    
                            <li><a href="/bmw/admin.php/Wechat/subscribe">订阅回复</a></li>
                            <li><a href="/bmw/admin.php/Wechat/customer">客服回复</a></li>

                        </ul>
                    </li>
                    <!-- <li><a href="typography.html"><i class="icon-font"></i> Typography</a></li>
                    <li><a href="grids.html"><i class="icon-th"></i> Grids &amp; Panels</a></li>
                    <li><a href="gallery.html"><i class="icon-pictures"></i> Gallery</a></li>
                    <li><a href="error.html"><i class="icon-warning-sign"></i> Error Page</a></li> -->
<!--                     <li>
                        <a href="icons.html">
                            <i class="icon-pacman"></i> 
                            Icons <span class="mws-nav-tooltip">2000+</span>
                        </a>
                    </li> -->
                </ul>
            </div>         
        </div>    
		<div id='mws-container' class='clearfix'>
			<div class='container'>
				
	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>订单管理&nbsp;-->&nbsp;订单修改</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form action="/bmw/admin.php/Order/updatec" method='post' class="mws-form">
                    		<div class="mws-form-inline">
							<?php if(is_array($orders)): foreach($orders as $key=>$order): ?><div class="mws-form-row">
                    				<label class="mws-form-label">车牌号</label>
                    				<div class="mws-form-item">
                    					<input name='LPN' type="text" class="small" value="<?php echo ($order['LPN']); ?>">
                    				</div>
                    			</div>
								<div class="mws-form-row">
                    				<label class="mws-form-label">日历</label>
                    				<div class="mws-form-item">
                    					<select id='myyear'>
											<option><?php echo ($date['year']); ?></option>
                    					</select>
										<select id='mymonth'>
											<option><?php echo ($date['month']); ?></option>
                    					</select>
										<select id='myday'>
											<?php $__FOR_START_624958792__=$date['day'];$__FOR_END_624958792__=$date['endday'];for($i=$__FOR_START_624958792__;$i < $__FOR_END_624958792__;$i+=86400){ ?><option>
													<?php echo (date('d',$i)); ?>
												</option><?php } ?>
                    					</select>
										<select id='myti'>
											<option value='08:00-10:00'>08:00-10:00</option>
											<option value='10:00-12:00'>10:00-12:00</option>
											<option value='12:00-14:00'>12:00-14:00</option>
											<option value='14:00-16:00'>14:00-16:00</option>
											<option value='16:00-18:00'>16:00-18:00</option>
                     					</select>&nbsp;&nbsp;
										<span id='my' style='cursor:pointer;display:inline-block;background:none;border:none' onclick='change()' onmouseover='chan()'><i class="icon-ok"></i></span>
									</div>
                    			</div>
								<div class="mws-form-row">
                    				<label class="mws-form-label">保养日期</label>
                    				<div class="mws-form-item">
                    					<input name='date' type="text" class="medium" id='date' value='<?php echo ($order["date"]); ?>'>
                    					<input name='id' type="hidden" class="medium" value='<?php echo ($order["id"]); ?>'>
                    				</div>
                    			</div>
								<div class="mws-form-row">
                    				<label class="mws-form-label">保养时间</label>
                    				<div class="mws-form-item">
                    					<input name='keep_time' type="text" class="medium" id='keep_time' value='<?php echo ($order["keep_time"]); ?>'>
                    				</div>
                    			</div>
								<div class="mws-form-row">
                    				<label class="mws-form-label">服务车</label>
                    				<div class="mws-form-item">
										<select name='service_id'>
											<option value='1'>1</option>
											<option value='2'>2</option>
											<option value='3'>3</option>
											<option value='4'>4</option>
                     					</select>
									</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">总价</label>
                    				<div class="mws-form-item">
                    					<input name='price' type="text" class="medium" id='price' value='<?php echo ($order["price"]); ?>'>
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">订单状态</label>
                    				<div class="mws-form-item clearfix">
                    					<ul class="mws-form-list inline">
											<p>当前状态是：<?php echo ($order['status']); ?></p>
											<li><input type="radio" value='已评价' name='status' checked> <label>已评价</label></li>
                    						<li><input type="radio" value='已取消' name='status'> <label>已取消</label></li>
                    						<li><input type="radio" value='已付款' name='status'> <label>已付款</label></li>
                    						<li><input type="radio" value='已完成' name='status'> <label>已完成</label></li>
                    						<li><input type="radio" value='已出发' name='status'> <label>已出发</label></li>
                    						<li><input type="radio" value='已确认' name='status'> <label>已确认</label></li>
                    						<li><input type="radio" value='已提交' name='status'> <label>已提交</label></li>
										</ul>
                    				</div>
                    			</div><?php endforeach; endif; ?>
                    		</div>
                    		<div class="mws-button-row">
								
                    			<input type="submit" name='sub' class="btn btn-danger" value="修改">
                    			<input type="reset" class="btn " value="重置">
                    		</div>
                    	</form>
                    </div>    	
                </div>

			</div>
		</div>
    </div>
    <!-- JavaScript Plugins -->
    <script src="/bmw/Public/Admin/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/bmw/Public/Admin/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/bmw/Public/Admin/js/libs/jquery.placeholder.min.js"></script>
    <script src="/bmw/Public/Admin/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/bmw/Public/Admin/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/bmw/Public/Admin/jui/jquery-ui.custom.min.js"></script>
    <script src="/bmw/Public/Admin/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/bmw/Public/Admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <!--[if lt IE 9]>
    <script src="js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="/bmw/Public/Admin/plugins/flot/jquery.flot.min.js"></script>
    <script src="/bmw/Public/Admin/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="/bmw/Public/Admin/plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="/bmw/Public/Admin/plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="/bmw/Public/Admin/plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="/bmw/Public/Admin/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/bmw/Public/Admin/plugins/validate/jquery.validate-min.js"></script>
    <script src="/bmw/Public/Admin/custom-plugins/wizard/wizard.min.js"></script>

    <!-- Core Script -->
    <script src="/bmw/Public/Admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/bmw/Public/Admin/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/bmw/Public/Admin/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/bmw/Public/Admin/js/demo/demo.dashboard.js"></script>
    <script src="js/demo/demo.table.js"></script>
    <script src='/bmw/Public/admin/js/jquery.js'></script>
	
	<script>
	var myyear = document.getElementById('myyear');
	var mymonth = document.getElementById('mymonth');
	var myday = document.getElementById('myday');
	var keep_time = document.getElementById('keep_time');
	var myti = document.getElementById('myti');
	var my = document.getElementById('my');
	var date = document.getElementById('date');
	function change(){
		date.value= myyear.value+'-'+mymonth.value+'-'+myday.value;
		keep_time.value =myti.value;
	}
	</script>

    
</body>
    
    
 <script language="javascript" type="text/javascript">
 //$("#next").click( function () {$(this).addClass("color") });
    var curr_url = window.location.href;  //获取当前URL
   // alert(curr_url);
        $('#mws-navigation a').each(function(i,n){  //循环导航的a标签
        var href = $(this).attr('href'); //a标签中的href链接
       // alert(href);
        if(href == curr_url){  //如果当前URL,和a标签中的href相等。
            //alert(111111111111111111111111);
        $(this).closest('ul').css({display:"block"});  //那么就给这个a标签增加home_page类。
        $(this).closest("li").css("background","#252529");
        }
    });

  /*  $(document).ready(function(){  
    $("#mws-navigation a").each(function(){  
        $this = $(this);  
        if($this[0].href==String(window.location)){  
            $this.addClass("hover");  
        }  
    });  
});  
*/

    </script>

</html>