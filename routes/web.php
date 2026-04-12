<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RFPSController;
use App\Http\Controllers\RFQSController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\ApplicationFormController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\SeekerController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Front-End Routes
|--------------------------------------------------------------------------
*/

Route::get('/changelanguage/{lang}', function ($lang) {
    App::setLocale($lang);
    Session::put('locale', $lang);
    return redirect()->action([FrontController::class, 'index']);
});

Route::get('/', function () {
    App::setLocale('en');
    Session::put('locale', 'en');
    return redirect()->action([FrontController::class, 'index']);
});
Route::get('/index', [FrontController::class, 'index'])->name('index');
Route::get('/contacts', [FrontController::class, 'contacts'])->name('contacts');
Route::post('/apply', [FrontController::class, 'apply'])->name('apply');

Route::get('/jobdetails/{id}', [FrontController::class, 'jobdetails'])->name('jobdetails');
Route::get('/rfpdetails/{id}', [FrontController::class, 'rfpdetails'])->name('rfpdetails');
Route::get('/rfqdetails/{id}', [FrontController::class, 'rfqdetails'])->name('rfqdetails');

Route::get('/jobscenter', [FrontController::class, 'jobs'])->name('jobscenter');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/loginfunction', [AdminController::class, 'loginfunction'])->name('admin.loginfunction');
    Route::get('/loginfunction', fn() => redirect()->route('admin.login'));
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
});

/*
|--------------------------------------------------------------------------
| Job Management
|--------------------------------------------------------------------------
*/

Route::prefix('jobs')->group(function () {
    Route::get('/', [JobController::class, 'jobs'])->name('jobs.list');
    Route::get('/add', [JobController::class, 'addjob'])->name('jobs.add');
    Route::post('/post', [JobController::class, 'postjob'])->name('jobs.post');
    Route::get('/edit/{id}', [JobController::class, 'editjob'])->name('jobs.edit');
    Route::post('/update', [JobController::class, 'updatejob'])->name('jobs.update');
    Route::get('/delete/{id}', [JobController::class, 'deletejob'])->name('jobs.delete');
});

/*
|--------------------------------------------------------------------------
| RFP Management
|--------------------------------------------------------------------------
*/

Route::prefix('rfps')->group(function () {
    Route::get('/', [RFPSController::class, 'rfps'])->name('rfps.list');
    Route::get('/add', [RFPSController::class, 'addrfps'])->name('rfps.add');
    Route::post('/post', [RFPSController::class, 'postrfps'])->name('rfps.post');
    Route::get('/edit/{id}', [RFPSController::class, 'editrfps'])->name('rfps.edit');
    Route::post('/update', [RFPSController::class, 'updaterfps'])->name('rfps.update');
    Route::get('/delete/{id}', [RFPSController::class, 'deleterfps'])->name('rfps.delete');
});

/*
|--------------------------------------------------------------------------
| RFQ Management
|--------------------------------------------------------------------------
*/

Route::prefix('rfqs')->group(function () {
    Route::get('/', [RFQSController::class, 'rfqs'])->name('rfqs.list');
    Route::get('/add', [RFQSController::class, 'addrfqs'])->name('rfqs.add');
    Route::post('/post', [RFQSController::class, 'postrfqs'])->name('rfqs.post');
    Route::get('/edit/{id}', [RFQSController::class, 'editrfqs'])->name('rfqs.edit');
    Route::post('/update', [RFQSController::class, 'updaterfqs'])->name('rfqs.update');
    Route::get('/delete/{id}', [RFQSController::class, 'deleterfqs'])->name('rfqs.delete');
});

/*
|--------------------------------------------------------------------------
| Scholarships
|--------------------------------------------------------------------------
*/

Route::prefix('scholarships')->group(function () {
    Route::get('/', [ScholarshipController::class, 'scholarships'])->name('scholarships.list');
    Route::get('/add', [ScholarshipController::class, 'addscholarships'])->name('scholarships.add');
    Route::post('/post', [ScholarshipController::class, 'postscholarships'])->name('scholarships.post');
    Route::get('/edit/{id}', [ScholarshipController::class, 'editscholarships'])->name('scholarships.edit');
    Route::post('/update', [ScholarshipController::class, 'updatescholarships'])->name('scholarships.update');
    Route::get('/delete/{id}', [ScholarshipController::class, 'deletescholarships'])->name('scholarships.delete');
});

