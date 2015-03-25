  $('#myModal').on('show.bs.modal', function (event) {
    $("#carList *").show();
    $("#carList ul").hide();
  })

$("#carList ul").hide();
//点击品牌触发事件
$("#carList .brandBtn").click(function(){
$(this).next().slideToggle();
$(this).parent().siblings().slideToggle();
brandName = $(this).html();
})
//点击系列触发事件
$("#carList .seriesBtn").click(function(){
$(this).next().slideToggle();
$(this).parent().siblings().slideToggle();
seriesName = $(this).html();
})
//点击型号触发事件
$("#carList .typeBtn").click(function(){
    var typeName = $(this).html();
    typeVal = $(this).val();

    $.get("insertCar", { typeId: typeVal},
    function(data){
        $("#carClone .carCopy").clone().hide().appendTo("#carList");
        var url = $('#carClone .addCarId').attr("href") + data;
        if(data){
          $('#carList .carCopy .addCarId').attr("href",url);
        }
        $("#carList .carCopy .carBrand").html(function(){
          return $(this).html() + brandName;
        });
        $("#carList .carCopy .carSeries").html(function(){
          return $(this).html() + seriesName;
        });
        $("#carList .carCopy .carType").html(function(){
          return $(this).html() + typeName;
        });
        $('#carList .carCopy:first').show().removeClass("carCopy").addClass("carResult").nextAll().remove();
        // alert(url);
    });
    $('#myModal').modal('hide');
});
//Ajax 无刷新删除车辆
$("#carList").on("click",".addCarId",function(){
    var url = $(this).attr("href");
    obj = $(this);
    $.get(url, {},
    function(data){
        if(data){
            $(obj).parents(".carResult").remove();;
        }
    });
});