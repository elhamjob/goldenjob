<?php
namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\model\page;
use App\model\apply;
use App\model\programs;
use App\model\activities;
use App\model\gallery;
use App\model\contact;
use App\model\info;
use App\model\publications;
use App\model\slider;
use App\model\users;
use App\model\actypes;
use App\model\program;
use App\model\mainnav;
use App\model\rfqs;
use App\model\rfps;
use App\model\features;
use App\model\scholarships;
use App\model\forms;
use App\model\states;
use App\model\jobs;
use DB;
class FrontController extends Controller
{
	public function index()
	{
		
      
		$gallery = gallery::orderBy('id', 'DESC')->limit(6)->get();
		$jobs = jobs::orderBy('id', 'DESC')->paginate(12);
		return view('website.front_index_en')
		->with('gallery', $gallery)
		->with('jobs', $jobs);
	}

	public function requestforqutaions()
	{
		$rfqs = rfqs::orderBy('id', 'DESC')->paginate(12);
		return view('website.rfqs')
		->with('rfps', $rfqs);
	}
	public function scholarships()
	{
		$scholarships = scholarships::orderBy('id', 'DESC')->paginate(12);
		return view('website.scholarships')
		->with('scholarships', $scholarships);
	}
	public function appplicationforms()
	{
		$appplicationforms = forms::orderBy('id', 'DESC')->paginate(12);
		return view('website.appplicationforms')
		->with('applicationforms', $appplicationforms);
	}
	public function jobdetails($id)
	{
		$job = jobs::where('id', '=',$id)->orderBy('id', 'DESC')->first();	
		return view('website.jobdetails')
		->with('job', $job);
	}
	public function rfpdetails($id)
	{
		$rfps = rfps::where('id', '=',$id)->orderBy('id', 'DESC')->first();	
		return view('website.rfpdetails')
		->with('rfps', $rfps);
	}
	public function rfqdetails($id)
	{
		$rfps = rfqs::where('id', '=',$id)->orderBy('id', 'DESC')->first();	
		return view('website.rfqdetails')
		->with('rfps', $rfps);
	}
	

	public function searchs()
	{
		$data = Input::all();
		$scholarships = scholarships::where('title', 'LIKE',"%".$data['title']."%")
	    ->paginate(1200);	
	    $applicationforms = forms::where('title', 'LIKE',"%".$data['title']."%")
		    ->paginate(1200);
		    $rfps = rfps::where('title', 'LIKE',"%".$data['title']."%")
		    ->paginate(1200);	
		     $rfqs = rfqs::where('title', 'LIKE',"%".$data['title']."%")
		    ->paginate(1200);
		    $jobs = jobs::where('title', 'LIKE',"%".$data['title']."%")->orderBy('id', 'DESC')->paginate(1200);	
	    
		return view('website.searchs')
		->with('scholarships', $scholarships)
		->with('rfps', $rfps)
		->with('rfqs', $rfqs)
		->with('jobs', $jobs)
		->with('applicationforms', $applicationforms);
	}
	public function filterjobs()
	{
		$data = Input::all();
		$jobs = jobs::where('title', 'LIKE',"%".$data['title']."%")
		->where('category', 'LIKE',"%".$data['cat']."%")
		->where('city', 'LIKE',"%".$data['location']."%")
		
		->orderBy('id', 'DESC')->paginate(1200);	
		return view('website.filterjobs')
		->with('jobs', $jobs);
	}
	public function searchscholarships()
	{
		$data = Input::all();
		if($data['from'] !=''and $data['to'] !='')
		{
		    $scholarships = scholarships::where('start_date', '>=',$data['from'])
		    ->where('start_date', '<=',$data['to'])
		    ->where('title', 'LIKE',"%".$data['title']."%")
		    ->paginate(1200);	
		}else
		{
			$scholarships = scholarships::where('title', 'LIKE',"%".$data['title']."%")
		    ->paginate(1200);	
		}
		return view('website.scholarships')
		->with('scholarships', $scholarships);
	}
	public function searchpublications()
	{
		$data = Input::all();
		if($data['from'] !=''and $data['to'] !='')
		{
		    $scholarships = publications::where('start_date', '>=',$data['from'])
		    ->where('start_date', '<=',$data['to'])
		    ->where('title', 'LIKE',"%".$data['title']."%")
		    ->paginate(1200);	
		}else
		{
			$scholarships = publications::where('title', 'LIKE',"%".$data['title']."%")
		    ->paginate(1200);	
		}
		return view('website.scholarships')
		->with('scholarships', $scholarships);
	}

