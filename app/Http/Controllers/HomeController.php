<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
Use App\About;
Use App\Document;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $about = About::all();
        $document = Document::where('file', 'CV-Sanjil-Shakya.pdf')->get();
        return view('index')->with('document', $document)->with('about', $about);
    }
    public function blogs()
    {
        return view('blogs.index');
    }
}
