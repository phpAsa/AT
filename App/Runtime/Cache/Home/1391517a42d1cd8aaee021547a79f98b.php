<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="app">
<head>
    <meta charset="utf-8" />
    <title>广东亚齐信息后台系统登录页</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="/App/Home/Common/assets/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/App/Home/Common/assets/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="/App/Home/Common/assets/css/app.css" type="text/css" />
    <script src="/App/Home/Common/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="/App/Home/Common/common/js/jquery.md5.js"></script>
    <script type="text/javascript" src="/App/Home/Common/layer/layer.js"></script>
</head>
<body background="/App/Home/Common/assets/images/bodybg.jpg">
<section id="content" class="m-t-lg wrapper-md animated fadeInUp ">
    <div class="container aside-xl" style="margin-top: 48px;">
        <a class="navbar-brand block"><span class="h1 font-bold" style="color: #ffffff">亚齐信息后台登录</span></a>
        <section class="m-b-lg">
            <header class="wrapper text-center">
                <strong class="text-sucess">用户登录/User>
            </header>
            <form action="javascript:;" method="post" >
                <div class="form-group">
                    <input type="username" name="username" id="user-name" placeholder="UserName" class="form-control  input-lg text-center no-border">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="PassWord" class="form-control  input-lg text-center no-border">
                </div>

                <button type="submit" class="btn btn-lg btn-danger lt b-white b-2x btn-block am-btn" id="validate-submit">
                    <i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">登录</span></button>
            </form>
        </section>
    </div>
</section>
<!-- footer -->
<footer id="footer">
    <div class="text-center padder">

    </div>
</footer>
<!-- / footer -->
    <script type="text/javascript">

    $(function(){
        document.onkeydown = function(e){ 
            var ev = document.all ? window.event : e;
            if(ev.keyCode==13) {

                   $('.am-btn').click();

             }
        }
    });


            $('.am-btn').click(function(){
                var name = $('#user-name').val();
                var password = $.md5($('#password').val());
                //console.log(password);
                //console.log(name);return
                $.post('<?php echo U("Admin/checkLogin");?>',{
                    username:name,
                    password:password,
                },function(res){
                    // if(res.err==1){
                        // layer.msg(res.msg,function(){location.href="/"});
                    //}else{
                        // layer.msg(res.msg);
                    //}
                    if(res.err==1) {
                        location.href="/";
                    } else if(res.err==0) {
                        layer.msg("密码输入错误");
                    } else if(res.err==2) {
                        layer.msg("账号被禁用");
                    } else if(res.err==3) {
                        layer.msg("用户名不存在");
                    }
                    
                },'json')
            })
    </script>
</body>
</html>