	public function searchforms()
	{
		$data = Input::all();
		if($data['from'] !=''and $data['to'] !='')
		{
		    $appplicationforms = forms::where('start_date', '>=',$data['from'])
		    ->where('start_date', '<=',$data['to'])
		    ->where('title', 'LIKE',"%".$data['title']."%")
		    ->paginate(1200);	
		}else
		{
			$appplicationforms = forms::where('title', 'LIKE',"%".$data['title']."%")
		    ->paginate(1200);	
		}
		return view('website.appplicationforms')
		->with('applicationforms', $appplicationforms);
	}


	public function requestforproposals()
	{
		$rfps = rfps::orderBy('id', 'DESC')->paginate(12);
		return view('website.rfps')
		->with('rfps', $rfps);
	}
	public function jobs()
	{
		$jobs = jobs::orderBy('id', 'DESC')->paginate(12);
		return view('website.jobs')
		->with('jobs', $jobs);
	}
	public function searchrfps()
	{
		$data = Input::all();
		if($data['from'] !=''and $data['to'] !='')
		{
		    $rfps = rfps::where('start_date', '>=',$data['from'])
		    ->where('start_date', '<=',$data['to'])
		    ->where('title', 'LIKE',"%".$data['title']."%")
		    ->paginate(1200);	
		}else
		{
			$rfps = rfps::where('title', 'LIKE',"%".$data['title']."%")
		    ->paginate(1200);	
		}
		return view('website.rfps')
		->with('rfps', $rfps);
	}
	public function searchrfqs()
	{
		$data = Input::all();
		if($data['from'] !=''and $data['to'] !='')
		{
		    $rfps = rfqs::where('start_date', '>=',$data['from'])
		    ->where('start_date', '<=',$data['to'])
		    ->where('title', 'LIKE',"%".$data['title']."%")
		    ->paginate(1200);	
		}else
		{
			$rfps = rfqs::where('title', 'LIKE',"%".$data['title']."%")
		    ->paginate(1200);	
		}
		return view('website.rfqs')
		->with('rfps', $rfps);
	}
	public function details_feature($id){
		$features = features::where('id', $id)->first();
		$all_feature = features::where('is_deleted', 0)->orderBy('id', 'desc')->get();
		return view('website.featured_details')->with('features',$features)->with('allfeatures',$all_feature);
	}
	public function city($id){
		$city = states::where('country_id', $id)->get();
		return view('website.city')->with('city',$city);
	}
	public function gallery_page(){
		$gallery = gallery::orderBy('id', 'DESC')->get();
		return view('website.gallerypage')
		->with('gallery', $gallery);
	}
	//Contact Page Function
	public function contacts()
	{
		//Returning contact page as View with above queries
		return view('website.contacts');
	}
		//Contact Page Function
	public function PrivacyPolicy()
	{
		//Returning contact page as View with above queries
		return view('website.PrivacyPolicy');
	}
	public function signup()
	{
		//Returning contact page as View with above queries
		return view('website.signup');
	}
	//Posting Contact to Database Function
	public function post_contact()
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
			return redirect()->action([FrontController::class, 'contact'])
            ->withErrors($validation); //With Error Messages
        }
        $contact = new contact;
        $contact->name    = $data['username'];
        $contact->email   = $data['email'];
        $contact->phone   = $data['phone'];
        $contact->subject = $data['subject'];
        $contact->message = $data['message'];
        if($contact->save()){
			return  Redirect()->back()->with("message",'Thanks for Your Message, We Will Get Back to You Soon!'); //With Error Messages
		}
	}
	//Posting post_signup_asseeker to Database Function
	public function post_signup_asseeker()
	{
		//Requesting Post Data
		$data=Input::all();
		//Assigning Rules to Inputs
		$rules=array(
			'first_name' => 'required|max:100',
			'email'    => 'required|email|max:150',
			'mobile'    => 'required|max:20',
			'password'  => 'required|max:500',
			'city'  => 'required|max:1500'
		);
		//Validating Data and Rules
		$validation=Validator::make($data,$rules);
		//Redirecting If Validated Failed
		if($validation->fails()){
			return redirect()->back()
            ->withErrors($validation); //With Error Messages
        }
        if(Input::hasFile('image')){
					//Uploading Image
        	$file = Input::file('image');
        	$destinationPath = 'images/users/';
        	$filename = Str::random(10).'.'.$file->getClientOriginalExtension();
        	Input::file('image')->move($destinationPath, $filename);
        }
        $password = hash::make($data['password']);
        $users = new users;
        $users->name    = $data['first_name'];
        $users->email   = $data['email'];
        $users->phone   = $data['mobile'];
        $users->last_name = $data['last_name'];
        $users->country = $data['country'];
        $users->city = $data['city'];
        $users->address = $data['address'];
        $users->zipcode = $data['zipcode'];
        $users->dob = $data['dob'];
        $users->zipcode = $data['zipcode'];
        $users->image = $filename;
        $users->password = $password;
        $users->type = 2;
        if($users->save()){
			return  Redirect()->back()->with("message",'Thanks for Joining!'); //With Error Messages
		}
	}
	public function post_signup_asemployer()
	{
		//Requesting Post Data
		$data=Input::all();
		//Assigning Rules to Inputs
		$rules=array(
			'first_name' => 'required|max:100',
			'email'    => 'required|email|max:150',
			'mobile'    => 'required|max:20',
			'password'  => 'required|max:500',
		);
		//Validating Data and Rules
		$validation=Validator::make($data,$rules);
		//Redirecting If Validated Failed
		if($validation->fails()){
			return redirect()->back()
            ->withErrors($validation); //With Error Messages
        }
        if(Input::hasFile('image')){
					//Uploading Image
        	$file = Input::file('image');
        	$destinationPath = 'images/users/';
        	$filename = Str::random(10).'.'.$file->getClientOriginalExtension();
        	Input::file('image')->move($destinationPath, $filename);
        }
        $password = hash::make($data['password']);
        $users = new users;
        $users->name    = $data['first_name'];
        $users->email   = $data['email'];
        $users->phone   = $data['mobile'];
        $users->last_name = $data['last_name'];
        $users->country = $data['country'];
        $users->company = $data['company'];
        $users->address = $data['address'];
        $users->company_details = $data['company_details'];
        $users->company_type = $data['company_type'];
        $users->image = $filename;
        $users->password = $password;
        $users->type = 1;
        if($users->save()){
			return  Redirect()->back()->with("message",'Thanks for Joining!'); //With Error Messages
		}
	}
	//Activities Page Function
	public function activities($id)
	{
		//Getting Data From Database
		$actypes = actypes::where('id',$id)->first(); //Activity Types
		$activities = activities::where('type', $id)
		->orderBy('date','desc')->paginate(8); //Activities in reverse order
		//Returning activity page as View with above queries
		return view('website.activities')
		->with('type', $actypes)
		->with('urlpages', $activities);
	}
	public function url($url,$id)
	{
		//Getting Data From Database
		$actypes = mainnav::where('url',$id)->first(); //Activity Types
		$activities = activities::where('type', $actypes->id)->orderBy('date','desc')->paginate(8); //Activities in reverse order
		//Returning activity page as View with above queries
		return view('website.activities')
		->with('type', $actypes)
		->with('activities', $activities);
	}
	public function pub($url,$id)
	{
		//Getting Data From Database
		$actypes = mainnav::where('url',$id)->first(); //Activity Types
		$publications = publications::where('type', $actypes->id)->orderBy('start_date','desc')->paginate(8); //Activities in reverse order
		//Returning activity page as View with above queries
		return view('website.publications')
		->with('type', $actypes)
		->with('publications', $publications);
	}
	public function inside()
	{
		//Getting Data From Database
		$gallery = gallery::orderBy('date','desc')->paginate(8); //Activities in reverse order
		//Returning activity page as View with above queries
		return view('website.inside')
		->with('gallery', $gallery);
	}
	public function team()
	{
		//Getting Data From Database
		$team = features::orderby('id','asc')->paginate(22); //Activities in reverse order
		//Returning activity page as View with above queries
		return view('website.team')
		->with('team', $team);
	}
	//Specific Activity Page Function
	public function activity($id)
	{
		//Getting Data From Database
		$actypes = actypes::All(); //Activity Types
		$activity = activities::where('id','=',$id)->first(); //Activities in reverse order
		//Returning index page as View with above queries
		return view('website.activity')
		->with('actypes', $actypes)
		->with('activity', $activity);
	}
	public function schoraship($id)
	{
		//Getting Data From Database
		$actypes = actypes::All(); //Activity Types
		$schoraship = scholarships::where('id','=',$id)->first(); //Activities in reverse order
		//Returning index page as View with above queries
		return view('website.scholarship')
		->with('actypes', $actypes)
		->with('schoraship', $schoraship);
	}
	
	//Program Page Function
	public function program($id)
	{
	   // echo $id;exit;
		$programs = DB::connection('mysql')->select("SELECT * FROM programs where id=$id");
		$allprogram =DB::connection('mysql')->select("SELECT * FROM programs ORDER BY id DESC");
// 		print_r($programs);exit;
		//Returning index page as View with above queries
		return view('website.program')
		->with('allprogram',$allprogram)
		->with('$programs',$programs)
		->with('program', $id);
	}
	//tab Page Function
	public function tab($id)
	{
	   // echo $id;exit;
		$tab = tabs::where('id',$id)->first();
		return view('website.tab')
		->with('tab',$tab);
	}
	public function page($url, $menu){
		$mainnav = mainnav::where('url','=',$url)->first();
		$pages = page::where('mid','=', $mainnav->id)->where('menu','=',$menu)->first();
		return view('website.page')
		->with('page', $pages)
		->with('nav', $mainnav);
	}
	public function videos(){
		$videos = videos::orderBy('id','desc')->paginate(8);
		return view('website.videos')
		->with('videos', $videos);
	}
	public function alumni(){
		$alumni = alumni::orderBy('id','desc')->paginate(10);
		return view('website.alumni')
		->with('alumni', $alumni);
	}
	public function apply(){
		if(!Auth::check()){
			return redirect()->back();
		}
		// Requesting Post Data and Validating
		$data=Input::all();
		$rules=array(	     
			'file' => 'required',
		);
		$validation=Validator::make($data,$rules);
		//Redirecting If Not Validated
		if($validation->fails()){
			return Redirect::back()
			->withErrors($validation);
		}
		if(Input::hasFile('file')){
					//Uploading Image
        	$file = Input::file('file');
        	$destinationPath = 'images/applyfiles/';
        	$filename = Str::random(10).'.'.$file->getClientOriginalExtension();
        	Input::file('file')->move($destinationPath, $filename);
        }
		 $apply = new apply;
        $apply->projectid = $data['id'];
        $apply->file = $filename;
        $apply->type = $data['type'];
        $apply->created_by = Auth::user()->id;
        if($apply->save()){
		return Redirect::back()
		->with('message','You   Successfully Applied! ');
	}
}
	public function changelang($lang){
		setcookie('lang', $lang , time() + (86400 * 30), "/");
		return Redirect::back();
	}
	public function deputy_details($id){
		$deputy = subdeputy::where('id', $id)->first();
		return view('website.deputy_details')->with('deputy',$deputy);
	}
}