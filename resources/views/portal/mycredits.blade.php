@extends('portal.layout.main')
@section('content')
<?php $info = App\info::find(1);
 $check_user = \DB::table('users')->find(Auth::user()->id);
 ?>
 <div class="row pb40">
  <div class="col-lg-12">
              <div class="dashboard_title_area">
                <h2>My Credits</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12">
              <div class="ps-widget bgc-white bdrs4 p30 mb30 overflow-hidden position-relative">
                <div class="packages_table table-responsive">
                  <table class="table-style3 table at-savesearch">
                    <thead class="t-head">
                    	 
                      <tr>
                        <th scope="col">Add Credits</th>
                        <th scope="col">Created </th>
                        <th scope="col">by </th>
                      </tr>
                    </thead>
                    <tbody class="t-body">
                      @foreach($credits as $job)
                      <tr>
                        <th scope="row">
                          {{$job->amount}}
                        </th>
                        <td class="vam"><span>{{$job->date}}</span></td>
                        <td class="vam">
                          <?php  $by = \DB::table('users')->where('id',$job->created_by)->first();?>
                          @if($by)
                           {{$by->name}}  {{$by->last_name}}
                           @endif
                        </td>
                        
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
          </div>

@stop