	$(".series").hide();//隐藏车系
	$(".type").hide();	//隐藏车型
	$(".brand").click(function(e){	//单击品牌触发事件
		$(".brand").hide();			//同级品牌隐藏
		$(this).show();				//本品牌显示
		$(this).children().show();	//本品牌下车系显示
		$(".type").hide();			//本品牌下每个车系的对应车型隐藏
		$(".msg").html("请选择您的汽车系列");//更改提示信息
		e.stopPropagation();		//取消冒泡
	});
	$(".series").click(function(e){	//单击车系触发事件	
		$(".series").hide();		//同级车系隐藏
		$(this).show();				//本车系显示
		$(this).children().show();	//本车系下车型显示
		$(".msg").html("请选择您的汽车型号");//更改提示信息
		e.stopPropagation();		//取消冒泡
	});
	$(".type").click(function(){	//单击车型触发事件
		//将品牌,车系,车型信息通过发送ajax请求存进session,方便后面使用,请求之后跳到预定页面
		var data={brand:brand,series:series,type:type};
		$.get("addCarType",data,function(d){
			if(!d){
				location.href="../Order/inputInfo";
			}else{
				alert(d);
			}									
		});
	});

	function getBrand(obj){			//得到用户所选品牌
		brand=obj.innerHTML;
	}
	function getSeries(obj){		//得到用户所选车系
		series=obj.innerHTML;
	}
	function getType(obj){			//得到用户所选车型
		type=obj.innerHTML;
	}

	function stopBubble(e){			//取消冒泡
		if(e && e.stopPropagation){
			e.stopPropagation();
		}else{
			window.event.cancelBubble=true;
		}
		return false;
	}