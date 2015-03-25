var countyName = "";
  $('#myModal').on('show.bs.modal', function (event) {
    $("#cityList *").show();
    $("#cityList ul").hide();
  })
  //点击省份触发事件
  $("#cityList button.provinceBtn").click(function(){
    $(this).next().slideToggle();
    $(this).parent().siblings().slideToggle();
    provinceName = $(this).html();
  })
  //点击城市触发事件
  $("#cityList button.cityBtn").click(function(){
    $(this).next().slideToggle();
    $(this).parent().siblings().slideToggle();
    cityName = $(this).html();
  })
  //点击县触发事件
  $("#cityList button.countyBtn").click(function(){
    countyName = $(this).html();
    $("#addressCity").val(function(){
      return provinceName + ' ' +cityName + ' ' +countyName;
    });
    $('#myModal').modal('hide');
  })