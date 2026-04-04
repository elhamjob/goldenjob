<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class ResetPasswordController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }
}