/*
|--------------------------------------------------------------------------
| Publications
|--------------------------------------------------------------------------
*/

Route::prefix('publications')->group(function () {
    Route::get('/manage/{id}', [PublicationController::class, 'publicationsmanage'])->name('publications.manage');
    Route::get('/add/{id}', [PublicationController::class, 'addpublications'])->name('publications.add');
    Route::post('/post', [PublicationController::class, 'postpublications'])->name('publications.post');
    Route::get('/edit/{id}', [PublicationController::class, 'editpublications'])->name('publications.edit');
    Route::post('/update', [PublicationController::class, 'updatepublications'])->name('publications.update');
    Route::get('/delete/{id}', [PublicationController::class, 'deletepublications'])->name('publications.delete');
});

/*
|--------------------------------------------------------------------------
| Forms
|--------------------------------------------------------------------------
*/

Route::prefix('forms')->group(function () {
    Route::get('/', [ApplicationFormController::class, 'forms'])->name('forms.list');
    Route::get('/add', [ApplicationFormController::class, 'addforms'])->name('forms.add');
    Route::post('/post', [ApplicationFormController::class, 'postforms'])->name('forms.post');
    Route::get('/edit/{id}', [ApplicationFormController::class, 'editforms'])->name('forms.edit');
    Route::post('/update', [ApplicationFormController::class, 'updateforms'])->name('forms.update');
    Route::get('/delete/{id}', [ApplicationFormController::class, 'deleteforms'])->name('forms.delete');
});

/*
|--------------------------------------------------------------------------
| Portal
|--------------------------------------------------------------------------
*/

Route::prefix('portal')->group(function () {
    Route::get('/', [PortalController::class, 'index'])->name('portal.index');
    Route::get('/profile', [PortalController::class, 'profile'])->name('portal.profile');
    Route::get('/logout', [PortalController::class, 'logout'])->name('portal.logout');
    Route::post('/update_profile_account', [PortalController::class, 'update_profile_account'])->name('portal.update_profile');
});

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return "خوش آمدید به داشبورد!";
    })->name('auth.dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
});

/*
|--------------------------------------------------------------------------
| Route Aliases (flat names used in views)
|--------------------------------------------------------------------------
*/

// Auth / signup
Route::get('/portal/login', [PortalController::class, 'login'])->name('portal.login');
Route::post('/portal/loginfunction', [PortalController::class, 'Student_loginfunction'])->name('portal.loginfunction');

// Portal flat aliases
Route::get('/portal', [PortalController::class, 'index'])->name('Student_portal');
Route::get('/portal/profile', [PortalController::class, 'profile'])->name('profile');
Route::get('/portal/logout', [PortalController::class, 'logout'])->name('logout');
Route::get('/portal/mycredits', [PortalController::class, 'mycredits'])->name('mycredits');

// Job flat aliases
Route::get('/jobs', [JobController::class, 'jobs'])->name('jobs');
Route::get('/jobs/add', [JobController::class, 'addjob'])->name('addjob');

// RFP flat aliases
Route::get('/rfps', [RFPSController::class, 'rfps'])->name('rfps');
Route::get('/rfps/add', [RFPSController::class, 'addrfps'])->name('addrfps');

// RFQ flat aliases
Route::get('/rfqs', [RFQSController::class, 'rfqs'])->name('rfqs');
Route::get('/rfqs/add', [RFQSController::class, 'addrfqs'])->name('addrfqs');

// Scholarships flat aliases
Route::get('/scholarships', [ScholarshipController::class, 'scholarships'])->name('scholarships');
Route::get('/scholarships/add', [ScholarshipController::class, 'addscholarships'])->name('addscholarships');

// Forms flat aliases
Route::get('/forms', [ApplicationFormController::class, 'forms'])->name('adminforms');
Route::get('/forms/add', [ApplicationFormController::class, 'addforms'])->name('addforms');

// Front-end nav aliases
Route::get('/rfpscenter', [FrontController::class, 'requestforproposals'])->name('requestforproposals');
Route::get('/rfqscenter', [FrontController::class, 'requestforqutaions'])->name('requestforqutaions');

// Signup (front-end registration page)
Route::get('/signup', [FrontController::class, 'signup'])->name('signup');

// Nav dynamic page routes
Route::get('/page/{menu}/{url}', [FrontController::class, 'page'])->name('page');
Route::get('/section/{menu}/{url}', [FrontController::class, 'url'])->name('url');
Route::get('/publications/{menu}/{url}', [FrontController::class, 'pub'])->name('pub');

