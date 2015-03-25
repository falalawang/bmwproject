<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>订单信息-<?php echo ($config["webname"]); ?></title>
    <meta name="description" content="<?php echo ($config["description"]); ?>">
    <meta name="keywords" content="<?php echo ($config["keywords"]); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="seawolfyx">
    <link href="/project/Public/Home/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/project/Public/Home/bootstrap/css/bootstrap-theme.css" rel="stylesheet"> 
	<style type="text/css">
		body{
			background-color:E8E8FF;
			color:black;
		}
	</style>
  </head>

<body role="document">
<nav class="navbar navbar-inverse ">
    <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/project/index.php/Tech/logout">退出</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/project/index.php/Tech/serviceperson">个人信息</a></li>
            <li><a href="/project/index.php/Tech/servicecar">我的服务车</a></li>
            <li><a href="/project/index.php/Tech/serviceorder">我的订单</a></li>
            <!--<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"></a>
              <ul class="dropdown-menu" role="menu">
              </ul>
            </li>-->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<div class="container theme-showcase" role="main">
		<div class="page-header"> </div>
		<div class="page-header">
		
		<div class="row">
        <div class="col-md-4"><h1>订单列表</h1>  		</div> 
		<div class="col-md-5">
		<form action="/project/index.php/Tech/serviceorder" method="get">
			<div class="right block" style="margin-top:25px">
				
					<input type="text" placeholder="请输入查询条件"  name='value' id='value'>&nbsp;&nbsp;
					<select id='condition' name='condition' style="height:26px;">
						<option value="o.ordernumber">订单号</option>
						<option value="u.clientname">客户姓名</option>
						<option value="u.tel">客户电话</option>
						<!--<option value="o.address">客户地址</option>-->
						<option value="o.hopedata">客户期望日期</option>
					</select>&nbsp;
						<input type="submit" class="btn btn-sm" value="查询">
				
			</div>
		</form>
		</div>
		</div>
		</div>
      <div class="row">
        <div class="col-md-8">
		<div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
            
				<th>订单号</th><th>客户电话</th><th>客户姓名</th><th>客户车型</th><th>服务时间</th><th>服务地址</th><th>订单状态</th><th>订单详情</th><th>修改状态</th>
			<!--    <th>订单号</th><th>客户电话</th><th>服务城市</th><th>VIN码</th><th>订单状态</th><th>服务车</th><th>最终价格</th><th>期望日期</th><th>期望时间</th><th>客户留言</th><th>客户车类型</th><th>服务地址</th><th>服务类型</th>
                <!--<th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>-->
              </tr>
            </thead>
            <tbody>
			<?php if(is_array($order)): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$order): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($order["ordernumber"]); ?></td><td><?php echo ($order["tel"]); ?></td><td><?php echo ($order["clientname"]); ?></td><td><?php echo ($order["carmodel"]); ?></td><td><?php echo ($order["hopedata"]); ?><br/><?php echo ($order["hopetime"]); ?></td><td><?php echo ($order["city"]); ?><br/><?php echo ($order["address"]); ?></td><td><font style='color:red'>
					<?php if($order["status"] == 0): ?>已取消
					<?php elseif($order["status"] == 1): ?>已提交
					<?php elseif($order["status"] == 2): ?>已确定
					<?php elseif($order["status"] == 3): ?>已出发
					<?php elseif($order["status"] == 4): ?>已接车
					<?php elseif($order["status"] == 5): ?>已完成
					<?php elseif($order["status"] == 6): ?>已付款
					<?php elseif($order["status"] == 7): ?>已评论<?php endif; ?> 
					</font></td><td>
					<a href="/project/index.php/Tech/detail/id/<?php echo ($order["ordernumber"]); ?>" class="btn">详情</a>
					</td><td> <a href="/project/index.php/Tech/modify/id/<?php echo ($order["ordernumber"]); ?>"> 修改状态</a>
					</td>
					<!--<td><?php echo ($order["finalprice"]); ?></td><td><?php echo ($order["hopedata"]); ?></td><td><?php echo ($order["time"]); ?></td><td><?php echo ($order["message"]); ?></td><td><?php echo ($order["carmodel"]); ?></td><td><?php echo ($order["address"]); ?></td><td><?php echo ($order["services"]); ?></td>-->
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
          </table>
		  <table><?php echo ($page); ?></table>
		</div>
        </div>
    </div> <!-- /container -->
    <script src="/project/Public/Home/bs/1.11.2.jquery.min.js"></script>
    <script src="/project/Public/Home/bs/bootstrap.js"></script>
  </body>
</html>