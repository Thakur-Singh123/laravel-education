<!DOCTYPE html>
<html>
   <head>
      <title>Admin Login</title>
      <link rel="stylesheet" type="text/css" href="style.css">
   </head>
   <style>
      * {
      margin: 0px;
      padding: 0px;
      }
      body {
      font-size: 120%;
      background-image: url('http://localhost/laravel-education/public/uploads/images/IMG_20230723_154516.jpg');
      background-size: 1400px auto;
      background-repeat: no-repeat;
      background-position: center;
      }
      .header {
      width: 30%;
      margin: 50px auto 0px;
      color: white;
      background: #5F9EA0;
      text-align: center;
      border: 1px solid #B0C4DE;
      border-bottom: none;
      border-radius: 10px 10px 0px 0px;
      padding: 20px;
      }
      form, .content {
      width: 30%;
      margin: 0px auto;
      padding: 20px;
      border: 1px solid #B0C4DE;
      background: white;
      border-radius: 0px 0px 10px 10px;
      }
      .input-group {
      margin: 10px 0px 10px 0px;
      }
      .input-group label {
      display: block;
      text-align: left;
      margin: 3px;
      }
      .input-group input {
      height: 30px;
      width: 93%;
      padding: 5px 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid gray;
      }
      .btn {
      padding: 10px;
      font-size: 15px;
      color: white;
      background: #5F9EA0;
      border: none;
      border-radius: 5px;
      }
      .error {
      width: 92%; 
      margin: 0px auto; 
      padding: 10px; 
      border: 1px solid #a94442; 
      color: #a94442; 
      background: #f2dede; 
      border-radius: 5px; 
      text-align: left;
      }
      .success {
      color: #3c763d; 
      background: #dff0d8; 
      border: 1px solid #3c763d;
      margin-bottom: 20px;
      }
      .success-msg {
      color: green;
      }
      .error-msg {
      color: red;
      }
      .input-group.register-button input {
      width: 33%;
      text-align: center;
      }
   </style>
   <body>
      <div class="header">
         <h2>Admin Login</h2>
      </div>
      <form method="POST" action="{{ route('login') }}">
         @csrf
         <div class="input-group">
         <label>Email</label>
         <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
         </div>
         <div class="input-group">
            <label>Password</label>
            <div class="col-md-6">
               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
               @error('password')
               <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
         </div>
         <div class="input-group register-button">
            <button type="submit" class="btn btn-primary">
            {{ __('Login') }}
            </button>
         </div>
         <p>
            Not yet a member? <a href="{{ route('register') }}">Sign up</a>  <a href="{{ url('auth/google') }}" style="margin-top: 0px;background: blue;color: #ffffff;padding: 1px;border-radius:6px;" class="ml-2">
                 Login with Google
                </a>
         </p>
        
      </form>
   </body>
</html>