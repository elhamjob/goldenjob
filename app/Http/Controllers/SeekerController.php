<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
use App\model\page;
use App\model\programs;
use App\model\jobs;
use App\model\activities;
use App\model\contact;
use App\model\info;
use App\model\homefacts;
use App\model\slider;
use App\model\users;
use App\model\actypes;
use App\model\program;
use App\model\mainnav;
use App\model\rfps;
use App\model\rfqs;
use App\model\apply;
use App\model\kankorbatches;
use App\model\publicmessage;
use App\model\studentfees;
use App\model\note;
use App\model\video;
use App\model\credits;
class SeekerController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| PortalMainController - Controlling portal's Data
	|--------------------------------------------------------------------------
	| Project: AKBAR JOBS
	| Developed By: Dawood Nazari
	| Version: 1.0
	|--------------------------------------------------------------------------
	*/
 //Portal Dashboard
	public function jobs()
	{
		if(!Auth::check()){
			return redirect()->action([PortalController::class, 'login']);
		}
		$jobs = apply::where('created_by',Auth::user()->id)->where("type",1)->orderby('id',"desc")->get();
		return view('jobseeker.jobs')->with('jobs',$jobs);
	}
	public function rfps()
	{
		if(!Auth::check()){
			return redirect()->action([PortalController::class, 'login']);
		}
		$jobs = apply::where('created_by',Auth::user()->id)->where("type",2)->orderby('id',"desc")->get();
		return view('jobseeker.rfps')->with('jobs',$jobs);
	}
	public function rfqs()
	{
		if(!Auth::check()){
			return redirect()->action([PortalController::class, 'login']);
		}
		$jobs = apply::where('created_by',Auth::user()->id)->where("type",3)->orderby('id',"desc")->get();
		return view('jobseeker.rfqs')->with('jobs',$jobs);
	}
}