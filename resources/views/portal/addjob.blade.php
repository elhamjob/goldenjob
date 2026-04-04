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
</style><link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
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
            <div class="col-lg-9">
              <div class="dashboard_title_area">
                <h2>Create Job</h2>
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
                              {{ Session::get('messages') }} <a href="{{action('PortalController@login')}}">Login</a>
                          </div>
                      @endif
                      {{ Form::open(array('url'=>'/postjob',"class"=>"form-style1")) }}
                      {{ csrf_field() }}
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw500 mb10">Job Title</label>
                          <input type="text" class="form-control" name="title" placeholder="Title">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw500 mb10">Organization</label>
                          <input type="text" class="form-control" name="organization" placeholder="Organization">
                        </div>
                      </div>
                       <div class="col-sm-12">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw500 mb10">Vacancy Number: </label>
                          <input type="text" class="form-control" name="vacancy" placeholder="Vacancy Number">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Category</label>
                            <div class="bootselect-multiselect">
                              <select class="selectpicker" name="category">
                                 <?php   $categories = DB::table('program')->get();?>
                               @foreach($categories as $country)
                                 <option value="{{$country->id}}">{{$country->name_en}}</option>
                                 @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw500 mb10">Employment Type: </label>
                          <div class="bootselect-multiselect">
                            <select class="selectpicker" name="employment_type">
                              <option value="">Select</option>
                              <option>Full Time</option>
                              <option>Part Time</option>
                              <option>Freelance</option>
                               <option>Project Based</option>
                              <option>Other</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-sm-6">
                        <div class="mb20">
                          <label class="heading-color ff-heading fw500 mb10">Sallary/Month</label>
                          <input type="text" name="salary" class="form-control" placeholder="">
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
                            <div >
                              <select class="js-example-basic-multiple" name="city[]" multiple="multiple"   >
                                   <?php   $city = DB::table('states')->where('country_id',1)->get();?>
                             @foreach($city as $ci)
                          <option value="{{$ci->id}}">{{$ci->name}}</option>
                          @endforeach

                              </select>
                            
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Years of Experience: </label>
                            <div class="bootselect-multiselect">
                              <input type="text" class="form-control" name="yoe" >
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Contract Duration: </label>
                            <div class="bootselect-multiselect">
                              <input type="text" class="form-control" name="duration" >
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
                            <label class="heading-color ff-heading fw500 mb10">Number of Jobs: </label>
                            <div class="bootselect-multiselect">
                              <input type="number" class="form-control" name="noj" >
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Education</label>
                            <div class="bootselect-multiselect">
                              <input type="text" class="form-control" name="education" placeholder="Education" />
                            </div>
                          </div>
                        </div>
                      </div>
                       <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Nationality</label>
                            <div class="bootselect-multiselect">
                              <input type="text" class="form-control" name="nationality" placeholder="Nationality" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb20">
                          <div class="form-style1">
                            <label class="heading-color ff-heading fw500 mb10">Gender</label>
                            <div class="bootselect-multiselect">
                              <select class="selectpicker" name="gender" class="gender" >
                                <option value="Any">Any</option>
                                <option value="Male">Male</option>
                                 <option value="Female">Female</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="mb10">
                          <label class="heading-color ff-heading fw500 mb10">Project Detail</label>
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
           
           $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>
@stop