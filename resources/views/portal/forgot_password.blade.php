<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title> Allamah E-Learning System | Forgot Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('assets/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/AdminLTE.css')}}">
<link rel="shortcut icon" href="{{ asset('images/logo.png') }}"/>
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
    {{ Html::ul($errors->all(), array('class'=>'alert alert-danger','style'=>'padding:5px;')) }}
    @if(Session::has('message'))
          <div class="alert alert-warning ">
              {{ Session::get('message') }}
          </div>
      @endif
      @if(Session::has('messages'))
          <div class="alert alert-success ">
              {{ Session::get('messages') }} <a href="{{action('PortalController@login')}}">Login</a>
          </div>
      @endif
  <div class="lockscreen-logo">
    <img src="{{ asset('images/logo-wide.png') }}" style="width:360px;" alt=""/>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">Reset Password</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">

    <!-- lockscreen credentials (contains the form) -->
  
  {{ Form::open(array('url'=>'/Student_forgot_password',"style"=>"padding:5px")) }}
   
       <input type="text" class="form-control" name="phone" placeholder="Enter Your Phone">
        <br>
        <input type="text" class="form-control" name="st_id" placeholder="Enter Your ID">
        <br>
          <button type="submit" class="btn btn-info"><i class="fa fa-arrow-right "></i></button>
      {{Form::close()}}
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Please Enter your Phone and ID that is registered in BRIHE Database
    
  </div>
  
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2020-2020 <b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

</html>
