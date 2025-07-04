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

    public function news()
    {
        $title = 'News Page';
        return view('news', compact('title'));
    }

    public function contact()
    {
        $title = 'Contact Page';
        return view('contact', compact('title'));
    }

    public function about()
    {
        $title = 'Aboutus Page';
        return view('about', compact('title'));
    }
}