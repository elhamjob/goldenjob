@extends('portal.layout.main')
@section('content')
 <div class="row pb40">
             <style type="text/css">
  tr,td
  {
    padding: 1px !important
  }
  .ck .ck-content 
  {
    height: 200px !important
  }
</style>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
            <div class="col-lg-9">
              <div class="dashboard_title_area">
                <h2>Create Application Form</h2>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="text-lg-end">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12">
              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="bdrb1 pb15 mb25">
                  <h5 class="list-title">Basic Information</h5>
                </div>
                <div class="col-xl-8">
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
                      {{ Form::open(array('url'=>'/postsforms',"class"=>"form-style1",'files'=>true)) }}
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw500 mb10"> Title</label>
                          <input type="text" class="form-control" name="title" placeholder="Title">
                        </div>
                      </div>
                      
                    
                      
                   
                   
                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Country</label>
                            <div class="bootselect-multiselect">
                              <select class="selectpicker" name="country" id="country">
                               <option></option>
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
                              <select class="form-control" name="city"  id="city"> </select>
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
                              <input type="date" class="form-control" name="start_date" >
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Close Date: </label>
                            <div class="bootselect-multiselect">
                              <input type="date" class="form-control" name="end_date" >
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
                          <textarea cols="30" rows="6" id="editor" placeholder="Description" name="description"></textarea>
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