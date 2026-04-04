
    <link rel="shortcut icon" href="{{ asset('front/images/logo/logo1.png') }}" type="image/x-icon">
        <!-- Main style sheet -->
        <link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}">
        <!-- responsive style sheet -->
        <link rel="stylesheet" type="text/css" href="{{asset('front/css/responsive.css')}}">
<style type="text/css">


body, html {

  background-image:url('{{ asset('front/images/imgpsh_fullsize.jpg') }}');
    height: 100%;
    background-size: 100% 100%;

    background-repeat: repeat ;    /*background-image: linear-gradient(rgb(12, 97, 33),rgb(104, 145, 162));*/
 
    position: relative;
}
#login-box {
    position: absolute;
    top: 0px;
    left: 50%;
    transform: translateX(-50%);
    width: 650px;
    margin: 0 auto;
     background-color: rgba(202, 175, 134, 0.50);
     border-radius: 12px;
    min-height: 250px;
    padding: 20px;
    z-index: 9999;
}
#login-box .logo .logo-caption {
    font-family: 'Poiret One', cursive;
    color: white;
    text-align: center;
    margin-bottom: 0px;
}
#login-box .logo .tweak {
    color: #ff5252;
}
#login-box .controls {
    padding-top: 30px;
}
#login-box .controls input {
    border-radius: 0px;
    background: rgb(98, 96, 96);
    border: 0px;
    color: white;
    font-family: 'Nunito', sans-serif;
}
#login-box .controls input:focus {
    box-shadow: none;
}
#login-box .controls input:first-child {
    border-top-left-radius: 2px;
    border-top-right-radius: 2px;
}
#login-box .controls input:last-child {
    border-bottom-left-radius: 2px;
    border-bottom-right-radius: 2px;
}
#login-box button.btn-custom {
    border-radius: 2px;
    margin-top: 8px;
    background:#269abc;
    border-color: rgba(48, 46, 45, 1);
    color: white;
    font-family: 'Nunito', sans-serif;
}
#login-box button.btn-custom:hover{
    -webkit-transition: all 500ms ease;
    -moz-transition: all 500ms ease;
    -ms-transition: all 500ms ease;
    -o-transition: all 500ms ease;
    transition: all 500ms ease;
    background: rgba(48, 46, 45, 1);
    border-color:  #269abc !important;
}
#particles-js{
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: 50% 50%;
    position: fixed;
    top: 0px;
    z-index:1;
}
</style>

  <link rel="shortcut icon" href="{{ asset('front/images/logo/logo1.png') }}" type="image/x-icon">
  
<div class="container">

    <div id="login-box" style="margin-top: 100px !important">
        <div class="center text-center">
               <div class="logo">
              <img  src="{{ asset('front/images/logo/logo1.png') }}" style="height: 100px; margin: 0 auto" >
        </div><!-- /.logo -->
      <h2 class="h4" style="color: #fff; font-weight: bold;">GOLDEN Jobs</h2>
      <h2 class="h4" style="color: #fff; font-weight: bold;"> موسسه تحصیلات عالی میهن</h2>

       </div>
     
        <div class="controls" style="text-align: center;">
            <a href="{{ action('FrontController@index')}}" >
                <button type="button" class="btn btn-default btn-block btn-custom">English</button>
            </a>
            <a href="{{ action('FrontController@index_fa')}}">
            <button type="button" class="btn btn-default btn-block btn-custom">Farsi</button>
        </a>
        </div><!-- /.controls -->
    </div><!-- /#login-box -->
</div><!-- /.container -->


