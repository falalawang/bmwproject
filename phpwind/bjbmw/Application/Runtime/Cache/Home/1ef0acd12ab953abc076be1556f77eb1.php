<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>预定成功-<?php echo ($config["webname"]); ?></title>
    <meta name="description" content="<?php echo ($config["description"]); ?>">
    <meta name="keywords" content="<?php echo ($config["keywords"]); ?>">
    <link rel="stylesheet" href="/project/Public/home/css/complete.css">
</head>
<body>
  <div class="container success-page">
        <div class="content success-con">
        <h3 class="title">恭喜您，您的订单提交成功！</h3>
        <p class="next">您可以到个人中心中查看订单详情与进度</p>
        <ul class="bac">
          <li>
          <a href="/project/index.php/Index/index">返回首页</a>
          </li>
          <li>
          <a href="/project/index.php/personage/index">个人中心</a>
          </li>
        </ul>
        </div>
    </div>
</body>
</html>