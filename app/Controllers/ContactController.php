<?php

namespace App\Controllers;

class ContactController extends BaseController
{
    public function index(): string
    {
        return view('pages/contact_us');
    }
    
}
