<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>个人信息-<?php echo ($config["webname"]); ?></title>
    <meta name="description" content="<?php echo ($config["description"]); ?>">
    <meta name="keywords" content="<?php echo ($config["keywords"]); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="seawolfyx">
    <link href="/project/Public/Home/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/project/Public/Home/bootstrap/css/bootstrap-theme.css" rel="stylesheet"> 
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
        <h1>个人信息</h1>
		</div>
		<div class="row">
        <div class="col-md-9">
			<table class="table table-striped table-hover">
            <thead>
				<tr>
					<th>类别</th>
					<th>信息</th>
					<th>操作</th>
                <!--<th>Username</th>-->
				</tr>
            </thead>
            <tbody>
			<?php if(is_array($person)): $i = 0; $__LIST__ = $person;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$person): $mod = ($i % 2 );++$i;?><tr><td>技师姓名:</td><td><?php echo ($person["userid"]); ?></td><td></td></tr>
                <!--<tr><td>服务车id:</td><td><?php echo ($carid); ?></td></tr>-->
                <tr><td>技师昵称:</td><td><?php echo ($person["username"]); ?></td> <td><a href="/project/index.php/Tech/updateusername">更改昵称</a></td></tr>
                <!--<tr><td>技师密码</td><td><?php echo ($person["password"]); ?></td> <td><a href="/project/index.php/Tech/updatepassword">更改密码</a></td></tr>
                <!--<tr><td>服务车归属:</td><td><?php echo ($person["shopname"]); ?></td></tr>
                <tr><td>服务车城市:</td><td><?php echo ($person["shopcity"]); ?></td></tr>-->
                <!--<td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>--><?php endforeach; endif; else: echo "" ;endif; ?>
              </tr>
            </tbody>
          </table>
        </div>
    </div> <!-- /container -->
	<script src="/project/Public/Home/bs/1.11.2.jquery.min.js"></script>
    <script src="/project/Public/Home/bs/bootstrap.js"></script>
  </body>
</html>