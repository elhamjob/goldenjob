@extends('website.layout.front_en')
@section('content')

    <?php
    $info = DB::table('general_info')->first(); //Basic Info About University
    ?>
   <!-- Inner Page Banner Area Start Here -->
        <div class="inner-page-banner-area" style="background-image: url('{{asset('assets/img/banner/5.jpg')}}'); <?php if(Lang::locale()=='fa'){echo 'direction:rtl; text-align:right';}else{echo 'direction:ltr;text-align:left;';}?>">
            <div class="container">
                <div class="pagination-area">
                    <h1>
                        <?php 
                            if(Lang::locale()=='fa'){
                                echo $features->title_fa;
                            }else{
                                echo $features->title_fa;
                            }
                       ?>
                    </h1>
                    <ul>
                        <li><a href="{{asset('/')}}"><?php echo trans('messages.home');?></a> - </li>
                        <li>
                            <?php 
                                if(Lang::locale()=='fa'){
                                    echo $features->title_fa;
                                }else{
                                    echo $features->title_en;
                                }
                           ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
        <!-- Courses Page 5 Area Start Here -->
        <div class="courses-page-area5" style="direction: <?php if(Lang::locale()=='fa'){echo 'rtl';}else{echo 'ltr';}?>">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="course-details-inner">
                            <h2 class="title-default-left title-bar-high" style="text-align: <?php if(Lang::locale()=='fa'){echo 'right';}else{echo 'left';}?>">
                                <?php 
                                    if(Lang::locale()=='fa'){
                                        echo $features->title_fa;
                                    }else{
                                        echo $features->title_en;
                                    }
                               ?>
                            </h2>
                            <style>
                                <?php if(Lang::locale()=='fa'){?>
                                    .title-bar-high:before{
                                        right:0;
                                    }
                                <?php } ?>
                            </style>
                            <?php 
                                if(strlen($features->image)>0){ ?>
                                
                                <img class="img-responsive" style="width: 100%" src="{{asset('images/feature-images/'.$features->image)}}" alt="courses">
                            <?php }?>
                            <p>
                                 <?php 
                                    if(Lang::locale()=='fa'){
                                        echo $features->description_fa;
                                    }else{
                                        echo $features->description_en;
                                    }
                               ?>
                            </p>
                            
                        </div>
                    
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                   <div class="sidebar">
                       <div class="sidebar-box">
                           <div class="sidebar-box-inner">
                               <h3 class="sidebar-title"><?php echo trans('messages.features');?></h3>
                               <ul class="sidebar-categories">
                                   <?php $featurs = DB::table('features')->orderBy('id','DESC')->get();;?>
                                   <?php $i = 1;?>
                                   @foreach($featurs as $all)
                                        <li>
                                            <a href="{{asset('/admin/features/details').'/'.$all->id}}">
                                                <h4 class="feature_title">
                                                    <?php 
                                                        if(Lang::locale()=='fa'){
                                                            echo $all->title_fa;
                                                        }else{
                                                            echo $all->title_en;
                                                        }
                                                   ?>
                                                </h4>
                                                <?php  if(strlen($features->image)>0){ ?>
                                                    
                                                    <img class="img-responsive" style="width: 100%" src="{{asset('images/feature-images/'.$features->image)}}" alt="courses">
                                                <?php }?>
                                            </a>
                                            <p><?php if(Lang::locale()=='fa'){
                                                echo substr($all->description_fa, 0, 50);
                                                
                                            }else{
                                                echo substr($all->description_en, 0, 50);
                                            }?></p> 
                                        </li>
                                        <?php if($i != count($featurs)){?>
                                            <hr>
                                        <?php } ?>
                                        <?php  $i++; ?>
                                   @endforeach
                                   
                               </ul>
                           </div>
                       </div>
                   </div>
               </div>
                </div>
            </div>
        </div>
        <!-- Courses Page 5 Area End Here -->     
@stop