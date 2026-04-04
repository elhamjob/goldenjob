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
use App\model\campus;
use App\model\videos;
use App\model\kankorstudents;
use App\model\kankorbatches;
use App\model\publicmessage;
use App\model\studentfees;
use App\model\note;
use App\model\video;
use App\model\credits;
class PortalController extends Controller
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
	//Login View Function
	public function login()
	{
		return view("portal.login");
	}
	//Loging in method for checking password and message and signing in - Start
	public function Student_loginfunction(){
		$data=Input::all();
		$rules=array(	     
			'email'=>'required',
			'password'=>'required',
		);
		$validation=Validator::make($data,$rules);
		if($validation->fails()){
			return redirect()->action([PortalController::class, 'login'])->withErrors($validation);
		}
		if(Auth::attempt(array('email'=>$data['email'], 'password'=>$data['password'],"status"=>0))){
			return redirect()->action([PortalController::class, 'index']);
		}
		else{
			return redirect()->action([PortalController::class, 'login'])
			->withErrors("Your ID or Password is Incorrect, or Your Account is Deactivated! Please Try Again.");
		}
	}  
 //Portal Dashboard
	public function index()
	{
		if(!Auth::check()){
			return redirect()->action([PortalController::class, 'login']);
		}
		else{
			if(auth::user()->type == 1){
				$jobs = jobs::where('created_by',Auth::user()->id)->orderby('id',"desc")->get();
				$pages = page::count();
				$programs = programs::count();
				$activities = activities::count();
				$contacts = contact::count();
				return view('portal.index')
				->with('pages', $pages)
				->with('programs', $programs)
				->with('acs', $activities)
				->with('jobs',$jobs)
				->with('contacts', $contacts);
			}elseif(auth::user()->type == 2)
			{
				
				return view('jobseeker.index');
			}else
			{
				return redirect()->action([PortalController::class, 'login']);
			}
		}
	}
	
	public function mycredits()
	{
		if(!Auth::check()){
			return redirect()->action([PortalController::class, 'login']);
		}
		else{
			if(auth::user()->type == 1){
				$credits = credits::where('user_id',Auth::user()->id)->orderby('id',"desc")->get();
				return view('portal.mycredits')
				->with('credits', $credits);
			}elseif(auth::user()->type == 2)
			{
				$credits = credits::where('user_id',Auth::user()->id)->orderby('id',"desc")->get();
				return view('jobseeker.mycredits')
				->with('credits', $credits);
			}else
			{
				return redirect()->action([PortalController::class, 'login']);
			}
		}
	}
	//Portal Dashboard
	public function profile()
	{
		if(!Auth::check()){
			return redirect()->action([PortalController::class, 'login']);
		}else{
			if(Auth::user()->type==1)
			{
			   return view('portal.profile');	
			}else
			{
				return view('jobseeker.profile');
			}
			
		}
	}
	//Sign Out Function
	public function logout(){
		if(Auth::check()){
			Auth::logout();
			return redirect()->action([PortalController::class, 'login']);
		}
		return redirect()->action([PortalController::class, 'login']);
	}
	public function contact(){
		// Checking Wether Logged In
		if(!Auth::check()){
			return redirect()->action([PortalController::class, 'login']);
		}
		else{
			if(auth::user()->utype == 1){
				return view('portal.contact');
			}else{
				return redirect()->action([PortalController::class, 'login']);
			}
		}
	} 
	//Posting Contact to Database Function
	public function contac_post()
	{
		//Requesting Post Data
		$data=Input::all();
		//Assigning Rules to Inputs
		$rules=array(
			'username' => 'required|max:100',
			'email'    => 'required|email|max:150',
			'phone'    => 'required|max:20',
			'subject'  => 'required|max:500',
			'message'  => 'required|max:1500'
		);
		//Validating Data and Rules
		$validation=Validator::make($data,$rules);
		//Redirecting If Validated Failed
		if($validation->fails()){
			return redirect()->action([PortalController::class, 'contacts'])
            ->withErrors($validation); //With Error Messages
        }
        else{
        	if(auth::user()->utype == 1){
        		$contact = new contact;
        		$contact->name    = $data['username'];
        		$contact->email   = $data['email'];
        		$contact->phone   = $data['phone'];
        		$contact->subject = $data['subject'];
        		$contact->message = $data['message'];
        		if($contact->save()){
        			return redirect()->action([PortalController::class, 'contacts'])
	    		            ->with('message','Thanks for Your Message, We Will Get Back to You Soon!'); //With Error Messages
	    		        }
	    		    }else{
	    		    	return redirect()->action([PortalController::class, 'login']);
	    		    }
	    		}
	    	}
// Route to print student fees payment
	    	public function update_student_account(){
		// Checking Wether Logged In
	    		if(!Auth::check()){
	    			return redirect()->action([PortalController::class, 'login']);
	    		}
	    		else{
	    			$data=Input::all();
	    			$rules=array(	     
	    				'oldpassword' => 'required',
	    				'password'=>'required|min:5',
	    				'password_confirmation' => 'required|min:5',
	    			);
	    			$validation=Validator::make($data,$rules);
	    				//Redirecting If Not Validated
	    			if($validation->fails()){
	    				return redirect()->action([PortalController::class, 'profile'])
	    				->withErrors($validation);
	    			}
	    			$password = Hash::make($data['password']);
	    			$user = users::where("id",'=',$data['id'])
	    			->update(array(
	    				'password' => $password ));
	    			if($user)
	    			{
	    				return redirect()->action([PortalController::class, 'profile'])
	    				->with("message","Password Successfully updated!");
	    			}
	    			else{
	    				return redirect()->action([PortalController::class, 'profile'])
	    				->with("error","Password  updated failed");
	    			}
	    		}
	    	} 
	    }