// Application forms front-end
Route::get('/application-forms', [FrontController::class, 'appplicationforms'])->name('appplication-forms');

// City AJAX loader
Route::get('/city/{id}', [FrontController::class, 'city'])->name('city');

/*
|--------------------------------------------------------------------------
| Missing Front-End Routes
|--------------------------------------------------------------------------
*/
Route::get('/activity/{id}', [FrontController::class, 'activity'])->name('activity');
Route::get('/scholarship/{id}', [FrontController::class, 'schoraship'])->name('schoraship');
Route::get('/program/{id}', [FrontController::class, 'program'])->name('program');
Route::get('/program-sub/{id}', [FrontController::class, 'tab'])->name('program_sub');
Route::get('/inside', [FrontController::class, 'inside'])->name('inside');
Route::get('/gallery', [FrontController::class, 'gallery_page'])->name('gallery_page');
Route::get('/videos', [FrontController::class, 'videos'])->name('videos');
Route::get('/alumni', [FrontController::class, 'alumni'])->name('alumni');
Route::get('/privacy-policy', [FrontController::class, 'PrivacyPolicy'])->name('privacy');
Route::post('/searchs', [FrontController::class, 'searchs'])->name('searchs');
Route::post('/filterjobs', [FrontController::class, 'filterjobs'])->name('filterjobs');
Route::post('/searchscholarships', [FrontController::class, 'searchscholarships'])->name('searchscholarships');
Route::post('/searchrfps', [FrontController::class, 'searchrfps'])->name('searchrfps');
Route::post('/searchrfqs', [FrontController::class, 'searchrfqs'])->name('searchrfqs');
Route::post('/post-contact', [FrontController::class, 'post_contact'])->name('post_contact');
Route::post('/post-signup-seeker', [FrontController::class, 'post_signup_asseeker'])->name('post_signup_asseeker');
Route::post('/post-signup-employer', [FrontController::class, 'post_signup_asemployer'])->name('post_signup_asemployer');

/*
|--------------------------------------------------------------------------
| Jobseeker Portal Routes
|--------------------------------------------------------------------------
*/

Route::get('/seeker/jobs', [SeekerController::class, 'jobs'])->name('seekerjobs');
Route::get('/seeker/rfps', [SeekerController::class, 'rfps'])->name('seekerrfps');
Route::get('/seeker/rfqs', [SeekerController::class, 'rfqs'])->name('seekerrfqs');

