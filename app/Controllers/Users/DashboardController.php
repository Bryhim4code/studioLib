<?php

namespace App\Controllers\Users;
use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index(): string
    {
        return view('users/pages/dashboard');
    }
    
}
