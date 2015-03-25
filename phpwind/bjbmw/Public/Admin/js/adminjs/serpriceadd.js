$(document).ready(function() {	
		$("select:first").change(function(){
			var sval = $("select:first").val();
			
			$.ajax({
				"url":con+"/serieslist",
				"type":"get",
				"data":{"brand":sval},
				"success":function(data){
					$("select:eq(1)").html(data)
				}

			})
		});
        $("select:eq(1)").change(function(){
            var mval = $("select:eq(1)").val();
            
            $.ajax({
                "url":con+"/modellist",
                "type":"get",
                "data":{"series":mval},
                "success":function(data){
                    $("select:eq(2)").html(data)
                }

            })
        });
	});