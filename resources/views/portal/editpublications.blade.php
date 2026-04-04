@extends('admin.layout.main')
@section('content')
<?php $info = App\info::find(1);
 $check_user = \DB::table('users')->find(Auth::user()->id);
  $jobcreditsc = DB::table('credits')->where('user_id',Auth::user()->id)->sum('amount'); 
 ?>
   <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<style type="text/css">
  .ck-content ,.ck-editor__editable 
  {
    height: 330px !important
  }
</style>
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="page-content">
        
     
      
      <!-- END PAGE HEADER-->
      <div class="portlet box blue" id="form_wizard_1">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-pencil"></i> Update Publication 
              </div>
              <div class="tools hidden-xs">
                <a href="javascript:;" class="collapse">
                </a>
                <a href="javascript:;" class="reload">
                </a>
                <a href="javascript:;" class="remove">
                </a>
              </div>
            </div>
            <div class="portlet-body form">
              
                <div class="container" style="padding: 10px">
                   {{ Html::ul($errors->all(), array('class'=>'alert alert-danger','style'=>'padding:5px;')) }}
                    @if(Session::has('message'))
                          <div class="alert alert-warning ">
                              {{ Session::get('message') }}
                          </div>
                      @endif
                      @if(Session::has('messages'))
                          <div class="alert alert-success ">
                              {{ Session::get('messages') }}
                          </div>
                      @endif
                      {{ Form::open(array('url'=>'/updatepublications',"class"=>"form-style1",'files'=>true)) }}
                       <input type="hidden" class="form-control" name="id" value="{{$rfps->id}}" placeholder="Title">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw500 mb10"> Title</label>
                          <input type="text" class="form-control" name="title" value="{{$rfps->title}}" placeholder="Title">
                        </div>
                      </div>
                      
                    
                      
                   
                   
                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Country</label>
                            <div class="bootselect-multiselect">
                              <select class="selectpicker" name="country" id="country">
                               <option value="{{$rfps->country}}"></option>
                               <?php   $countries = DB::table('countries')->get();?>
                               @foreach($countries as $country)
                                 <option value="{{$country->id}}">{{$country->country}}</option>
                                 @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">City</label>
                            <div class="bootselect-multiselect">
                              <select class="form-control" name="city"  id="city"><option value="{{$rfps->city}}"></option> </select>
                              <script type="text/javascript">
                               $('#country').change(function(){
                            var country= $(this).val();
                            if (country != '') {
                              $('#city').val('Loading city...');
                              $('#city').load("{{route('city', '')}}"+"/"+country);
                            }
                          });
                           </script>   
                            </div>
                          </div>
                        </div>
                      </div>
                     
                    
                       <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Start Date: </label>
                            <div class="bootselect-multiselect">
                              <input type="date" class="form-control" value="{{$rfps->start_date}}" name="start_date" >
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Close Date: </label>
                            <div class="bootselect-multiselect">
                              <input type="date" class="form-control" value="{{$rfps->end_date}}" name="end_date" >
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">File </label>
                            <div class="bootselect-multiselect">
                              <input type="file" class="form-control" name="file" >
                            </div>
                          </div>
                        </div>
                      </div>
                     
                    
                      <div class="col-md-12">
                        <div class="mb10">
                          <label class="heading-color ff-heading fw500 mb10"> Detail</label>
                          <textarea cols="30" rows="6" id="editor" placeholder="Description" name="description">{{$rfps->description}}</textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="text-start">
                          <button class="ud-btn btn-thm" type="submit">Save & Publish<i class="fal fa-arrow-right-long"></i></button>
                        </div>
                      </div>
                    </div>
                  {{Form::close()}}
                </div>
              </div>
            
            </div>
          </div>
<script>
        ClassicEditor
            .create( 
              document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
           
    </script>
@stop