/*
|--------------------------------------------------------------------------
| Admin Panel Routes (full)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    // Dashboard alias
    Route::get('/', [AdminController::class, 'index'])->name('admin_index');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin_profile');
    Route::post('/post-profile', [AdminController::class, 'post_profile'])->name('post_profile');

    // Slider
    Route::get('/slider', [AdminController::class, 'slider'])->name('slider');
    Route::post('/slider/post', [AdminController::class, 'post_slider'])->name('post_slider');
    Route::post('/slider/update', [AdminController::class, 'post_slider_update'])->name('post_slider_update');
    Route::get('/slider/delete/{id}', [AdminController::class, 'delete_slider'])->name('delete_slider');
    Route::get('/slider/edit/{id}', [AdminController::class, 'edit_slider'])->name('edit_slider');

    // General info
    Route::get('/general-info', [AdminController::class, 'general_info'])->name('general_info');
    Route::post('/general-info/post', [AdminController::class, 'post_info'])->name('post_info');

    // Contacts
    Route::get('/contacts', [AdminController::class, 'contacts'])->name('admin_contacts');
    Route::get('/contacts/delete/{id}', [AdminController::class, 'delete_contacts'])->name('delete_contacts');

    // Activities
    Route::get('/activities', [AdminController::class, 'activities'])->name('admin_activities_li');
    Route::get('/activities/list/{type}', [AdminController::class, 'activitiesli'])->name('activitiesli');
    Route::get('/activities/add', [AdminController::class, 'add_activity'])->name('add_activity');
    Route::post('/activities/post', [AdminController::class, 'post_activity'])->name('post_activity');
    Route::get('/activities/delete/{id}', [AdminController::class, 'delete_activity'])->name('delete_activity');
    Route::get('/activities/edit/{id}', [AdminController::class, 'edit_activity'])->name('edit_activity');
    Route::post('/activities/update', [AdminController::class, 'post_edit_activity'])->name('post_edit_activity');

    // Pages & Menu
    Route::get('/pages', [AdminController::class, 'pages'])->name('admin_pages_menu');
    Route::get('/pages/add', [AdminController::class, 'add_pages'])->name('add_pages');
    Route::get('/pages/menu', [AdminController::class, 'menu_main'])->name('menu_main');
    Route::post('/pages/post', [AdminController::class, 'post_page'])->name('post_page');
    Route::get('/pages/menu/{id}', [AdminController::class, 'pages_menu'])->name('pages_menu');
    Route::get('/pages/delete/{id}', [AdminController::class, 'delete_pages'])->name('delete_pages');
    Route::get('/pages/edit/{id}', [AdminController::class, 'edit_pages'])->name('edit_pages');
    Route::post('/pages/update', [AdminController::class, 'post_edit_page'])->name('post_edit_page');
    Route::get('/menu/delete/{id}', [AdminController::class, 'delete_menu'])->name('delete_menu');
    Route::post('/menu/post', [AdminController::class, 'postmain_menu'])->name('postmain_menu');

    // Programs
    Route::get('/programs', [AdminController::class, 'programs'])->name('programs');
    Route::get('/programs/add', [AdminController::class, 'add_program'])->name('add_program');
    Route::post('/programs/post', [AdminController::class, 'post_program'])->name('post_program');
    Route::get('/programs/edit/{id}', [AdminController::class, 'edit_program'])->name('edit_program');
    Route::post('/programs/update', [AdminController::class, 'post_edit_program'])->name('post_edit_program');
    Route::get('/programs/delete/{id}', [AdminController::class, 'delete_program'])->name('delete_program');
    Route::get('/programs/sub', [AdminController::class, 'program_sub'])->name('program_sub');
    Route::post('/programs/sub/post', [AdminController::class, 'post_program_sub'])->name('post_program_sub');
    Route::get('/programs/sub/delete/{id}', [AdminController::class, 'delete_program_sub'])->name('delete_program_sub');
    Route::get('/programs/tabs', [AdminController::class, 'tabs'])->name('tabs');
    Route::post('/programs/tabs/post', [AdminController::class, 'post_tab'])->name('post_tab');
    Route::get('/programs/tabs/delete/{id}', [AdminController::class, 'delete_program_tab'])->name('delete_program_tab');

    // Users
    Route::get('/users', [AdminController::class, 'users'])->name('admin_users');
    Route::get('/users/credits', [AdminController::class, 'users_credits'])->name('admin_users_credits');
    Route::post('/users/credit/post', [AdminController::class, 'post_user_credit'])->name('post_user_credit');
    Route::get('/users/credit/delete/{id}', [AdminController::class, 'delete_user_credit'])->name('delete_user_credit');
    Route::post('/users/post', [AdminController::class, 'post_user'])->name('post_user');
    Route::get('/users/delete/{id}', [AdminController::class, 'delete_user'])->name('delete_user');

    // Gallery
    Route::get('/gallery', [AdminController::class, 'gallery_list'])->name('gallery_list');
    Route::post('/gallery/post', [AdminController::class, 'new_gallery'])->name('new_gallery');
    Route::get('/gallery/delete/{id}', [AdminController::class, 'delete_photo'])->name('delete_photo');

    // Scholarships admin
    Route::get('/scholarships', [ScholarshipController::class, 'scholarships'])->name('adminscholarships');

    // Publications flat aliases
    Route::get('/publications/{id}', [PublicationController::class, 'publicationsmanage'])->name('publicationsmanage');
    Route::get('/publications/add/{id}', [PublicationController::class, 'addpublications'])->name('addpublications');
    Route::get('/publications/edit/{id}', [PublicationController::class, 'editpublications'])->name('editpublications');
    Route::get('/publications/delete/{id}', [PublicationController::class, 'deletepublications'])->name('deletepublications');
});

/*
|--------------------------------------------------------------------------
| Laravel Auth stubs (used in default layout)
|--------------------------------------------------------------------------
*/
Route::get('/login', [PortalController::class, 'login'])->name('login');

// TEMP: remove after visiting once on live server
Route::get('/clear-cache', function () {
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return 'All caches cleared.';
});
Route::get('/register', [FrontController::class, 'signup'])->name('register');
Route::get('/password/reset', function() { return redirect()->route('login'); })->name('password.request');
Route::get('/password/email', function() { return redirect()->route('login'); })->name('password.email');
