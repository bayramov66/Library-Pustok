<!DOCTYPE html>
<html>
<head>
  <<link rel="stylesheet" type="text/css" href="{{ asset('back/login/assets/css/main.css') }}">
  <title>Form</title>
</head>
<body>
  <div class="login-wrap">
    <div class="login-html">
      <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
      <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
      <div class="login-form">
      <form action="{{route('client.loginPost')}}" method="POST">
        @csrf
        <div class="sign-in-htm">
          <div class="group">
            <label for="user" class="label">Email</label>
            <input id="user" type="email" class="input" name="email">
          </div>
          <div class="group">
            <label for="pass" class="label">Password</label>
            <input id="pass" type="password" class="input" data-type="password" name="password">
          </div>
         
          <div class="group">
            <input type="submit" class="button" value="Sign In">
          </div>
          <div class="hr"></div>
        </div>
        </form>
        <form action="{{route('client.registerPost')}}" method="POST">
            @csrf
        <div class="sign-up-htm">
          <div class="group">
            <label for="user" class="label">Full Name</label>
            <input id="user" type="text" class="input" name="name">
          </div>
          <div class="group">
            <label for="pass" class="label">Password</label>
            <input id="pass" type="password" class="input" data-type="password" name="password">
          </div>
          <div class="group">
            <label for="pass" class="label">Repeat Password</label>
            <input id="pass" type="password" class="input" data-type="password" name="cpassword">
          </div>
          <div class="group">
            <label for="pass" class="label">Email Address</label>
            <input id="pass" type="text" class="input" name="email">
          </div>
          <div class="group">
            <input type="submit" class="button" value="Sign Up">
          </div>
          <div class="hr"></div>
          <div class="foot-lnk">
            <label for="tab-1">Already Member?</a>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>