<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('pages/landing_view');
    }
    public function HowItWorks(): string
    {
        return view('pages/how_view');
    }
}
