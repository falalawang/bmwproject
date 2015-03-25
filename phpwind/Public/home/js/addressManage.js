	$(".msg:eq(1)").hide();//隐藏填写区县的输入框和提交按钮
	$(".msg:eq(2)").hide();
	$(".msg:eq(3)").hide();
	$(".city").hide();		//隐藏城市
	$(".county").hide();	//隐藏区县
	$(".province").click(function(e){	//点击省触发的事件
		$(".province").hide();			//同级省隐藏
		$(this).show();					//本省显示
		$(this).children().show();		//本省的子级市显示
		$(".county").hide();			//市的子级区隐藏
		$(".msg:eq(0)").html("请选择您所在的城市");
		e.stopPropagation();
	});
	$(".city").click(function(e){		//点击市触发的事件
		$(".city").hide();				//同级市隐藏
		$(this).show();					//本市显示
		$(this).children().show();		//本市的子级区显示
		$(".msg:eq(0)").html("请选择您所在的区域");
		e.stopPropagation();
		
	});
	$(".county").click(function(e){		//点击区触发的事件
		$(".county").hide();			//同级区隐藏
		$(this).show();
		e.stopPropagation();
		$(".msg:eq(1)").show();			//填写区县的输入框和提交按钮显示
		$(".msg:eq(2)").show();
		$(".msg:eq(3)").show();
	});

	function getProvince(obj){			//得到用户点击的省
		province=obj.innerHTML;
	}
	function getCity(obj){				//得到用户点击的市
		city=obj.innerHTML;
	}
	function getCounty(obj){			//得到用户点击的区
		county=obj.innerHTML;
	}

	function send(){
		var street=$("#street").val();	//得到用户输入的街道信息		
		if(street){
			var data={province:province,city:city,county:county,street:street};//将省,市,区,街道信息发送ajax请求,存进session里
			$.get("addAddress",data,function(d){
				if(!d){
					location.href="../Order/inputInfo";
				}else{
					alert(d);
				}				
			});
		}
	}

	function stopBubble(e){				//取消冒泡
		if(e && e.stopPropagation){
			e.stopPropagation();
		}else{
			window.event.cancelBubble=true;
		}
		return false;
	}
