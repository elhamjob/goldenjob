 <li class="active"><a href="{{{ URL::route('index') }}}"><?php echo trans('messages.home');?></a></li>
 <?php $menus  = DB::table("main_nav")->where("menu","!=",'JOBS')->where('sub',0)->get(); //Menu title ?>   
 @foreach($menus as $menu)  
 <li class="visible_list"><a class="list-item"  href="javascript:void(0)" > <span class="title"> <?php if(Lang::locale() == 'fa'){
   echo $menu->menu_fa;
 }else{
   echo $menu->menu;
 }?></span>
</a>
<?php $page2 = DB::table("pages")->where("mid","=",$menu->id)->get(); //Page according to menu?>
<ul >
 <?php $ulli = DB::table("main_nav")->where("sub","=",$menu->id)->get(); ?>
 @foreach($ulli as $li)
     @if($li->sub == 14)
     <li>
       <a  href="{{{ URL::route('pub',array($menu->url, $li->url)) }}}">
         <?php if(Lang::locale() == 'fa'){
           echo $li->menu_fa;
         }else{
           echo $li->menu;
         }?>
       </a>
     </li>
     @else
      <li>
       <a  href="{{{ URL::route('url',array($menu->url, $li->url)) }}}">
         <?php if(Lang::locale() == 'fa'){
           echo $li->menu_fa;
         }else{
           echo $li->menu;
         }?>
       </a>
     </li>
     @endif
 @endforeach
 @foreach($page2 as $p2)
 <li>
   <a  href="{{{ URL::route('page',array($menu->url, $p2->menu)) }}}">
     <?php if(Lang::locale() == 'fa'){
       echo $p2->title_fa;
     }else{
       echo $p2->title_en;
     }?>
   </a>
 </li>
 @endforeach
</ul>
</li>
@endforeach
<li class="visible_list"><a class="list-item"  href="javascript:void(0)" > <span class="title"><?php echo trans('messages.RFPs & RFQs');?> </span>
</a>
<ul >
 <li>
   <a  href="{{{ URL::route('requestforqutaions') }}}">
    <?php echo trans('messages.RFQs');?>
  </a>
</li>
<li>
 <a  href="{{{ URL::route('requestforproposals') }}}">
  <?php echo trans('messages.RFPs');?>
</a>
</li>
</ul>
</li>
<li class="visible_list"><a class="list-item"  href="javascript:void(0)" > <span class="title"><?php echo trans('messages.JOBS');?> </span>
</a>
<ul >
 <li>
   <a  href="{{{ URL::route('jobscenter') }}}">
    <?php echo trans('messages.JOBS');?>
  </a>
</li>
 <li>
   <a  href="{{{ URL::route('scholarships') }}}">
    <?php echo trans('messages.Scholarships');?>
  </a>
</li>
 <li class=""> <a href="#"><span class="title">{{trans('messages.Usefull Tips')}}</span></a>
        <ul class="sub-menu" style="display: none;">
          <?php $page2 = DB::table("pages")->where("mid","=",13)->get(); //Page according to menu?>
           @foreach($page2 as $p2)
            <?php $menu = DB::table("main_nav")->where("id","=",13)->first(); ?>
             <li>
               <a  href="{{{ URL::route('page',array($menu->url, $p2->menu)) }}}">
                 <?php if(Lang::locale() == 'fa'){
                   echo $p2->title_fa;
                 }else{
                   echo $p2->title_en;
                 }?>
               </a>
             </li>
             @endforeach
        </ul>
      </li>
   <li>
   <a  href="{{{ URL::route('appplication-forms') }}}">
    <?php echo trans('messages.Application-form');?>
  </a>
</li>
</ul>
</li>
<li> <a class="list-item" href="{{{ URL::route('contacts') }}}">{{trans('messages.contact')}}</a></li>