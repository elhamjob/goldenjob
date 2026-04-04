<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
use App\model\programs;
use App\model\kr;
use App\model\activities;
use App\model\contact;
use App\model\info;
use App\model\credits;
use App\model\jobs;
use App\model\users;
use App\model\actypes;
use App\model\program;
use App\model\mainnav;
use App\model\campus;
use App\model\videos;
use App\model\kankorstudents;
use App\model\kankorbatches;
use App\model\publicmessage;
use App\model\studentfees;
use App\model\note;
use App\model\video;
use App\model\jobcity;




class JobController extends Controller
{

	//Portal Payments
	public function jobs()
	{
		if(!Auth::check()){
			return redirect()->action([PortalController::class, 'login']);
	    }
	    else{
           $jobs = jobs::where('created_by',Auth::user()->id)->orderby('id',"desc")->get();
	    	return view('portal.jobs')->with('jobs',$jobs);
	    }
		
	}
	public function addjob()
	{
		if(!Auth::check()){
			return redirect()->action([PortalController::class, 'login']);
	    }
	    else{
	    		return view('portal.addjob');
	    }
		
	}
	public function editjob($id)
	{
		if(!Auth::check()){
			return redirect()->action([PortalController::class, 'login']);
	    }
	    else{ 
	    	$job = jobs::where('id',$id)->orderby('id',"desc")->first();
	    		return view('portal.editjob')->with("job",$job);
	    }
		
	}
	public function deletejob($id)
	{
		if(!Auth::check()){
			return redirect()->action([PortalController::class, 'login']);
	    }
	    else{ 
	    	$job = jobs::where('id',$id)->orderby('id',"desc")->delete();
	    		return redirect()->action([JobController::class, 'jobs']);
	    }
		
	}
	public function postjob(){
		// Requesting Post Data and Validating
		$data=Input::all();
		$rules=array(	     
		'title' => 'required',
		'vacancy' => 'required',  
        'employment_type' => 'required',
        'description' => 'required',
        'salary' => 'required'
	    );
		$validation=Validator::make($data,$rules);
		//Redirecting If Not Validated
        if($validation->fails()){
		    return Redirect::back()
            ->withErrors($validation);
        }
		//Insert Data In To Database
		
        $jobs = new jobs;
		$jobs->title = $data['title'];
		$jobs->vacancy = $data['vacancy'];
		$jobs->category = $data['category'];
		$jobs->employment_type = $data['employment_type'];
		$jobs->country = $data['country'];
	    
		$jobs->yoe = $data['yoe'];
		$jobs->duration = $data['duration'];
		$jobs->organization = $data['organization'];
		$jobs->nationality = $data['nationality'];
		$jobs->start_date = $data['start_date'];
		$jobs->end_date = $data['end_date'] ?? "";
		$jobs->noj = $data['noj'];
		$jobs->salary = $data['salary'];
		$jobs->education = $data['education'];
		$jobs->gender = $data['gender'] ?? "";
		$jobs->description = $data['description'];
		$jobs->created_by = Auth::user()->id;
		if($jobs->save())
		{
			$i = 0;
			foreach ($data['city'] as $key) {
				   $jobcity = new jobcity;
					$jobcity->job_id = $jobs->id;
					$jobcity->city_id = $key;
					$jobcity->save();
					$jobs = jobs::find($jobs->id);
					$jobs->city =$key;
					$jobs->save();
					$i++;
	    
			}
            $credit = credits::where('user_id',Auth::user()->id)->orderby('amount',"desc")->first();
            if($credit)
            {
             $creditupdate = credits::where('id',$credit->id)->update($arrayName = array('amount' =>$credit->amount-1));	
            }
           
			return Redirect::back()
            ->with('message','You   Successfully Posted a Job!');
		}

			
	}
	public function updatejob(){
		// Requesting Post Data and Validating
		$data=Input::all();
		$rules=array(	     
		'title' => 'required',
		'vacancy' => 'required',  
        'employment_type' => 'required',
        'description' => 'required',
        'salary' => 'required'
	    );
		$validation=Validator::make($data,$rules);
		//Redirecting If Not Validated
        if($validation->fails()){
		    return Redirect::back()
            ->withErrors($validation);
        }
		//Insert Data In To Database
		
        $jobs =  jobs::find($data['id']);
		$jobs->title = $data['title'];
		$jobs->vacancy = $data['vacancy'];
		$jobs->category = $data['category'];
		$jobs->employment_type = $data['employment_type'];
		$jobs->country = $data['country'];
		$jobs->city = $data['city'] ?? '';
		$jobs->yoe = $data['yoe'];
		$jobs->duration = $data['duration'];
		$jobs->start_date = $data['start_date'];
		$jobs->end_date = $data['end_date'] ?? "";
		$jobs->noj = $data['noj'];
		$jobs->salary = $data['salary'];
		$jobs->education = $data['education'];
		$jobs->gender = $data['gender'] ?? "";
		$jobs->description = $data['description'];
		$jobs->save();
			return Redirect::back()
            ->with('message','You   Successfully Posted a Job!');
	}
        
	

}
