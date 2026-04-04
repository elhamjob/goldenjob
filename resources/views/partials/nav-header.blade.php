 <?php $info = App\info::find(1);?>
 <style type="text/css">
 	#respMenu li a
 	{
 		text-transform: uppercase;
 	}
 </style>
 <nav class="posr"> 
  <div class="container-fluid posr menu_bdrt1" style="padding-left: 160px !important">
    <div class="row align-items-center justify-content-between">
     
      <div class="col-auto">
        <div class="d-flex align-items-center">
          <!-- Responsive Menu Structure-->
          @if(Lang::locale() == 'fa')
                    <ul id="respMenu" class="ace-responsive-menu pull-right" style="float: right;" dir="rtl" data-menu-style="horizontal">
			           @include('partials.nav-li')
			     </ul>
                @else
                   <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
           @include('partials.nav-li')
     </ul>
                @endif

       
   </div>
 </div>
</div>
</div>
</nav>