<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{

    public function index()
    {
        return view('index');
    }


    public function sobre()
    {
        return view('sobre');
    }


}
