<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>宇瑞安4S上门保养后台管理系统</title>

    <link href="/Public/admin/css/style.css" rel="stylesheet">
    <link href="/Public/admin/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/Public/admin/js/html5shiv.js"></script>
    <script src="/Public/admin/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="/admin.php/Login/doLogin" method="post" id="myform">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">宇瑞安4S上门保养管理系统</h1>
            <img src="/Public/admin/images/login-logo.png" alt="">
        </div>
        <div class="login-wrap">
            <input type="text" name="name" class="form-control" id="name" placeholder="用户名"><span id="nameMsg"></span>
            <input type="password" name="password" class="form-control" id="pwd" placeholder="密&nbsp;码"><span id="pwdMsg"></span>

            <button class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check"></i>登录
            </button>
        </div>
    </form>

</div>
<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="/Public/admin/js/jquery-1.10.2.min.js"></script>
<script src="/Public/admin/js/bootstrap.min.js"></script>
<script src="/Public/admin/js/modernizr.min.js"></script>
<script type="text/javascript">
    var isName = false;
    var isPwd = false;

    $('#name').blur(function(){
        checkName();
    });
    function checkName(){
        if($('#name').val() == ''){
            $('#nameMsg').html('请输入用户名').css({'color':'red'});
        }else{
            isName = true;
            $('#nameMsg').html('');
        }
    }

    $('#pwd').blur(function(){
        checkPwd();       
    })
    function checkPwd(){
        if($('#pwd').val() == ''){
            $('#pwdMsg').html('请输入密码').css({'color':'red'});
        }else{
            isPwd = true;
            $('#pwdMsg').html('');
        }
    }

    $('#myform').submit(function(){
        checkName();
        checkPwd();

        if(isName && isPwd){
            return true;
        }else{
            return false;
        }
 
    })
</script>
</body>
</html>