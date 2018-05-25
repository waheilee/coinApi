<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台登录</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="{{asset('distAdmin/modules/login/css/style.css')}}" tppabs="{{asset('distAdmin/modules/login/css/style.css')}}" />
<style>
body{height:100%;background:#16a085;overflow:hidden;}
canvas{z-index:-1;position:absolute;}
</style>
<script src="{{asset('distAdmin/modules/login/js/jquery.js')}}"></script>
<!--<script src="js/verificationNumbers.js" tppabs="js/verificationNumbers.js"></script>-->
<script src="{{asset('distAdmin/modules/login/js/Particleground.js')}}" tppabs="{{asset('distAdmin/modules/login/js/Particleground.js')}}"></script>
<script>
$(document).ready(function() {
  //粒子背景特效
  $('body').particleground({
    dotColor: '#5cbdaa',
    lineColor: '#5cbdaa'
  });
  //验证码
//  createCode();
  //测试提交，对接程序删除即可
  $(".submit_btn").click(function(){

	  location.href="javascrpt:;"/*tpa=http://***index.html*/;
	  });
});
</script>
</head>
<body>
  <dl class="admin_login">
     <dt>
        <strong>站点后台管理系统</strong>
        <em>Management System</em>
     </dt>
     <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <dd class="user_icon{{ $errors->has('email') ? ' has-error' : '' }}">

           <div class="">
              <input id="email" type="email" class="login_txtbx" name="email" value="{{ old('email') }}" placeholder="邮箱" required autofocus>

              @if ($errors->has('email'))
                 <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                 </span>
              @endif
           </div>
        </dd>

        <dd class="pwd_icon{{ $errors->has('password') ? ' has-error' : '' }}">

           <div class="">
              <input id="password" type="password" class="login_txtbx" name="password" placeholder="密码" required>

              @if ($errors->has('password'))
                 <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                 </span>
              @endif
           </div>
        </dd>
        {{--<dd class="val_icon">--}}
           {{--<div class="checkcode">--}}
              {{--<input type="text" id="J_codetext" placeholder="验证码" maxlength="4" class="login_txtbx">--}}
              {{--<canvas class="J_codeimg" id="myCanvas" onclick="createCode()">对不起，您的浏览器不支持canvas，请下载最新版浏览器!</canvas>--}}
           {{--</div>--}}
              {{--<input type="button" value="验证码核验" class="ver_btn" onClick="validate();">--}}
        {{--</dd>--}}
        <dd>
              <input type="submit" value="立即登陆" class="submit_btn"/>
        </dd>

     </form>
     <dd>
       <p>© 2015-2016 jq22 版权所有</p>
       <p>陕B2-8998988-1</p>
     </dd>
  </dl>
</body>
</html>
