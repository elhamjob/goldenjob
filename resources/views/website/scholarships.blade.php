@extends('website.layout.front_en')
@section('content')
 <?php
    $info = DB::table('general_info')->first(); //Basic Info About University
    ?>

<style type="text/css">
  td
  {
    padding: 1px !important
  }
</style>
  
    <!-- Our Contact Info -->
    <section class="mt-0">
      <div class="container">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1354845579740725"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="autorelaxed"
     data-ad-client="ca-pub-1354845579740725"
     data-ad-slot="2021061970"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1354845579740725"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-1354845579740725"
     data-ad-slot="3504857353"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
            <!-- Blog Section Area -->
    <section class="our-blog pt-0">
      <div class="container">
        <div class="row wow fadeInUp" data-wow-delay="300ms">
          <div class="col-xl-12">

            {{ Form::open(array('url'=>'/searchscholarships','class'=>'form-style1 clearfix')) }}
            <table class="table ">
            <tr>
              <td colspan="2"><input type="text" name="title" class="form-control" placeholder="Search By Title"></td>
               <td><input type="text" name="from" class="form-control" placeholder="From Date"></td>
                <td><input type="text" name="to" class="form-control" placeholder="To Date"></td>
               <td><button class="ud-btn btn-thm" type="submit">Search</button></td>
            </tr>
            </table>
            {{Form::close()}}
            <div class="navtab-style1">
              <div class="tab-content" id="nav-tabContent">
                <br>
                <div class="tab-pane fade show active fz15 text" id="nav-item1" role="tabpanel" aria-labelledby="nav-item1-tab">
                  <div class="row">
                       <?php $i = 1;?>
            @foreach($scholarships as $rfp)
            <?php $i++?>
             <?php 
                       $user = \DB::table('users')->find($rfp->created_by);?>
                    <div class="col-sm-6 col-xl-3">
                      <div class="blog-style1">
                        <div class="blog-img"><img class="w-100" src="{{asset('projectsfiles/scholarships/'.$rfp->file_download)}}" alt=""></div>
                        <div class="blog-content">
                          <a class="date" href="{{{ URL::route('schoraship', $rfp->id) }}}">{{ $rfp->created_at}}</a>
                          <h4 class="title mt-1"><a href="{{{ URL::route('schoraship', $rfp->id) }}}">
                                                        {{$rfp->title}}
                                                      </a></h4>
                          <p class="text mb-0"> <?php if(Lang::locale()=='fa')
                                                {
                                          
                                          echo Illuminate\Support\Str::words($rfp->text_fa, 20, ' (...)');
                                        }else{
                                            echo Illuminate\Support\Str::words($rfp->text_en, 20, ' (...)');
                                          }?></p>
                                          <a class="prt-btn btn-inline prt-btn-color-dark" href="{{{ URL::route('schoraship', $rfp->id) }}}">View More</a>
                        </div>
                      </div>
                    </div>
                   @endforeach

                    {{$scholarships->links()}}
                   
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
     
      </div>
    </section>

      </div>
    </section> 


               
@stop