<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\model\page;
use App\model\programs;
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
use App\model\features;
use App\model\gallery;
use App\model\deputy;
use App\model\credits;
use App\model\tabs;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
class AdminController extends Controller
{   //Function to login view
    public function login()
    {
        return view('admin.login');
    }
    //Loging in method for checking password and message and signing in - Start
    public function loginfunction(){
        $data = request()->all();
        $rules = [
            'email'    => 'required|email',
            'password' => 'required|min:5',
        ];
        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            return redirect()->action([AdminController::class, 'login'])->withErrors($validation);
        }
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $utype = (int) Auth::user()->utype;
            if ($utype === 0) {
                return redirect()->action([AdminController::class, 'index']);
            }
            Auth::logout();
            return redirect()->action([AdminController::class, 'login'])->withErrors('Access denied. utype=' . $utype);
        }
        return redirect()->action([AdminController::class, 'login'])->withErrors('Your email or password is wrong! Please try again.');
    }   
	 //Sign Out Function
	public function logout(){
		if(Auth::check()){
		Auth::logout();
		return redirect()->action([AdminController::class, 'login']);
		}
		return Redirect::action('UserController@login');
		
	}
	//Admin Dashboard
	public function index(){
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
		}
		if(auth::user()->utype == 0){
			$pages = page::count();
			$programs = programs::count();
			$activities = activities::count();
			$contacts = contact::count();
			return view('admin.index')
			->with('pages',$pages)
			->with('programs',$programs)
			->with('acs',$activities)
			->with('contacts',$contacts);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
	}
	//Slider Management Page
	public function slider()
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	     if(auth::user()->utype == 0){
		$slider = slider::orderBy('id','desc')->get();
		return view('admin.slider')
		->with('slider', $slider);
	}
	return redirect()->action([AdminController::class, 'login']);
	}

	
	
	//Insert a new slide
	public function post_slider(){
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
		}else{
			if(auth::user()->utype == 0){
				 $data=Input::all();
		$rules=array(	     
		'title_en'=>'required',
		'title_fa'=>'required',
		'text_english'=>'required',
		'text_farsi'=>'required',
		'photo'=>'required',
		'link'=>'required'
		);
		
		$validation=Validator::make($data,$rules);
		if($validation->fails()){
			return redirect()->action([AdminController::class, 'slider'])->withErrors($validation);
		}
		
		//Uploading Image
		$file = Input::file('photo');
		$destinationPath = 'images/main-slider/';
        $filename = Str::random(10).'-'.Auth::user()->id.'.'.$file->getClientOriginalExtension();
        Input::file('photo')->move($destinationPath, $filename);
		
		$slider = new slider;
		$slider->text_en = $data['text_english'];
		$slider->text_fa = $data['text_farsi'];
		$slider->heading_en = $data['title_en'];
		$slider->heading_fa = $data['title_fa'];
		$slider->photo = $filename;
		$slider->link = $data['link'];
		$slider->save();
		return redirect()->action([AdminController::class, 'slider'])->with('message','Slider successfully saved!');
			}else{
				return redirect()->action([AdminController::class, 'login']);
			}
		}
		
	}

	public function post_slider_update(){
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
		}else{
			if(auth::user()->utype == 0){
				 $data=Input::all();
		$rules=array(	     
		'title_fa'=>'required',
		'title_en'=>'required',
		'text_english'=>'required',
		'text_farsi'=>'required',
		'photo'=>'required',
		'link'=>'required'
		);
		
		$validation=Validator::make($data,$rules);
		if($validation->fails()){
			return redirect()->action([AdminController::class, 'edit_slider'],$data['id'])->withErrors($validation);
		}

		//Uploading Image
		if(Input::hasFile('photo')){
		$file = Input::file('photo');
		$destinationPath = 'images/main-slider/';
        $filename = Str::random(10).'-'.Auth::user()->id.'.'.$file->getClientOriginalExtension();
        Input::file('photo')->move($destinationPath, $filename);
          }
		
		$slider =slider::find($data['id']);
		$slider->heading_en = $data['title_en'];
		$slider->heading_fa = $data['title_fa'];
		$slider->text_en = $data['text_english'];
		$slider->text_fa = $data['text_farsi'];
		if(Input::hasFile('photo')){
		$slider->photo = $filename;
	     }
		$slider->link = $data['link'];
		$slider->save();
		return redirect()->action([AdminController::class, 'slider'])->with('message','Slider successfully Updated!');
			}else{
				return redirect()->action([AdminController::class, 'login']);
			}
		}
		
	}
	
	//Delete Slider
	public function delete_slider($id)
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }else{
	    	if(auth::user()->utype == 0){
				$slider = slider::where('id','=',$id)->delete();
		    return redirect()->action([AdminController::class, 'slider']);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}

	    }
	}
	
	//General Info
	public function general_info()
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	    if(auth::user()->utype == 0){
				$info = info::first();
				return view('admin.general_info')
				->with('info', $info);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
	}
	
	//Post General Info to Database
	public function post_info(){
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
		}
		  if(auth::user()->utype == 0){
				$data=Input::all();
		$rules=array(	     
		'address_english'=>'required',
		'address_farsi'=>'required',
		'email'=>'required|email',
		'phone'=>'required',
		);
		
		$validation=Validator::make($data,$rules);
		if($validation->fails()){
			return Redirect::back()->withErrors($validation);
		}
		
		
		$info = info::find(1);
		$info->address_en = $data['address_english'];
		$info->address_fa = $data['address_farsi'];
		$info->about_en = $data['about_english'];
		$info->about_fa = $data['about_farsi'];
		$info->facebook = $data['facebook'];
		$info->youtube = $data['youtube'];
		$info->skype = $data['skype'];
		$info->twiter = $data['twiter'];
		$info->phone = $data['phone'];
		$info->email = $data['email'];
		$info->save();
		return Redirect::back()->with('message','Info successfully saved!');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
	}
	
	//Facts Management
	public function facts()
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	    if(auth::user()->utype == 0){
				$facts = homefacts::first();
				return view('admin.facts')
				->with('fact', $facts);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	
	//Post General Facts at homepage
	public function post_facts(){
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
		}
		 if(auth::user()->utype == 0){
				$data=Input::all();
				$rules=array(	     
				'fact'=>'required|numeric',
				'facto'=>'required|numeric',
				'factt'=>'required|numeric',
				'factth'=>'required|numeric',

				'fact_fa'=>'required',
				'facto_fa'=>'required',
				'factt_fa'=>'required',
				'factth_fa'=>'required',
				'fact_en'=>'required',
				'facto_en'=>'required',
				'factt_en'=>'required',
				'factth_en'=>'required',
				);
				
				$validation=Validator::make($data,$rules);
				if($validation->fails()){
					return Redirect::back()->withErrors($validation);
				}
				
				
				$facts = homefacts::first();
				$facts->fact_en = $data['fact_en'];
				$facts->fact_fa = $data['fact_fa'];
				$facts->fact = $data['fact'];
				$facts->facto_en = $data['facto_en'];
				$facts->facto_fa = $data['facto_fa'];
				$facts->facto = $data['facto'];
				$facts->factt_en = $data['factt_en'];
				$facts->factt_fa = $data['factt_fa'];
				$facts->factt = $data['factt'];
				$facts->factth_en = $data['factth_en'];
				$facts->factth_fa = $data['factth_fa'];
				$facts->factth = $data['factth'];
				$facts->save();
				return Redirect::back()->with('message','Facts successfully saved!');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	
	//Facts Management
	public function contacts()
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	     if(auth::user()->utype == 0){
				$contacts = contact::orderBy('id','desc')->paginate(9);
						return view('admin.contacts')
						->with('contacts', $contacts);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
	}
	
	//Delete Contacts
	public function delete_contacts($id)
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	     if(auth::user()->utype == 0){
				$contact = contact::where('id','=',$id)->delete();
						return redirect()->action([AdminController::class, 'contacts'])
						->with('message','Message Successfully Deleted');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	
	//Add a New Page
	public function add_activity()
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	    if(auth::user()->utype == 0){
				$actypes = mainnav::where('sub',">",1)->get();
						return view('admin.add_activity')
						->with('actypes', $actypes);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
	}
	
	//Insert a new page
	public function post_activity(){
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
		}
		if(auth::user()->utype == 0){
				$data=Input::all();
				$rules=array(	     
				'heading_english'=>'required',
				'heading_farsi'=>'required',
				'text_english'=>'required',
				'text_farsi'=>'required',
				'photo'=>'required',
				'type'=>'required'
				);
				
				$validation=Validator::make($data,$rules);
				if($validation->fails()){
					return Redirect::back()->withErrors($validation);
				}
				
				//Uploading Image
				$file = Input::file('photo');
				$destinationPath = 'images/blogs/';
		        $filename = Str::random(10).'-'.Auth::user()->id.'.'.$file->getClientOriginalExtension();
		        Input::file('photo')->move($destinationPath, $filename);
				
				$activity = new activities;
				$activity->heading_en = $data['heading_english'];
				$activity->heading_fa = $data['heading_farsi'];
				$activity->text_en = $data['text_english'];
				$activity->text_fa = $data['text_farsi'];
				$activity->photo = $filename;
				$activity->date = $data['activity_date'];
				$activity->type = $data['type'];
				$activity->save();
				return redirect()->action([AdminController::class, 'activities'])->with('message','Page successfully saved!');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	
	//Facts Management
	public function activities()
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	     if(auth::user()->utype == 0){
				$activities = activities::orderBy('id','desc')->paginate(10);
						return view('admin.activities')
						->with('activities', $activities);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
	}
		public function activitiesli($type)
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	     if(auth::user()->utype == 0){
				$activities = activities::where('type',$type)->orderBy('id','desc')->paginate(10);
						return view('admin.activities')
						->with('activities', $activities);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
	}
	
	//Delete Contacts
	public function delete_activity($id)
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	    if(auth::user()->utype == 0){
				$activities = activities::where('id','=',$id)->delete();
						return redirect()->action([AdminController::class, 'activities'])
						->with('message','Activity Successfully Deleted');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
	}
	
	//Edit Page
	public function edit_activity($id)
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	    if(auth::user()->utype == 0){
				$actypes = mainnav::where('sub',">",1)->get();
						$activity = activities::where('id','=',$id)->first();
						return view('admin.edit_activity')
						->with('actypes', $actypes)
						->with('activity', $activity);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
	}
	
	//Edit page
	public function post_edit_activity(){
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
		}
		 if(auth::user()->utype == 0){
				$data=Input::all();
				$rules=array(	     
				'pid' => 'required|numeric',
				'title_english'=>'required',
				'title_farsi'=>'required',
				'text_english'=>'required',
				'text_farsi'=>'required',
				'type'=>'required'
				);
				
				$validation=Validator::make($data,$rules);
				if($validation->fails()){
					return Redirect::back()->withErrors($validation);
				}
				
				if(Input::hasFile('photo')){
				//Uploading Image
				$file = Input::file('photo');
				$destinationPath = 'images/blogs/';
		        $filename = Str::random(10).'-'.Auth::user()->id.'.'.$file->getClientOriginalExtension();
		        Input::file('photo')->move($destinationPath, $filename);
				}
				$act = activities::find($data['pid']);
				$act->heading_en = $data['title_english'];
				$act->heading_fa = $data['title_farsi'];
				$act->text_en = $data['text_english'];
				$act->text_fa = $data['text_farsi'];
				$act->date = $data['activity_date'];
				if(Input::hasFile('photo')){
				$act->photo = $filename;
				}
				$act->type = $data['type'];
				$act->save();
				return redirect()->action([AdminController::class, 'activities'])->with('message','Activity successfully saved!');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	
	///////////////////////////////////////////////////////////////////////////////////////////////////
	
	//Add a New Page
	public function add_pages()
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	     if(auth::user()->utype == 0){
				$mainnav = mainnav::All();
						return view('admin.add_pages')
						->with('nav', $mainnav);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	//Add a New Page
	public function menu_main()
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	     if(auth::user()->utype == 0){
				$mainnav = mainnav::All();
						return view('admin.menu_main')
						->with('nav', $mainnav);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	
	//Insert a new page
	public function post_page(){
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
		}
		 if(auth::user()->utype == 0){
				$data=Input::all();
				$rules=array(	     
				'title_english'=>'required',
				'title_farsi'=>'required',
				'text_english'=>'required',
				'text_farsi'=>'required',
				'photo'=>'required',
				'link'=>'required|alpha_dash|unique:pages,menu',
				'menu'=>'required'
				);
				
				$validation=Validator::make($data,$rules);
				if($validation->fails()){
					return Redirect::back()->withErrors($validation);
				}
				
				//Uploading Image
				$file = Input::file('photo');
				$destinationPath = 'images/page/';
		        $filename = Str::random(10).'-'.Auth::user()->id.'.'.$file->getClientOriginalExtension();
		        Input::file('photo')->move($destinationPath, $filename);
				
				$pages = new page;
				$pages->title_en = $data['title_english'];
				$pages->title_fa = $data['title_farsi'];
				$pages->text_en = $data['text_english'];
				$pages->text_fa = $data['text_farsi'];
				$pages->photo = $filename;
				$pages->menu = $data['link'];
				$pages->mid = $data['menu'];
				$pages->save();
				return redirect()->action([AdminController::class, 'pages'])->with('message','Page successfully saved!');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
	}
	
	//Facts Management
	public function pages()
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	    if(auth::user()->utype == 0){
				$pages = page::orderBy('id','desc')->paginate(10);
						return view('admin.pages')
						->with('pages', $pages);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	//Facts Management
	public function pages_menu($id)
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	    if(auth::user()->utype == 0){
				$pages = page::where('mid',$id)->orderBy('id','desc')->paginate(10);
						return view('admin.pages')
						->with('pages', $pages);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	
	//Delete Contacts
	public function delete_pages($id)
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	     if(auth::user()->utype == 0){
				$pages = page::where('id','=',$id)->delete();
						return redirect()->action([AdminController::class, 'pages'])
						->with('message','Page Successfully Deleted');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	
	//Edit Page
	public function edit_pages($id)
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	    if(auth::user()->utype == 0){
				$nav = mainnav::All();
				$page = page::where('id','=',$id)->first();
				return view('admin.edit_pages')
				->with('page', $page)
				->with('nav', $nav);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
	}
	
	//Edit page
	public function post_edit_page(){
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
		}
		if(auth::user()->utype == 0){
				$data=Input::all();
				$rules=array(	     
				'pid' => 'required|numeric',
				'title_english'=>'required',
				'title_farsi'=>'required',
				'text_english'=>'required',
				'text_farsi'=>'required',
				'menu'=>'required'
				);
				
				$validation=Validator::make($data,$rules);
				if($validation->fails()){
					return Redirect::back()->withErrors($validation);
				}
				
				if(Input::hasFile('photo')){
				//Uploading Image
				$file = Input::file('photo');
				$destinationPath = 'images/page/';
		        $filename = Str::random(10).'-'.Auth::user()->id.'.'.$file->getClientOriginalExtension();
		        Input::file('photo')->move($destinationPath, $filename);
				}
				$pages = page::find($data['pid']);
				$pages->title_en = $data['title_english'];
				$pages->title_fa = $data['title_farsi'];
				$pages->text_en = $data['text_english'];
				$pages->text_fa = $data['text_farsi'];
				if(Input::hasFile('photo')){
				$pages->photo = $filename;
				}
				$pages->mid = $data['menu'];
				$pages->save();
				return redirect()->action([AdminController::class, 'pages'])->with('message','Page successfully saved!');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
	}
	
	///////////////////////////////////////////////////////////////////////////////////////////////////
	
	//Add a New Page
	public function add_program()
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	    if(auth::user()->utype == 0){
				$actypes = actypes::All();
						return view('admin.add_program')
						->with('actypes', $actypes);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	//Add a tabs
	public function tabs()
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	    if(auth::user()->utype == 0){
				$tabs = tabs::All();
						return view('admin.tabs')
						->with('tabs', $tabs);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	//Insert a new page
	public function post_program(){
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
		}
		 if(auth::user()->utype == 0){
				$data=Input::all();
				$rules=array(	     
				'heading_english'=>'required',
				'heading_farsi'=>'required',
				'text_english'=>'required',
				'text_farsi'=>'required',
				'photo'=>'image',
				'main_page'=>'required|numeric',
				'program_sub'=>'required'
				);
				
				$validation=Validator::make($data,$rules);
				if($validation->fails()){
					return Redirect::back()->withErrors($validation);
				}
				
				//Uploading Image
				$file = Input::file('photo');
				$destinationPath = 'images/programs/';
		        $filename = Str::random(10).'-'.Auth::user()->id.'.'.$file->getClientOriginalExtension();
		        Input::file('photo')->move($destinationPath, $filename);
				
				$programs = new programs;
				$programs->title_en = $data['heading_english'];
				$programs->title_fa = $data['heading_farsi'];
				$programs->text_en = $data['text_english'];
				$programs->text_fa = $data['text_farsi'];
				$programs->photo = $filename;
				$programs->main_page = $data['main_page'];
				$programs->under = $data['program_sub'];
				$programs->save();
				return redirect()->action([AdminController::class, 'programs'])->with('message','Program successfully saved!');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	
	//Insert a new page
	public function post_program_sub(){
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
		}
		 if(auth::user()->utype == 0){
				$data=Input::all();
				$rules=array(	     
				'name_en'=>'required',
				'name_fa'=>'required',
				);
				
				$validation=Validator::make($data,$rules);
				if($validation->fails()){
					return Redirect::back()->withErrors($validation);
				}
				
				$programs = new program;
				$programs->name_en = $data['name_en'];
				$programs->name_fa = $data['name_fa'];
				$programs->save();
				return redirect()->action([AdminController::class, 'program_sub'])->with('message','Program successfully saved!');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	//Insert a new page
	public function postmain_menu(){
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
		}
		 if(auth::user()->utype == 0){
				$data=Input::all();
				$rules=array(	     
				'name_en'=>'required',
				'name_fa'=>'required',
				);
				
				$validation=Validator::make($data,$rules);
				if($validation->fails()){
					return Redirect::back()->withErrors($validation);
				}
				
				$programs = new mainnav;
				$programs->menu = $data['name_en'];
				$programs->menu_fa = $data['name_fa'];
				$programs->url = $data['url'];
				$programs->sub = $data['sub'];
				$programs->save();
				return redirect()->action([AdminController::class, 'menu_main'])->with('message','mainnav successfully saved!');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	//Insert a new page
	public function edit_program_sub(){
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
		}
		 if(auth::user()->utype == 0){
				$data=Input::all();
				$rules=array(	     
				'name_en'=>'required',
				'name_fa'=>'required',
				);
				
				$validation=Validator::make($data,$rules);
				if($validation->fails()){
					return redirect()->action([AdminController::class, 'program_sub'])->withErrors($validation);
				}
				
				$programs = program::find($data['id']);
				$programs->name_en = $data['name_en'];
				$programs->name_fa = $data['name_fa'];
				$programs->save();
				return redirect()->action([AdminController::class, 'program_sub'])->with('message','Program successfully saved!');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	
	//Facts Management
	public function programs()
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	    if(auth::user()->utype == 0){
				$programs = programs::orderBy('id','desc')->paginate(10);
						return view('admin.programs')
						->with('programs', $programs);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	
	//Programs Sub Management
	public function program_sub()
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	     if(auth::user()->utype == 0){
				$program = program::orderBy('id','desc')->get();
						return view('admin.program_sub')
						->with('program', $program);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	
	//Delete Contacts
	public function delete_program_sub($id)
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	    if(auth::user()->utype == 0){
				$program = program::where('id','=',$id)->delete();
						return redirect()->action([AdminController::class, 'program_sub'])
						->with('message','Program Sub Menu Successfully Deleted');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
	}
	public function delete_program_tab($id)
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	    if(auth::user()->utype == 0){
				$program = tabs::where('id','=',$id)->delete();
						return redirect()->action([AdminController::class, 'tabs'])
						->with('message','tab  Menu Successfully Deleted');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
	}
	//Delete Contacts
	public function delete_menu($id)
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	    if(auth::user()->utype == 0){
				$program = mainnav::where('id','=',$id)->delete();
						return redirect()->action([AdminController::class, 'program_sub'])
						->with('message','mainnav  Successfully Deleted');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
	}
	
	//Delete Contacts
	public function delete_program($id)
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	    if(auth::user()->utype == 0){
			$programs = programs::where('id','=',$id)->delete();
					return redirect()->action([AdminController::class, 'programs'])
					->with('message','Program Successfully Deleted');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	
	//Edit Page
	public function edit_program($id)
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	     if(auth::user()->utype == 0){
			$program = programs::where('id','=',$id)->first();
					return view('admin.edit_program')
					->with('program', $program);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
	}
	
	//Edit page
	public function post_edit_program(){
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
		}
		if(auth::user()->utype == 0){
			$data=Input::all();
			$rules=array(	     
			'pid' => 'required|numeric',
			'title_english'=>'required',
			'title_farsi'=>'required',
			'text_english'=>'required',
			'text_farsi'=>'required',
			'main_page'=>'required|numeric'
			);
			
			$validation=Validator::make($data,$rules);
			if($validation->fails()){
				return Redirect::back()->withErrors($validation);
			}
			
			if(Input::hasFile('photo')){
			//Uploading Image
			$file = Input::file('photo');
			$destinationPath = 'images/programs/';
	        $filename = Str::random(10).'-'.Auth::user()->id.'.'.$file->getClientOriginalExtension();
	        Input::file('photo')->move($destinationPath, $filename);
			}
			$pro = programs::find($data['pid']);
			$pro->title_en = $data['title_english'];
			$pro->title_fa = $data['title_farsi'];
			$pro->text_en = $data['text_english'];
			if($data['program_sub'] != ""){
				$pro->under = $data['program_sub'];
			}
			$pro->text_fa = $data['text_farsi'];
			if(Input::hasFile('photo')){
			$pro->photo = $filename;
			}
			$pro->main_page = $data['main_page'];
			$pro->save();
			return redirect()->action([AdminController::class, 'programs'])->with('message','Program successfully saved!');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	
	//Profile
	public function profile()
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	     if(auth::user()->utype == 0){
			$profile = users::where('id','=',Auth::user()->id)->first();
					return view('admin.profile')
					->with('profile', $profile);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	
	//Post Profile
	public function post_profile(){
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
		}
		if(auth::user()->utype == 0){
			$data=Input::all();
					$rules=array(	     
					'password'=>'required|min:5|confirmed|AlphaDash',
					'password_confirmation'=>'required|min:5|AlphaDash'
					);
					
					$validation=Validator::make($data,$rules);
					if($validation->fails()){
						return redirect()->action([AdminController::class, 'profile'])->withErrors($validation);
					}
					
					$password = hash::make($data['password']);
					$user = users::find(Auth::user()->id);
					$user->password = $password;
					$user->save();
					return redirect()->action([AdminController::class, 'profile'])->with('message','User successfully saved!');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	
	//Profile
	public function users()
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	     if(auth::user()->utype == 0){
			$users = users::where("utype","=",0)->get();
					return view('admin.users')
					->with('users', $users);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	public function users_credits()
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	     if(auth::user()->utype == 0){
			$credits = credits::orderBy("id",'desc')->get();
			$users = users::where("type","=",1)->get();
					return view('admin.users_credits')
					->with('credits', $credits)
					->with('users', $users);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	//Post User
	public function post_user_credit(){
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
		}
		 if(auth::user()->utype == 0){
			$data=Input::all();
			$rules=array(	     
			'amount' => "required",
			'user'=>'required',
			);
			
			$validation=Validator::make($data,$rules);
			if($validation->fails()){
				$this->quickFlash('Oops something went wrong?', 'danger');
                return Redirect::back();

			}
			
			$user = new credits;
			$user->user_id = $data['user'];
			$user->amount = $data['amount'];
			$user->date = $data['date'];
			$user->type = 1;
			$user->created_by = Auth::user()->id;
			$user->save();
			$this->quickFlash('Credits Successfully saved?', 'success');
                return Redirect::back();
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	public function delete_user_credit($id)
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	     if(auth::user()->utype == 0){
			$user = credits::where('id','=',$id)->delete();
				return Redirect::back()
				->with('message','Credits Successfully Deleted');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
	}
	//Post User
	public function post_user(){
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
		}
		 if(auth::user()->utype == 0){
			$data=Input::all();
			$rules=array(	     
			'email' => "required|email|unique:users,email",
			'password'=>'required|min:5|confirmed|AlphaDash',
			'password_confirmation'=>'required|min:5|AlphaDash'
			);
			
			$validation=Validator::make($data,$rules);
			if($validation->fails()){
				$this->quickFlash('Oops something went wrong?', 'danger');
                return Redirect::back();

			}
			
			$password = hash::make($data['password']);
			$user = new users;
			$user->email = $data['email'];
			$user->password = $password;
			$user->save();
			$this->quickFlash('User Successfully saved?', 'success');
                return Redirect::back();
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	//Delete Contacts
	public function delete_user($id)
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	     if(auth::user()->utype == 0){
			$user = users::where('id','=',$id)->first();
				if($user->main != '1'){
					$deluser = users::where('id','=',$id)->delete();
				}
				return Redirect::action('AdminController@users')
				->with('message','User Successfully Deleted');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
	}
	
	//Videos-------------------------------------------------------------------------------
	//Slider Management Page
	public function videos()
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
		if(auth::user()->utype == 0){
			$videos = videos::orderBy('id','desc')->get();
					return view('admin.videos')
					->with('videos', $videos);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
	}
	
	//Insert a new slide
	public function post_videos(){
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
		}
		if(auth::user()->utype == 0){
			$data=Input::all();
					$rules=array(	     
					'heading_english'=>'required',
					'heading_farsi'=>'required',
					'image'=>'required',
					'link'=>'required'
					);
					
					$validation=Validator::make($data,$rules);
					if($validation->fails()){
						return redirect()->action([AdminController::class, 'videos'])->withErrors($validation);
					}
					
					if(Input::hasFile('image')){
					//Uploading Image
					$file = Input::file('image');
					$destinationPath = 'images/videos/';
			        $filename = Str::random(10).'-'.Auth::user()->id.'.'.$file->getClientOriginalExtension();
			        Input::file('image')->move($destinationPath, $filename);
					}
					$video = new videos;
					$video->title_en = $data['heading_english'];
					$video->title_fa = $data['heading_farsi'];
					$video->image = $filename;
					$video->link = $data['link'];
					$video->save();
					return redirect()->action([AdminController::class, 'videos'])->with('message','Video successfully saved!');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
		//Insert a new slide
	public function post_tab(){
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
		}
		if(auth::user()->utype == 0){
			$data=Input::all();
					$rules=array(	     
					'heading_english'=>'required',
					'heading_farsi'=>'required',
					'image'=>'required',
					);
					
					$validation=Validator::make($data,$rules);
					if($validation->fails()){
						return redirect()->action([AdminController::class, 'tabs'])->withErrors($validation);
					}
					
					if(Input::hasFile('image')){
					//Uploading Image
					$file = Input::file('image');
					$destinationPath = 'images/videos/';
			        $filename = Str::random(10).'-'.Auth::user()->id.'.'.$file->getClientOriginalExtension();
			        Input::file('image')->move($destinationPath, $filename);
					}
					$video = new tabs;
					$video->pro = $data['pro'];
					$video->title_en = $data['heading_english'];
					$video->title_fa = $data['heading_farsi'];
					$video->text_en = $data['text_english'];
					$video->text_fa = $data['text_farsi'];
					$video->image = $filename;
					$video->save();
					return redirect()->action([AdminController::class, 'tabs'])->with('message','tab successfully saved!');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	
	
	//Delete Slider
	public function delete_videos($id)
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	    if(auth::user()->utype == 0){
			$video = videos::where('id','=',$id)->delete();
					return redirect()->action([AdminController::class, 'videos']);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
		
	}
	
	
	//Videos-------------------------------------------------------------------------------
	//Slider Management Page
	public function alumni()
	{
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
		if(auth::user()->utype == 0){
			$alumni = alumni::orderBy('id','desc')->get();
					return view('admin.alumni')
					->with('alumni', $alumni);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
		
	}
	





	//Edit Page
	public function edit_slider($id)
	{
	   // echo auth::user()->utype;exit;
		if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
	    if(auth::user()->utype == 0){
						$slider = slider::where('id','=',$id)->first();
						return view('admin.edit_slider')
						->with('slider', $slider);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
	}
	 public function quickFlash($message, $type = 'info')
    {
        if ($type == 'error') {
            $type = 'danger';
        }
        session()->flash('flash_message', [
            'message' => $message,
            'type'    => $type,
        ]);
    }
    public function features_list(){
        if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
		if(auth::user()->utype == 0){
			$features = features::where('is_deleted',0)->orderBy('id','desc')->get();
					return view('admin.features')
					->with('features', $features);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
    }
    public function new_feature(){
         if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
		if(auth::user()->utype == 0){
            $data = Input::all();
            $rules=array(
    			'title_en'=>'required',
    			'title_fa'=>'required'
			);
			
			$validation=Validator::make($data,$rules);
			if($validation->fails()){
				return redirect()->action([AdminController::class, 'features_list'])->withErrors($validation);
			}
            $new_feature = new features;
            $new_feature->title_en = $data['title_en'];
            $new_feature->title_fa = $data['title_fa'];
            $new_feature->description_en = $data['desc_en'];
            $new_feature->description_fa = $data['desc_fa'];
            $new_feature->feature_date = date("yy-M-d");
            $filename;
            if(Input::hasFile('image')){
        		$file = Input::file('image');
        		$destinationPath = 'images/feature-images/';
                $filename = Str::random(10).'-'.Auth::user()->id.'.'.$file->getClientOriginalExtension();
                Input::file('image')->move($destinationPath, $filename);
            }else{
                $filename = '';
            }
            $new_feature->image = $filename;
            $new_feature->created_by = Auth::user()->id;
            if( $new_feature->save()){
                return redirect()->action([AdminController::class, 'features_list'])->with('message','Feature successfully saved!');
            }else{
                return redirect()->action([AdminController::class, 'features_list'])->with('error','some error occured ');
            }
            
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
    }
    public function delete_feature($id){
        if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
		if(auth::user()->utype == 0){
            $selected_feature = features::where('id', $id)->update(array(
                    'is_deleted'=>1,
                    'deleted_date'=>date("yy-m-d"),
                    'deleted_by'=>Auth::user()->id
                ));
                return redirect()->action([AdminController::class, 'features_list'])->with('message','Feature successfully deleted!');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
    }
    public function edit_feature($id){
        if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
		if(auth::user()->utype == 0){
            $feature_info = features::where('id', $id)->first();
			return view("admin.edit_feature")->with("feature_info", $feature_info);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
    }
    public function update_feature(){
        if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
		if(auth::user()->utype == 0){
             $data = Input::all();
            $rules=array(
    			'title_en'=>'required',
    			'title_fa'=>'required'
			);
			
			$validation=Validator::make($data,$rules);
			if($validation->fails()){
				return redirect()->action([AdminController::class, 'features_list'])->withErrors($validation);
			}
            $update_feature = features::find($data['id']);
            $update_feature->title_en = $data['title_en'];
            $update_feature->title_fa = $data['title_fa'];
            $update_feature->description_en = $data['desc_en'];
            $update_feature->description_fa = $data['desc_fa'];
            if(Input::hasFile('image')){
        		$file = Input::file('image');
        		$destinationPath = 'images/feature-images/';
                $filename = Str::random(10).'-'.Auth::user()->id.'.'.$file->getClientOriginalExtension();
                Input::file('image')->move($destinationPath, $filename);
                $update_feature->image = $filename;
            }
            $update_feature->updated_by = Auth::user()->id;
            if($update_feature->save()){
                return redirect()->action([AdminController::class, 'features_list'])->with('message','Feature successfully updated!');
            }else{
                return redirect()->action([AdminController::class, 'features_list'])->with('error','Oooops, some error occured!');
            }
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
    }
    public function gallery_list(){
        if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
		if(auth::user()->utype == 0){
		    $photos = gallery::orderBy('id', 'DESC')->get();
	    	return view('admin.gallery')
				->with('gallery', $photos);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
    }
    public function new_gallery(){
        if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
		if(auth::user()->utype == 0){
		    $data = Input::all();
            $rules=array(
    			'images'=>'required'
			);
			$validation=Validator::make($data,$rules);
			if($validation->fails()){
				return redirect()->action([AdminController::class, 'gallery_list'])->withErrors($validation);
			}
                // $images=array();
                if($files=Input::file('images')){
                    foreach($files as $file){
                		$destinationPath = 'images/gallery/';
                        $filename = Str::random(10).'-'.Auth::user()->id.'.'.$file->getClientOriginalExtension();
                        $file->move($destinationPath, $filename);
                        $gallery = new gallery;
                        $gallery->file_name = $filename;
                        $gallery->save();
                    }
                    return redirect()->action([AdminController::class, 'gallery_list'])->with('message', 'Your photos successfully inserted to gallery');
                }else{
                    return redirect()->action([AdminController::class, 'gallery_list'])->with('error', 'Oooops, some error occured!');
                }
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
    }
    public function delete_photo($id){
        if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
		if(auth::user()->utype == 0){
		    $selected_photo = gallery::where('id', $id)->delete();
                return redirect()->action([AdminController::class, 'gallery_list'])->with('message','Phot successfully deleted from gallery!');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
    }
    public function deputy(){
        if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
		if(auth::user()->utype == 0){
		    $deputy = deputy::orderBy('id', 'DESC')->get();
		    return view('admin.deputy')
				->with('deputy', $deputy);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
    }
    public function adddeputy(){
        if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
		if(auth::user()->utype == 0){
		    $data = Input::all();
            $rules=array(
    			'name_en'=>'required',
    			'name_fa'=>'required'
			);
			$validation=Validator::make($data,$rules);
			if($validation->fails()){
				return redirect()->action([AdminController::class, 'deputy'])->withErrors($validation);
			}
			$deputy = new deputy;
			$deputy->name_fa = $data['name_fa'];
			$deputy->name_en = $data['name_en'];
			$deputy->description_fa = $data['desc_fa'];
			$deputy->description_en = $data['desc_en'];
                if($files=Input::file('image')){
                	$file = Input::file('image');
            		$destinationPath = 'images/deputy/';
                    $filename = Str::random(10).'-'.Auth::user()->id.'.'.$file->getClientOriginalExtension();
                    Input::file('image')->move($destinationPath, $filename);
                    $deputy->photo = $filename;
                }
            $deputy->created_by = Auth::user()->id;
            if($deputy->save()){
                return redirect()->action([AdminController::class, 'deputy'])->with('message', 'New deputy successfully added.');
            }else{
                return redirect()->action([AdminController::class, 'deputy'])->with('message', 'Oooops, some error occured.');
            }
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
    }
    public function deputy_delete($id){
        if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
		if(auth::user()->utype == 0){
            $selected_deputy = deputy::where('id', $id)->delete();
                return redirect()->action([AdminController::class, 'deputy'])->with('message','Deputy successfully deleted!');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
    }
    public function deputy_edit($id){
        if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
		if(auth::user()->utype == 0){
            $deputy_info = deputy::where('id', $id)->first();
			return view("admin.edit_deputy")->with("deputy_info", $deputy_info);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
    }
    public function deputy_update(){
        if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
		if(auth::user()->utype == 0){
             $data = Input::all();
            $rules=array(
    			'name_en'=>'required',
    			'name_fa'=>'required'
			);
			
			$validation=Validator::make($data,$rules);
			if($validation->fails()){
				return redirect()->action([AdminController::class, 'deputy'])->withErrors($validation);
			}
            $update_deputy = deputy::find($data['id']);
            $update_deputy->name_en = $data['name_en'];
            $update_deputy->name_fa = $data['name_fa'];
            $update_deputy->description_en = $data['desc_en'];
            $update_deputy->description_fa = $data['desc_fa'];
            if(Input::hasFile('image')){
        		$file = Input::file('image');
        		$destinationPath = 'images/deputy/';
                $filename = Str::random(10).'-'.Auth::user()->id.'.'.$file->getClientOriginalExtension();
                Input::file('image')->move($destinationPath, $filename);
                $update_deputy->photo = $filename;
            }
            $update_deputy->updated_by = Auth::user()->id;
            if($update_deputy->save()){
                return redirect()->action([AdminController::class, 'deputy'])->with('message','Deputy successfully updated!');
            }else{
                return redirect()->action([AdminController::class, 'deputy'])->with('error','Oooops, some error occured!');
            }
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
    }
    public function deputy_submenu(){
        if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
		if(auth::user()->utype == 0){
		    $subdeputy = subdeputy::orderBy('id', 'DESC')->get();
		    $deputy = deputy::orderBy('id', 'DESC')->get();
		    return view('admin.subdeputy')
				->with('subdeputy', $subdeputy)
				->with('deputy', $deputy);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
    }
    public function add_subdeputy(){
        if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
		if(auth::user()->utype == 0){
		    $data = Input::all();
            $rules=array(
    			'name_en'=>'required',
    			'name_fa'=>'required',
    			'deputy'=>'required'
			);
			$validation=Validator::make($data,$rules);
			if($validation->fails()){
				return redirect()->action([AdminController::class, 'deputy'])->withErrors($validation);
			}
			$subdeputy = new subdeputy;
			$subdeputy->name_fa = $data['name_fa'];
			$subdeputy->name_en = $data['name_en'];
			$subdeputy->description_fa = $data['desc_fa'];
			$subdeputy->description_en = $data['desc_en'];
			$subdeputy->deputy = $data['deputy'];
                if($files=Input::file('image')){
                	$file = Input::file('image');
            		$destinationPath = 'images/deputy/';
                    $filename = Str::random(10).'-'.Auth::user()->id.'.'.$file->getClientOriginalExtension();
                    Input::file('image')->move($destinationPath, $filename);
                    $subdeputy->photo = $filename;
                }
            $subdeputy->created_by = Auth::user()->id;
            if($subdeputy->save()){
                return redirect()->action([AdminController::class, 'deputy_submenu'])->with('message', 'New sub deputy successfully added.');
            }else{
                return redirect()->action([AdminController::class, 'deputy_submenu'])->with('message', 'Oooops, some error occured.');
            }
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
    }
    public function subdeput_delete($id){
        if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
		if(auth::user()->utype == 0){
            $selected_subdeputy = subdeputy::where('id', $id)->delete();
                return redirect()->action([AdminController::class, 'deputy_submenu'])->with('message','Sub Deputy successfully deleted!');
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
    }
    public function edit_subdeputy($id){
        if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
		if(auth::user()->utype == 0){
            $subdeputy_info = subdeputy::where('id', $id)->first();
            $deputy = deputy::orderBy('id', 'DESC')->get();
			return view("admin.edit_subdeputy")
			        ->with("subdeputy_info", $subdeputy_info)
			        ->with("deputy", $deputy);
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
    }
    public function update_subdeputy(){
        if(!Auth::check()){
			return redirect()->action([AdminController::class, 'login']);
	    }
		if(auth::user()->utype == 0){
             $data = Input::all();
            $rules=array(
    			'name_en'=>'required',
    			'name_fa'=>'required',
    			'deputy'=>'required'
			);
			
			$validation=Validator::make($data,$rules);
			if($validation->fails()){
				return redirect()->action([AdminController::class, 'deputy'])->withErrors($validation);
			}
            $update_subdeputy = subdeputy::find($data['id']);
            $update_subdeputy->name_en = $data['name_en'];
            $update_subdeputy->name_fa = $data['name_fa'];
            $update_subdeputy->deputy = $data['deputy'];
            $update_subdeputy->description_en = $data['desc_en'];
            $update_subdeputy->description_fa = $data['desc_fa'];
            if(Input::hasFile('image')){
        		$file = Input::file('image');
        		$destinationPath = 'images/deputy/';
                $filename = Str::random(10).'-'.Auth::user()->id.'.'.$file->getClientOriginalExtension();
                Input::file('image')->move($destinationPath, $filename);
                $update_subdeputy->photo = $filename;
            }
            $update_subdeputy->updated_by = Auth::user()->id;
            if($update_subdeputy->save()){
                return redirect()->action([AdminController::class, 'deputy_submenu'])->with('message','Deputy successfully updated!');
            }else{
                return redirect()->action([AdminController::class, 'deputy_submenu'])->with('error','Oooops, some error occured!');
            }
		}else{
			return redirect()->action([AdminController::class, 'login']);
		}
    }
    
//End Controller	
}
