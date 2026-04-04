@extends('portal.layout.main')
        @section('content')
          <section class="content-header">
  <h1>
    Contact University
    <small> Allamah E-Learning System</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Contact University</li>
  </ol>
</section>
                <section class="content">
                         <div class="row">
                            <div class="col-md-12 center">
                                <div class="panel panel-white panel-white core-box padding-5">
                                  {{ Html::ul($errors->all(), array('class'=>'col-md-6 col-md-offset-3 alert alert-danger text-danger','style'=>'padding:45px;')) }}
                                   @if(Session::has('message'))
                                              <div class="alert alert-success col-md-6 col-md-offset-3">
                                                  {{ Session::get('message') }}
                                              </div>
                                          @endif
                                    {{Form::open(array('url' => '/contac_post'))}}
                                    <div class="panel-body">

                                       <div class="form-group  col-md-6 col-xs-12">
                                           <div class="field-label">Name <span style="color: red">*</span></div>
                                           <input type="text" class="form-control" name="username" value="" placeholder="Your Name">
                                       </div>
                                       
                                       <div class="form-group  col-md-6 col-xs-12">
                                           <div class="field-label">Student ID <span style="color: red">*</span></div>
                                           <input type="text" class="form-control" name="email" value="" placeholder="Your ID">
                                       </div>
                                       
                                       <div class="form-group  col-md-6 col-xs-12">
                                           <div class="field-label">Phone <span style="color: red">*</span></div>
                                           <input type="text" class="form-control" name="phone" value="" placeholder="Phone">
                                       </div>
                                       
                                       <div class="form-group  col-md-6 col-xs-12">
                                           <div class="field-label">Subject <span style="color: red">*</span></div>
                                           <input type="text" class="form-control" name="subject" value="" placeholder="Subject">
                                       </div>
                                       
                                       <div class="form-group col-sm-12 col-xs-12">
                                           <div class="field-label">Message <span style="color: red">*</span></div>
                                           <textarea name="message"  class="form-control"  placeholder="Your Message"></textarea>
                                       </div>
                                       
                                       <div class="form-group col-md-12 col-xs-12">
                                           <div class="text-right">
                                               <button type="submit" name="submit" class="btn btn-primary" title="Send">
                                               send message</button>
                                           
                                       </div>
                                       </div>
                                   </div>

                                    {{Form::close()}}
                                </div>
                            </div>
                        </div>
                   
                </div>
          </div>
       </div>
@stop