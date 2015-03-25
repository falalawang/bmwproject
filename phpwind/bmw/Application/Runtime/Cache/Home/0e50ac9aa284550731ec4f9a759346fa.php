<?php if (!defined('THINK_PATH')) exit();?><html>
  <head>
    <title>排班查看</title>
    <meta charset=utf-8>
    <link rel="stylesheet" href="/bmw/Public/bootstrap/css/bootstrap.min.css">
    <script src="/bmw/Public/home/js/jquery.js"></script>
  </head>

  <body>
  <!-- Button trigger modal -->
 
    <div class='contentb'>
    	<div class="xmap">
			您当前所在位置：首页&nbsp;->&nbsp;个人信息 &nbsp;&nbsp;&nbsp;<a href="/bmw/index.php/Work/clear">退出</a>
		</div>
     <?php if(is_array($order)): foreach($order as $key=>$orders): ?><div style='border:1px solid #ccc;border-radius:5px;padding:5px;background:#fff'>
	  <table class='ta'>
		<tr>
			<td>技师姓名：</td>
			<td><span style='color:#28abcc'><?php echo ($orders["name"]); ?><span></td>
		</tr>
		<tr>
			<td>订单状态：</td>
			<td><span style='color:#28abcc'><?php echo ($orders["status"]); ?><span></td>
		<tr>
			<td>预约时间：</td>
			<td><span style='color:#28abcc'><?php echo ($orders["date"]); ?>&nbsp;&nbsp;<?php echo ($orders["keep_time"]); ?><span></td>
		</tr>
		
		<tr>
			<td>客户手机：</td>
			<td><span style='color:#28abcc'><?php echo ($orders["phone"]); ?><span></td>
		</tr>
		<tr>
			<td colspan='2'><button type="button" class='btu' data-toggle="modal" data-target="#myModal<?php echo ($orders["id"]); ?>">订单详情</button></td>
		</tr>
	  </table>
    </div>

<div class="modal fade" id="myModal<?php echo ($orders["id"]); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">订单详情</h4>
      </div>
      <div class="modal-body" >
        <div>车型：<?php echo ($orders["brand"]); ?>&nbsp;&nbsp;<?php echo ($orders["series"]); ?>&nbsp;&nbsp<?php echo ($orders["models"]); ?></div>
        <div>保养项目：<?php echo ($orders["combo"]); ?></div>
        <div>客户电话：<?php echo ($orders["phone"]); ?></div>
        <div>保养地址：<?php echo ($orders["city"]); ?>-<?php echo ($orders["county"]); ?>-<?php echo ($orders["address"]); ?></div>
        <div>预约时间：<?php echo ($orders["date"]); ?>&nbsp;&nbsp;<?php echo ($orders["keep_time"]); ?></div>
        <div>保养总价：<?php echo ($orders["price"]); ?>元</div>
        <div>保养车牌号：<?php echo ($orders["LPN"]); ?></div>
        <form action="/bmw/index.php/Work/update" method="post">
        <div>订单状态：
        <select name="status">
              <option value="已提交">已提交</option>
              <option value="已确认">已确认</option>
              <option value="已完成">已完成</option>
        </select>
        </div>
      </div>
      <input type='hidden' name='id' value='<?php echo ($orders["id"]); ?>'>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <input type="submit" class="btn btn-primary" value='确定修改'>     
      </div>
      </form>
    </div>
</div> 
</div>
</hr><?php endforeach; endif; ?>
</div>  
  </body>
    <script src="/bmw/Public/bootstrap/js/bootstrap.min.js"></script>
</html>