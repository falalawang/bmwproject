<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>个人中心-<?php echo ($config["webname"]); ?></title>
    <meta name="description" content="<?php echo ($config["description"]); ?>">
    <meta name="keywords" content="<?php echo ($config["keywords"]); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
    <link rel="stylesheet" type="text/css" href="/project/Public/Home/bootstrap/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/project/Public/Home/bootstrap/css/button.css">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/project/Public/Home/css/personage.css">
    <link rel="stylesheet" href="/project/Public/Home/evaluate/evaluate.css">
    <script src="/project/Public/Home/js/jquery.min.js"></script>

    <script src="/project/Public/Home/js/jquery-1.8.3.min.js"></script> 
    <script src="/project/Public/Home/evaluate/evaluate.js"></script> 
    <style type="text/css">

    </style>
</head>
<body >
<div class="tab layer_pageContent" style="display: block;">
   <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container" style="width:100%">
    <ul id="one" class="nav nav-pills tabtit text-center" style="line-height:50px">
    <li role="presentation" class="tabnow gray white">进行中</li>
    <li role="presentation"  class="gray">已完成</li>
    <li role="presentation" class="gray">已取消</li>

    </ul>
  </div>
</nav>
</div>

    <div class="tab_main" >
                <div class="finish" style="width:99%"> 
            <?php if(empty($march)): ?><div id="left" class="text-center panel panel-primary" style="width:99%">
                    <div style="width:100%">暂无消息</div>
                </div>
            <?php else: ?>
            <?php if(is_array($march)): foreach($march as $key=>$march): ?><div id="left" class="panel panel-primary">
                    <div>
                    <div >车辆信息:</div>
                    <div><?php echo ($march['carmodel']); ?></div>
                    </div>
                    <div >
                    <div >服务项:</div>
                    <div><?php echo ($march['services']); ?></div>
                    </div>
                    <div >
                    <div>状态:</div>
                    <div class='par'><?php echo ($march['status']); ?></div>
                    </div>
                    <div ><button type="button" class="btn oid btn-primary btn-xs" data-toggle="modal" data-target="#myModal" value="<?php echo ($march['id']); ?>">详情</button>
                    </div>
                    
                </div><?php endforeach; endif; endif; ?>     
        </div>
        <div class="finish " style="width:100%"> 
            <?php if(empty($finish)): ?><div id="left" class="text-center panel panel-primary" style="width:99%">
                    <div style="width:100%">暂无消息</div>
                </div>
            <?php else: ?>
                <?php if(is_array($finish)): foreach($finish as $key=>$finish): ?><div id="left" class="panel panel-primary">
                    <div>
                    <div >车辆信息:</div>
                    <div><?php echo ($finish['carmodel']); ?></div>
                    </div>
                    <div >
                    <div >服务项:</div>
                    <div><?php echo ($finish['services']); ?></div>
                    </div>
                    <div >
                    <div >价格:</div>
                    <div class="pcolor"><?php echo ($finish['finalprice']); ?>元</div>
                    </div>
                    <div >
                    <div>状态:</div>
                    <div class='par'><?php echo ($finish['status']); ?></div>
                    </div>
                    <div ><button type="button" class="btn oid btn-primary btn-xs" data-toggle="modal" data-target="#myModal" value="<?php echo ($finish['id']); ?>">详情</button>
                    </div>
                </div><?php endforeach; endif; endif; ?>         
        </div>
        <div class="finish" style="width:99%"> 
            <?php if(empty($abolish)): ?><div id="left" class="text-center panel panel-primary" style="width:99%">
                    <div style="width:100%">暂无消息</div>
                </div>
            <?php else: ?>
            <?php if(is_array($abolish)): foreach($abolish as $key=>$abolish): ?><div id="left" class="panel panel-primary">
                    <div>
                    <div >车辆信息:</div>
                    <div><?php echo ($abolish['carmodel']); ?></div>
                    </div>
                    <div >
                    <div >服务项:</div>
                    <div><?php echo ($abolish['services']); ?></div>
                    </div>
                    <div >
                    <div >价格:</div>
                    <div class="pcolor"><?php echo ($abolish['finalprice']); ?>元</div>
                    </div>
                    <div >
                    <div>状态:</div>
                    <div><?php echo ($abolish['status']); ?></div>
                    </div>
                    <div ><button type="button" class="btn oid btn-primary btn-xs" data-toggle="modal" data-target="#myModal" value="<?php echo ($abolish['id']); ?>">详情</button>
                    </div>
                </div><?php endforeach; endif; endif; ?>        
        </div>

        
    </div>
    



<!-- Modal -->
<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header bs-example-modal-sm">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">车辆信息</h4>
      </div>
      <div  class="car modal-body" >
        
      </div>
      <div   class="modal-footer">
      
        <button type="button" class="btn btn-primary" data-dismiss="modal">退出</button>
      </div>
    </div>
  </div>
