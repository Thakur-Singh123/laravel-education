<!DOCTYPE html>
<html>
   <head>
      <title>User Registration</title>
      <link rel="stylesheet" type="text/css" href="style.css">
   </head>
   <style>
      * {
      margin: 0px;
      padding: 0px;
      }
      body {
      font-size: 120%;
      background: darkslategrey;
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
      .notification-green {
      color: green;
      padding: 1.5px;
      }
   </style>
   <body>
      <div class="header">
         @if (session('success'))
         <div class="alert alert-success">
            <p class="notification-green">{{ session('success') }}</p>
         </div>
         @endif
         <h2>Create User Registration </h2>
      </div>
      <form method="POST" action="{{ route('register') }}">
         @csrf
         <div class="input-group">
            <label>Name</label>
            <div class="col-md-6">
               <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
               @error('name')
               <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
         </div>
         <div class="input-group">
            <label>Email Address</label>
            <div class="col-md-6">
               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
               @error('password')
               <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
         </div>
         <div class="input-group">
            <label>Confirm password</label>
            <div class="col-md-6">
               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
         </div>
         <div class="input-group register-button">
            <button type="submit" class="btn btn-primary">
            {{ __('Register') }}
            </button>
         </div>
         <p>
            Already a member? <a href="{{ route('login') }}">Sign in</a>
         </p>
      </form>
   </body>
</html>