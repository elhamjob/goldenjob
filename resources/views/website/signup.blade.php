@extends('website.layout.front_en')
@section('content')
 <?php
    $info = DB::table('general_info')->first(); 
    $countries = DB::table('countries')->get(); //Basic Info About University
    ?>
<style type="text/css">
  .row
  {
    margin-bottom: 8px !important
  }
</style>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1354845579740725"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="autorelaxed"
     data-ad-client="ca-pub-1354845579740725"
     data-ad-slot="6323115823"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

    <!-- About Section Area -->
    <section class="our-faq pb90 pt100">
      <div class="container">
        <div class="row wow fadeInUp">
          <div class="col-lg-4">
            <div class="vertical-tab">
              <div class="widget_list">
                <nav>
                  <div class="nav flex-column nav-tabs text-start" id="nav-tab" role="tablist">
                    <button class="nav-link active text-start" id="nav-accountpayment-tab" data-bs-toggle="tab" data-bs-target="#nav-accountpayment" type="button" role="tab" aria-controls="nav-accountpayment" aria-selected="true"><span><?php echo trans('messages.As Job Seeker');?></span></button>
                    <button class="nav-link text-start" id="nav-manageother-tab" data-bs-toggle="tab" data-bs-target="#nav-manageother" type="button" role="tab" aria-controls="nav-manageother" aria-selected="false"><span><?php echo trans('messages.As Employer');?></span></button>
                  </div>
                </nav>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-accountpayment" role="tabpanel" aria-labelledby="nav-accountpayment-tab">
                <div class="for-hire">
                  <h4><?php echo trans('messages.As Job Seeker');?></h4>
                    {{ Html::ul($errors->all(), array('class'=>'alert alert-danger text-danger','style'=>'padding:5px;')) }}
                                 @if(Session::has('message'))
                                            <div class="alert alert-success">
                                                {{ Session::get('message') }}
                                            </div>
                                        @endif
                                  
                                  {{Form::open(array('files' => true, 'url' => '/post_signup_asseeker','id'=>'','class'=>'contact_form clearfix'))}}
                                    <div class="row">
                                        <div class="col-md-3">
                                         Email
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="email" class="form-control" type="email"  placeholder="Enter Your Email" required="">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-3">
                                          Confirm Email
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="confirm_email" class="form-control" type="email"  placeholder="Confirm Email" required="">
                                        </div>
                                      </div>
                                       <div class="row">
                                        <div class="col-md-3">
                                          Password 
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="password" class="form-control" type="password"  placeholder="Type your password" required="">
                                        </div>
                                      </div>
                                       <div class="row">
                                        <div class="col-md-3">
                                          Confirm Password 
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="confirm_password" class="form-control" type="password"  placeholder="Confirm your password" required="">
                                        </div>
                                      </div>
                                        <div class="row">
                                        <div class="col-md-3">
                                          First Name
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="first_name" class="form-control" type="text"  placeholder="First Name" required="">
                                        </div>
                                      </div>
                                        <div class="row">
                                        <div class="col-md-3">
                                         Last Name
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="last_name" class="form-control" type="text"  placeholder=" Last Name" >
                                        </div>
                                      </div>


                                      <div class="row">
                                        <div class="col-md-3">
                                        Country
                                        </div>   
                                          <div class="col-md-7">                  
                                             <select class="form-control" name="country" id="country">

                                               <option></option>
                                               @foreach($countries as $coun)
                                               <option value="{{$coun->id}}">{{$coun->country}}</option>
                                               @endforeach
                                             </select> 
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-3">
                                       City
                                        </div>   
                                          <div class="col-md-7">                  
                                              <select class="form-control" name="city" id="city">
                                               <option></option>
                                             </select> 
                                        </div>
                                      </div>
                                       <div class="row">
                                        <div class="col-md-3">
                                         Address
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="address" class="form-control" type="text"  placeholder=" Address" >
                                        </div>
                                      </div>
                                       <div class="row">
                                        <div class="col-md-3">
                                         Zip Code
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="zipcode" class="form-control" type="text"  placeholder=" Zip Code" >
                                        </div>
                                      </div>
                                        <div class="row">
                                        <div class="col-md-3">
                                         Mobile
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="mobile" class="form-control" type="text"  placeholder="Mobile" required="">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-3">
                                         Date of Birth
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="dob" class="form-control" type="date"  placeholder=" Date of Birth" required="">
                                        </div>
                                      </div>
                                       <div class="row">
                                        <div class="col-md-3">
                                        Image
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="image" class="form-control" type="file"  placeholder=" Image" >
                                        </div>
                                      </div>
                                       <div class="row">
                                        <div class="col-md-3">
                                        Terms and Conditions
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="terms"  type="checkbox"   required="">
                                        </div>
                                      </div>
                                      <div class="row">
                                         <div class="col-md-4 "> </div>
                                        <div class="col-md-4 "> 
                                          <br>
                                  <button type="submit"  class="ud-btn btn-thm-border mb25 me-4">Get Started<i class="fal fa-arrow-right-long"></i></button>
                                </div>
                              </div>

                       {{Form::close()}}
                </div>
              </div>
              <div class="tab-pane fade" id="nav-manageother" role="tabpanel" aria-labelledby="nav-manageother-tab">
                <div class="for-hire">
                  <h4><?php echo trans('messages.As Employer');?></h4>
                  {{ Html::ul($errors->all(), array('class'=>'alert alert-danger text-danger','style'=>'padding:5px;')) }}
                                 @if(Session::has('message'))
                                            <div class="alert alert-success">
                                                {{ Session::get('message') }}
                                            </div>
                                        @endif
                                  
                                  {{Form::open(array('files' => true, 'url' => '/post_signup_asemployer','id'=>'','class'=>'contact_form clearfix'))}}
                                    <div class="row">
                                        <div class="col-md-3">
                                         Email
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="email" class="form-control" type="email"  placeholder="Enter Your Email" required="">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-3">
                                          Confirm Email
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="confirm_email" class="form-control" type="email"  placeholder="Confirm Email" required="">
                                        </div>
                                      </div>
                                       <div class="row">
                                        <div class="col-md-3">
                                          Password 
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="password" class="form-control" type="password"  placeholder="Type your password" required="">
                                        </div>
                                      </div>
                                       <div class="row">
                                        <div class="col-md-3">
                                          Confirm Password 
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="confirm_password" class="form-control" type="password"  placeholder="Confirm your password" required="">
                                        </div>
                                      </div>
                                        <div class="row">
                                        <div class="col-md-3">
                                          Company  Name
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="company" class="form-control" type="text"  placeholder="Company Name" required="">
                                        </div>
                                      </div>
                                         <div class="row">
                                        <div class="col-md-3">
                                          First Name
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="first_name" class="form-control" type="text"  placeholder="First Name" required="">
                                        </div>
                                      </div>
                                        <div class="row">
                                        <div class="col-md-3">
                                         Last Name
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="last_name" class="form-control" type="text"  placeholder=" Last Name" >
                                        </div>
                                      </div>


                                      <div class="row">
                                        <div class="col-md-3">
                                        Country
                                        </div>   
                                          <div class="col-md-7">                  
                                             <select class="form-control" name="country" id="country">

                                               <option></option>
                                               @foreach($countries as $coun)
                                               <option value="{{$coun->id}}">{{$coun->country}}</option>
                                               @endforeach
                                             </select> 
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-3">
                                       Contract Type
                                        </div>   
                                          <div class="col-md-7">                  
                                             <select  name="company_type" class="form-control" required="">
                                                <option value="">Select</option>
                                                <option value="1">Employer (Private Sector)</option>
                                                <option value="2">Employer ( Non-Member NGO )</option>
                                                <option value="3">UN Agency</option>
                                                <option value="4">Member NGO</option>
                                                <option value="5">Government</option>
                                            </select>
                                        </div>
                                      </div>
                                       <div class="row">
                                        <div class="col-md-3">
                                         Address
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="address" class="form-control" type="text"  placeholder=" Address" >
                                        </div>
                                      </div>
                                      
                                        <div class="row">
                                        <div class="col-md-3">
                                         Contact Number
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="mobile" class="form-control" type="text"  placeholder="Mobile" required="">
                                        </div>
                                      </div>
                                     <div class="row">
                                        <div class="col-md-3">
                                         About Company
                                        </div>   
                                          <div class="col-md-7">                  
                                             <textarea name="company_details" class="form-control" rows="3" style="height: 100px !important"  placeholder="  About Company" required=""></textarea>
                                        </div>
                                      </div>
                                       <div class="row">
                                        <div class="col-md-3">
                                        Image
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="image" class="form-control" type="file"  placeholder=" Image" >
                                        </div>
                                      </div>
                                       <div class="row">
                                        <div class="col-md-3">
                                        Terms and Conditions
                                        </div>   
                                          <div class="col-md-7">                  
                                             <input name="terms"  type="checkbox"   required="">
                                        </div>
                                      </div>
                                      <div class="row">
                                         <div class="col-md-4 "> </div>
                                        <div class="col-md-4 "> 
                                          <br>
                                  <button type="submit"  class="ud-btn btn-thm-border mb25 me-4">Get Started<i class="fal fa-arrow-right-long"></i></button>
                                </div>
                              </div>

                       {{Form::close()}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
       <script type="text/javascript">
           $('#country').change(function(){
        var country= $(this).val();
        if (country != '') {
          $('#city').val('Loading city...');
          $('#city').load("{{route('city', '')}}"+"/"+country);
        }
      });
       </script>        
@stop