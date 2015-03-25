function grade(){
    var grade = $(".grade").attr('grade');
    $(".grade").children("span.glyphicon").removeClass("text-danger");
    for(var n = 0 ;n <= grade ; n++){
        $(".grade").children("span.glyphicon").eq(n).addClass("text-danger");
    }
}
grade();
$("#loginSub").click(function(){
  var telephone = $("#telephone").val();
  var telNum = telephone.length;
  var password = $("#password").val();
  if(telephone == "" || telNum !=11){
    $("#user_tel").addClass("has-error");
    $("#user_tel").children(".glyphicon").addClass("glyphicon-remove");
    alert("请输入正确手机号");
    return false;
  }else{
    $("#user_tel").removeClass("has-error");
    $("#user_tel").children(".glyphicon").removeClass("glyphicon-remove");
  }
  if(password == ""){
    $("#user_pwd").addClass("has-error");
    $("#user_pwd").children(".glyphicon").addClass("glyphicon-remove");
    alert("请输入正确密码");
    return false;
  }else{
    $("#user_pwd").removeClass("has-error");
    $("#user_pwd").children(".glyphicon").removeClass("glyphicon-remove");

    $.post(JS_APP+"/Login/doLogin", { "telephone": telephone,"password" : password},
    function(data){
      if (data == 1) {
        location.href = JS_APP+'/Index/index';
      }else{
        $("#user_pwd").addClass("has-error");
        $("#user_pwd").children(".glyphicon").addClass("glyphicon-remove");
        alert("请输入正确密码");
        return false;
      }
    })
  }
})