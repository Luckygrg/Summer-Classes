<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';
        return view('index', compact('title'));
    }

    public function trending()
    {
        $title = 'Trending Page';
        return view('trending', compact('title'));
    }

    public function celebrities()
    {
        $title = 'Contact Page';
        return view('celebrities', compact('title'));
    }

    public function login()
    {
        $title = 'Aboutus Page';
        return view('login', compact('title'));
    }

    public function dashboard()
    {
        $title = 'Dashbaord';
        return view('admin.dashboard', compact('title'));
    }
}