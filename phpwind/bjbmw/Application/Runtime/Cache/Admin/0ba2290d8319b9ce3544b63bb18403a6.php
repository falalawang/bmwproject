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
            <div class="container">   
                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><i class="icon-table">定单详情</i></span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table">
                            <thead>
                                <tr>
                                    <th width='300'>名称</th>
                                    <th>内容</th>
                                </tr>
                            </thead>
                            <tbody align='center'>
                                <tr>
                                    <td>订单号</td>
                                    <td><?php echo ($order["ordernumber"]); ?></td>
                                </tr>
                                <tr>
                                    <td>名字</td>
                                    <td><?php echo ($order["clientname"]); ?></td>
                                </tr>
                                <tr>
                                    <td>电话</td>
                                    <td><?php echo ($order["tel"]); ?></td>
                                </tr>
                                <tr>
                                    <td>预约日期</td>
                                    <td><?php echo ($order["hopedata"]); ?></td>
                                </tr>
                                <tr>
                                    <td>预约时间</td>
                                    <td><?php echo ($order["hopetime"]); ?></td>
                                </tr>
                                <tr>
                                    <td>地址</td>
                                    <td><?php echo ($order["address"]); ?></td>
                                </tr>
                                <tr>
                                    <td>车型</td>
                                    <td><?php echo ($order["carmodel"]); ?></td>
                                </tr>
                                <tr>
                                    <td>VIN码</td>
                                    <td><?php echo ($order["vin"]); ?></td>
                                </tr>
                                <tr>
                                    <td>保养项</td>
                                    <td>
                                        <?php if(is_array($res)): foreach($res as $key=>$res): echo ($res["service"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php endforeach; endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>服务车</td>
                                    <td><?php echo ($order["carname"]); ?></td>
                                </tr>
                                <tr>
                                    <td>价格</td>
                                    <td><?php echo ($order["oldprice"]); ?></td>
                                </tr>
                                <tr>
                                    <td>最终价格</td>
                                    <td><?php echo ($order["finalprice"]); ?></td>
                                </tr>
                                <tr>
                                    <td>状态</td>
                                    <td>
                                        <?php if($order["status"] == 0): ?>已取消
                                        <?php elseif($order["status"] == 1): ?>已提交
                                        <?php elseif($order["status"] == 2): ?><font style='red'>已确定</font>
                                        <?php elseif($order["status"] == 3): ?>已出发
                                        <?php elseif($order["status"] == 4): ?>已接车
                                        <?php elseif($order["status"] == 5): ?>已完成
                                        <?php elseif($order["status"] == 6): ?>已付款
                                        <?php elseif($order["status"] == 7): ?>已评论<?php endif; ?> 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="container" id='mod'>
                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span>选择修改类型</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="/project/admin.php/Indent/update" method='post'>
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">修改类型</label>
                                    <div class="mws-form-item">
                                        <select class="large" id='model'>
                                            <option>请选择</option>
                                            <option value='0'>订单其他信息</option>
                                            <option value='1'>客户车信息</option>       
                                        </select>
                                </div>
                            </div>
                         
                        </form>
                    </div>      
                </div>   
            </div>

            <div class="container" id='update' style='display:none'>
                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span>修改订单</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="/project/admin.php/Indent/update" method='post'>
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">最终价格</label>
                                    <div class="mws-form-item">
                                        <input type="text" name='finalprice' class="small" value='<?php echo ($order["finalprice"]); ?>'>
                                        <input type='hidden' name='id' value='<?php echo ($order["id"]); ?>'/>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">日期</label>
                                    <div class="mws-form-item">
                                        <input type="text" name='hopedata' class="small" value="<?php echo ($order["hopedata"]); ?>">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">时间</label>
                                    <div class="mws-form-item">
                                        <select class="large" name='hopetime'>
                                            <option>请选择</option>
                                            <option value='8:00-9:00'>8:00-9:00</option>
                                            <option value='9:00-10:00'>9:00-10:00</option>
                                            <option value='10:00-11:00'>10:00-11:00</option>
                                            <option value='11:00-12:00'>11:00-12:00</option>
                                            <option value='12:00-13:00'>12:00-13:00</option>
                                            <option value='13:00-14:00'>13:00-14:00</option>
                                            <option value='14:00-15:00'>14:00-15:00</option>
                                            <option value='15:00-16:00'>15:00-16:00</option>
                                            <option value='16:00-17:00'>16:00-17:00</option>
                                            <option value='17:00-18:00'>17:00-18:00</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">地点</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="large" name='address' value='<?php echo ($order["address"]); ?>'>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">选择4S店</label>
                                    <div class="mws-form-item">
                                        <select class="large" name='shopid' id='shop'>
                                            <option>请选择</option>
                                            <?php if(is_array($shop)): foreach($shop as $key=>$shop): ?><option value='<?php echo ($shop["id"]); ?>'><?php echo ($shop["shopname"]); ?></option><?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">分配服务车</label>
                                    <div class="mws-form-item">
                                        <select class="large" name='carid' id='car'>
                                            <option value='-1'>请选择</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">订单状态</label>
                                    <div class="mws-form-item">
                                        <select class="large" name='status'>
                                            <option value='-1'>请选择</option>
                                            <option value='0'>取消</option>
                                            <option value='2'>确定</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-button-row">
                                <input type="submit" value="修改" class="btn btn-danger">
                                <input type="reset" value="重置" class="btn ">
                            </div>
                        </form>
                    </div>      
                </div>   
            </div>
            <div class="container" id='carmodel' style='display:none'>
                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span>修改订单</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="/project/admin.php/Indent/updatecar" method='post'>
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">选择车品牌</label>
                                    <div class="mws-form-item">
                                        <input type="hidden" name='orderid' value='<?php echo ($order["id"]); ?>'>
                                        <select class="large" name='brandid' id='brand'>
                                            <option>请选择</option>
                                            <?php if(is_array($brand)): foreach($brand as $key=>$brand): ?><option value='<?php echo ($brand["id"]); ?>'><?php echo ($brand["brand"]); ?></option><?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">选择车系</label>
                                    <div class="mws-form-item">
                                        <select class="large" name='seriesid' id='series'>
                                            <option>请选择</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">选择车型</label>
                                    <div class="mws-form-item">
                                        <select class="large" name='id' id='mo'>
                                            <option>请选择</option>
                                        </select>
                                        <input type="hidden" name='arr' value="<?php echo ($order['services']); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="mws-button-row">
                                <input type="submit" value="修改" class="btn btn-danger">
                                <input type="reset" value="重置" class="btn ">
                            </div>
                        </form>
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


    <script type="text/javascript">
    var shop = document.getElementById('shop');
    var car = document.getElementById('car');
   
    shop.onchange = function(){
        $.ajax({"url":"/project/admin.php/Indent/change",
                "type":"post",
                "data":{'shopid':shop.value},
                "success":function(data){
                    car.innerHTML = data;
                    }
                });
    }
    // 
    
    $('#model').change(function(){
        if($('#model').val()==0){
            $('#update').css('display','block');
            $('#carmodel').css('display','none');
        }else if($('#model').val()==1){
            $('#update').css('display','none');
            $('#carmodel').css('display','block');
        }else{

        }
    })

    $('#brand').change(function(){
        $.ajax({"url":"/project/admin.php/Indent/series",
                "type":"post",
                "data":{'brandid':$('#brand').val()},
                "success":function(data){
                    $('#series').html(data);
                    }
                });
    })

    $('#series').change(function(){
        $.ajax({"url":"/project/admin.php/Indent/model",
                "type":"post",
                "data":{'seriesid':$('#series').val()},
                "success":function(data){
                    $('#mo').html(data);
                    }
                });
    })


    </script>

</body>
</html>