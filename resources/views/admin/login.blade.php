<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>GOLDEN Jobs | Login</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="GOLDEN Jobs">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet"/>

<link href="{{ asset('admin/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('admin/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('admin/assets/admin/pages/css/login.css') }}" rel="stylesheet"/>

<link href="{{ asset('admin/assets/global/css/components.css') }}" rel="stylesheet"/>
<link href="{{ asset('admin/assets/admin/layout/css/layout.css') }}" rel="stylesheet"/>
<link href="{{ asset('admin/assets/admin/layout/css/themes/darkblue.css') }}" rel="stylesheet"/>

<link rel="shortcut icon" href="{{ asset('images/logo.png') }}"/>
</head>

<body class="login">

<div class="logo text-center">
<img src="{{ asset('images/logo-wide.png') }}" style="height:100px" class="img-responsive"/>
</div>

<div class="content">

@if(isset($user))
    {{ $user->id }}
@else
    مهمان
@endif
@if ($errors->any())
<div class="alert alert-danger">
@foreach ($errors->all() as $error)
<p>{{ $error }}</p>
@endforeach
</div>
@endif

<form method="POST" action="{{ url('/admin/loginfunction') }}">
@csrf

<h3 class="form-title">Admin Login</h3>

<div class="form-group">
<input class="form-control" type="text" name="email" placeholder="Email"/>
</div>

<div class="form-group">
<input class="form-control" type="password" name="password" placeholder="Password"/>
</div>

<div class="form-actions">
<button type="submit" class="btn btn-success btn-block">Login</button>
</div>

<div class="create-account text-center">
<a href="{{ route('index') }}">Visit Website</a>
</div>

</form>

</div>

<div class="copyright text-center">
2026 © GOLDEN Jobs
</div>

<script src="{{ asset('admin/assets/global/plugins/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

</body>
</html>
```
