	$(document).ready(function(){
		$(".page").css("display","none");
		$(".page:first").css("display","block");
	})
	//调用分布引导
	$(function(){
		$("#wizard").scrollable({
			onSeek: function(event,i){
				$("#status li").removeClass("active").eq(i).addClass("active");
				$(".page").css("display","none").eq(i).css("display","block");
			},
		});
	$("#sub").click(function(){
		var data = $("form").serialize();
		alert(data);
	});
});

// 用于选择车型的三级联动	
$(document).ready(function(){
		$.ajax({
			"url":"__CONTROLLER__/brand",
			"type":"post",
			"success":function(data){ 
				$("#brand").html(data);
			},
		})
		
		$.ajax({
			"url":"__CONTROLLER__/city_name",
			"type":"post",
			"success":function(data){
				$("#city_name").html(data);
			}
		})
});
	
$("#brand").change(function(){
		var brandname=$("#brand").val();
		//alert(brandname);
		$.ajax({
			"url":"__CONTROLLER__/series",
			"type":"post",
			"data":{'brandname':brandname},
			"success":function(data){
				$("#series").html(data);
			},
		})
});
$("#series").change(function(){
		var brandname=$("#brand").val();
		var seriesname=$("#series").val();
		$.ajax({
			"url":"__CONTROLLER__/model",
			"type":"post",
			"data":{'brandname':brandname,'seriesname':seriesname},
			"success":function(data){
				$("#model").html(data);
			},
		})
})
