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
use App\model\homefacts;
use App\model\scholarships;
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
use App\model\credits;
use Illuminate\Support\Str;


class ScholarshipController extends Controller
{

	//Portal Payments
	public function scholarships()
	{
		if(!Auth::check()){
			return redirect()->action([PortalController::class, 'login']);
	    }
	    else{
           $rfps = scholarships::orderby('id',"desc")->get();
	    	return view('portal.scholarships')->with('rfps',$rfps);
	    }
		
	}
	public function addscholarships()
	{
		if(!Auth::check()){
			return redirect()->action([PortalController::class, 'login']);
	    }
	    else{
	    		return view('portal.addscholarships');
	    }
		
	}
	public function editscholarships($id)
	{
		if(!Auth::check()){
			return redirect()->action([PortalController::class, 'login']);
	    }
	    else{ 
	    	$rfps = scholarships::where('id',$id)->orderby('id',"desc")->first();
	    		return view('portal.editscholarships')->with("rfps",$rfps);
	    }
		
	}
	public function deletescholarships($id)
	{
		if(!Auth::check()){
			return redirect()->action([PortalController::class, 'login']);
	    }
	    else{ 
	    	$rfps = scholarships::where('id',$id)->orderby('id',"desc")->delete();
	    		return redirect()->back();
	    }
		
	}
	public function postscholarships(){
		// Requesting Post Data and Validating
		$data=Input::all();
		$rules=array(	     
		'title' => 'required',
        'description' => 'required',
        'file'=>'required'
	    );
		$validation=Validator::make($data,$rules);
		//Redirecting If Not Validated
        if($validation->fails()){
		    return Redirect::back()
            ->withErrors($validation);
        }
		//Insert Data In To Database
		$file = Input::file('file');
		$destinationPath = 'projectsfiles/scholarships';
        $filename = Str::random(10).'-'.Auth::user()->id.'.'.$file->getClientOriginalExtension();
        Input::file('file')->move($destinationPath, $filename);
        $jobs = new scholarships;
		$jobs->title = $data['title'];
		$jobs->country = $data['country'];
		$jobs->city = $data['city'] ?? '';
		$jobs->start_date = $data['start_date'];
		$jobs->end_date = $data['end_date'] ?? "";
		$jobs->description = $data['description'];
		$jobs->file_download = $filename;
		$jobs->created_by = Auth::user()->id;
		if($jobs->save())
		{
            
			return Redirect::back()
            ->with('message','You   Successfully Posted a scholarships!');
		}
		
	}
	public function updatescholarships(){
		// Requesting Post Data and Validating
		$data=Input::all();
		$rules=array(	     
		'title' => 'required',
        'description' => 'required',
	    );
		$validation=Validator::make($data,$rules);
		//Redirecting If Not Validated
        if($validation->fails()){
		    return Redirect::back()
            ->withErrors($validation);
        }
		//Insert Data In To Database
		if(Input::hasFile('file')){
		$file = Input::file('file');
		$destinationPath = 'projectsfiles/scholarships';
        $filename = Str::random(10).'-'.Auth::user()->id.'.'.$file->getClientOriginalExtension();
        Input::file('file')->move($destinationPath, $filename);
       }
        $jobs =  scholarships::find($data['id']);
		$jobs->title = $data['title'];
		$jobs->country = $data['country'];
		$jobs->city = $data['city'] ?? '';
		$jobs->start_date = $data['start_date'];
		$jobs->end_date = $data['end_date'] ?? "";
		$jobs->description = $data['description'];
		if(Input::hasFile('file')){
		$jobs->file_download = $filename;
	}
		$jobs->created_by = Auth::user()->id;
		$jobs->save();
			return Redirect::back()
            ->with('message','You   Successfully Posted a scholarships!');
	}
        
	

}
