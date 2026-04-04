<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    public function __construct(){
        if(isset($_COOKIE['lang'])){
            if($_COOKIE['lang'] == 'fa'){
                $lang = 'fa';   
            }else{
                $lang = 'en';
            }
        }else{
            $lang = 'fa';
        }
        app()->setLocale($lang);
    }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
