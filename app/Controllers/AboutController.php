<?php

namespace App\Controllers;

class AboutController extends BaseController
{
    public function index(): string
    {
        return view('pages/about_view');
    }
    
}
