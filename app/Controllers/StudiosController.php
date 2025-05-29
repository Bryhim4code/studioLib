<?php

namespace App\Controllers;

class StudiosController extends BaseController
{
    public function index(): string
    {
        return view('pages/studios_libraries_view');
    }

    public function StudioDetails(): string
    {
        return view('pages/studios_details_view');
    }
}
