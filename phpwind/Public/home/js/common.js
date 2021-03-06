function grade(){
    var grade = $(".grade").attr('grade');
    $(".grade").children("span.glyphicon").removeClass("text-danger");
    for(var n = 0 ;n <= grade ; n++){
        $(".grade").children("span.glyphicon").eq(n).addClass("text-danger");
    }
}
grade();

$("#evaluate").children("span.glyphicon").click(function(){
    var num = $(this).attr("num");
    $(".grade").attr("grade",num);
    $(".grade").children("input#gradeNum").val(num);
    grade();
})

$("#evaluateBtn").click(function(){
    var num = $("input#gradeNum").val();
    var con = $("#evaluateCon").val();
    if(num < 0){
        alert("还没点击星星评分!");
        return false;
    }
    if(con == ""){
        alert("还没输入您的评价!");
        return false;
    }

})

$("#addressBtn").click(function(){
    var phone = $("#addressPhone").val();
    var city = $("#addressCity").val();
    var street = $("#addressStreet").val();
    var len = phone.length;
    if(len != 11 || phone < 10000000000){
        alert("请输入正确的手机号！")
        return false;
    }else{
        if(city == ""){
            alert("请选择正确的地址！")
            return false;
        }else{
            if(street == ""){
                alert("请输入街道地址！")
                return false;
            }
        }
    }
})
$("#addressDel").click(function(){
    return confirm('您确定要删除吗？');
})

var isLogin = $("#isLogin").val();
if(isLogin != null && isLogin != ''){
    loginHref = isLogin;
    $('#myLogin').modal();
}
$(".loginBtn").click(function(){
    loginHref = this.href;
    $('#myLogin').modal();
    return false;
})

$("#loginTel").bind('input propertychange',function(){
  var loginTel = $("#loginTel").val();
  var telNum = loginTel.length;
  if(loginTel > 11111111111 && telNum == 11){
    $("#loginNoteBtn").addClass('btn-primary').attr('disabled',false);
  }else{
    $("#loginNoteBtn").removeClass('btn-primary').attr('disabled',true);
  }
})
$("#loginNoteBtn").click(function(){
    sendMessage();
})

function sendMessage(){
    $("#loginNoteBtn").attr("disabled",true);
    $("#loginNoteBtn").html(120);
    time = setInterval("dec()",1000);
    var tel=$("#loginTel").val();
    var data={telephone:tel};
    $.get(JS_APP+"/Login/sendMessage",data);
}
function dec(){
    if($("#loginNoteBtn").html() <= 0){
        $("#loginNoteBtn").html("获取短信");
        $("#loginNoteBtn").removeAttr("disabled");
        clearInterval(time);
    }else{
        $time=$("#loginNoteBtn").html()-1;
        $("#loginNoteBtn").html($time);
    }
}
$("#loginBtn").click(function(){
  var loginTel = $("#loginTel").val();
  var telNum = loginTel.length;
  if(loginTel == "" || telNum !=11){
    $("#user_tel").addClass("has-error");
    alert("请输入正确手机号");
    $("#loginTel").focus();
    return false;
  }else{
    $("#user_tel").removeClass("has-error");
    $("#loginNoteBtn").addClass('btn-primary').attr('disabled',false);
  }

  var loginNote = $("#loginNote").val();
  if(loginNote == ""){
    $("#user_note").addClass("has-error");
    alert("请输入正确验证码");
    $("#loginNote").focus();
    return false;
  }else{
    $("#user_pwd").removeClass("has-error");

    $.post(JS_APP+"/Login/doLogin", { "telephone": loginTel,"code" : loginNote},
    function(data){
      if (data == 1) {
        location.href = loginHref;
      }else{
        $("#user_pwd").addClass("has-error");
        $("#user_pwd").children(".glyphicon").addClass("glyphicon-remove");
        alert("请输入正确验证码");
        return false;
      }
    })
  }
})