</div>
<div id="personage" style="padding:10%;width:100% ;height:100%; display:none;">
<form   role="form" style="width:100%">
   <div class="form-group" style="margin-bottom:30px">
      <div style="padding:10px;width:100%"><div class="z"></div></div>
   </div>
    <div class="form-group">     
         <button type="button"  style="width:100%" data-dismiss="modal" aria-hidden="true" class="btn sub btn-info btn-sm" >确认</button>
   </div>
</form>
</div>
<nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container" style="width:100%">
    <ul id="one" class="nav nav-pills  text-center" style="line-height:50px">
    <li role="presentation" class=" gray logout">退出</li>
    <li role="presentation" class=" gray home">返回首页</li>
    <li role="presentation" class="gray go  white">立即预约</li>
    </ul>
  </div>
</nav>
<script src="/project/Public/Home/js/layer/layer.min.js"></script>
<script src="/project/Public/Home/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
//切换事件
var btn = $('.tabtit').children(),
 main = $('.tab_main').children(); 
 main.eq(0).show().siblings().hide();
btn.on('click', function(){
    var othis = $(this), index = othis.index();
    othis.addClass('tabnow white').siblings().removeClass('tabnow white');
    main.eq(index).show().siblings().hide();
});    

$("button[class*='oid']").click(function() {
    $.ajax({
        url: "/project/index.php/Personage/oid",
        type:"GET",
        data:{'id':$(this).val()},
        success: function(data){ 
        $(".car").html(data);        
       }      
 });

});
$().ready(function(){
            $(".z").studyplay_star({MaxStar:5,CurrentStar:1,Enabled:true},function(data){
                if (data=="undefined") {
                    window.num = 1;
                }else{
                    window.num=data;
                }
             });    
        });

function codes(obj){
     window.eid=obj.value;
window.pagei = $.layer({
    type: 1,   
    title: false,
    shift: 'top',
    shade: [0.3, '#000'],
    border: [0],
    closeBtn: [0],
    shadeClose: true,
    area: ["180px", 'auto'],
    page: {
        dom: "#personage",
    },


})



;}
$(".z").click(function() {
    layer.close(window.hints);
     switch (window.num) {
            case (1):
                window.hint="1星:差";
                break;
            case (2):
                window.hint="2星:一般";
                break;
            case (3):
                window.hint="3星:较好";
                break;
            case (4):
                window.hint="4星:满意";
                break;
            case (5):
                window.hint="5星:非常满意";
                break;
            default:
                window.hint="5星:非常满意";
                break;              
        };
   window.hints= layer.tips(window.hint, $("#personage"), {
        style: ['background-color:#0FA6D8; color:#fff', '#0FA6D8'],
         maxWidth:175,
         time:1,   
    });
   

});
$(".sub").click(function(){
      $.get('/project/index.php/Personage/upda',{'eid':window.eid,"ev":window.num}, function(data) {
        if(data!=0){
        $('#myModal').modal('hide');
        layer.closeAll();

        $("button[value="+data+"]").parent('.par').html('已付款,已评价');

        $.layer({btns:0,closeBtn:false,title:false,time:1,border:[0],dialog:{type:9,msg:"评价成功"}})
        }else{

        $.layer({btns:0,closeBtn:false,title:false,time:1,border:[0],dialog:{type:8,msg:"评价失败"}})


        }
      });     
})
function orde(obj) {
        $.ajax({
        url: "/project/index.php/Personage/orde",
        type:"GET",
        data:{'id':obj.value},
        success: function(data){ 
        if (data!=0) {
        $('#myModal').modal('hide');
        $("button[value="+data+"]").parent('.par').html('订单已取消');
        $.layer({btns:0,closeBtn:false,title:false,time:1,border:[0],dialog:{type:9,msg:"成功取消"}})
         }else{

        $.layer({btns:0,closeBtn:false,title:false,time:1,border:[0],dialog:{type:8,msg:"取消失败"}})


         }
       } 

 }); 
};

$(".go").click(function() {
    location.href="<?php echo U('Index/order');?>";
});
$(".home").click(function() {
    location.href="<?php echo U('Index/index');?>";
});

$(".logout").click(function() {
   
    $.get("/project/index.php/Personage/out", {name:1},function(data){
    if(data){
    $.layer({btns:0,closeBtn:false,title:false,time:1,border:[0],dialog:{type:9,msg:"成功退出"}})
        location.href = "<?php echo U('Index/index');?>";

    }else{
        $.layer({btns:0,closeBtn:false,title:false,time:1,border:[0],dialog:{type:8,msg:"退出失败"}})

    }
   });
  
});

</script>
</body>

</html>