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
        <div class="row wow fadeInUp" data-wow-delay="300ms">
          <div class="col-lg-12">
             <table class="table table-bordered">
              {{ Form::open(array('url'=>'/searchrfps','class'=>'form-style1 clearfix')) }}
            <tr>
              <td colspan="2"><input type="text" name="title" class="form-control" placeholder="Search By Title"></td>
               <td><input type="text" name="from" class="form-control" placeholder="From Date"></td>
                <td><input type="text" name="to" class="form-control" placeholder="To Date"></td>
               <td><button class="ud-btn btn-thm" type="submit">Search</button></td>
            </tr>
            {{Form::close()}}
          </table>
          <table class="table table-bordered">
            
              <tr>
             <td>S.No</td>
              <td>Title</td>
               <td>Description</td>
               <td>Organization</td>
               <td>Close Date </td>
               <td>Download</td>
            </tr>
            <?php $i = 1;?>
            @foreach($rfps as $rfp)
            <?php $i++?>
             <?php 
                       $user = \DB::table('users')->find($rfp->created_by);?>
             <tr>
             <td>{{$i}}</td>
              <td><a href="{{{ URL::route('rfpdetails',$rfp->id) }}}"> {{$rfp->title}}</a></td>
               <td><?php echo substr($rfp->description,0,100)?></td>
               <th scope="row">
                          <div class="freelancer-style1 p-0 mb-0 box-shadow-none">
                            <div class="d-lg-flex align-items-lg-center">
                              <div class="thumb w60 position-relative rounded-circle mb15-md">
                                 @if(isset($user))
                                <img src="{{asset('images/users/'.$user->image)}}" alt="logo" style="height: 70px !important" class="rounded-circle mx-auto">
                                @endif
                              </div>
                              <div class="details ml15 ml0-md mb15-md">
                                <h5 class="title mb-2">{{$user->name ?? "" }} {{$user->last_name ?? ""}}</h5>
                              </div>
                            </div>
                          </div>
                        </th>
               <td>{{$rfp->end_date}} </td>
               <td><a href="{{asset('projectsfiles/rpfs/'.$rfp->file_download)}}"><i class="fa fa-download"></i> Download</td>
            </tr>
            @endforeach
          </table>
          <div class="row">
              <div class="mbp_pagination mt30 text-center">
                  {{$rfps->links()}}
              </div>
            </div>

         
          </div>
         
        </div>
      </div>
    </section> 


               
@stop