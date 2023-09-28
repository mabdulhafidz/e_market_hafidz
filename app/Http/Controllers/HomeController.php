<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('dashboards.home');
    }
    public function profile(){
        return view('dashboards.profile');

    } public function contact(){
        return view('dashboards.contact');
    }
}
 