<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $Title = 'Welcome to laravel!';
        return view('pages.index', compact('Title'));
}
    public function about(){
        $Title='About us.';
        return view('pages.about')->with('Title',$Title);
    }

    public function services(){
        $data = array(
           'Title' => 'Services',
           'services' => ['Web design','Programming','SEO']
        );
        return view('pages.services')->with($data);
    }

    public function hello(){
        return view('pages.hello');
    }

    public function conf(){
        return view('pages.conf');
    }
}
