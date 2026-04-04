@extends('jobseeker.layout.main')
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
                <h2>Update Password</h2>
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
                  <h5 class="list-title">Update Password</h5>
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
                      <?php  
                                                            $acc = DB::table('users')->where("id","=",Auth::user()->id)->first();?>
                                                            @if(!$acc)
                                                            @else
                                                            {{ Form::open(array('url'=>'/update_profile_account','class'=>'form-group padding-top-10 center','files' => true,'enctype'=>'multipart/form-data')) }}
                                                            @csrf
                                                            <div class="col-md-6 col-md-offset-2">
                                                              <table class="table table-basic table-hover" id="sample-table-2">
                                                                <tbody>
                                                                    <tr>
                                                                        <th class="dark">
                                                                            <input type="hidden" name="id" value="{{$acc->id}}" >
                                                                            <input type="text" placeholder="your current password"  name="oldpassword" class="form-control" >
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="dark">
                                                                            <input type="password" placeholder="your new password"  name="password" class="form-control" >
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="dark">
                                                                            <input type="password" placeholder="your new password" placeholder="Confirm your password"  name="password_confirmation" class="form-control" >
                                                                        </th>
                                                                    </tr>
                                                                    <th class="dark text-center">
                                                                        <button class="ud-btn btn-thm">
                                                                            <i class="fa fa-pencil"></i> Update Password
                                                                        </button>
                                                                    </th>
                                                                    <tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            {{Form::close()}}
                                                            @endif
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