<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
Use App\About;
Use App\Document;
Use App\Skills;
Use App\Profile;
Use App\Work;
Use App\Experience;
Use App\Gallery;
Use App\Banner;

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
        $skill = Skills::all();
        $profile = Profile::all();
        $user = User::all();
        $work = Work::orderBy('created_at', 'desc')->take(4)->get();
        $totalwork = count(Work::all());
        $experience = Experience::orderBy('created_at', 'desc')->take(3)->get();
        $totalexperience = count(Experience::all());
        $gallery = Gallery::orderBy('created_at', 'desc')->take(4)->get();
        $totalgallery = count(Gallery::all());
        $document = Document::where('file', 'CV-Sanjil-Shakya.pdf')->get();
        $banner = Banner::all();
        $totalbanner = count(Banner::all());
        return view('index')->with('document', $document)->with('about', $about)->with('skill', $skill)->with('user', $user)->with('profile', $profile)->with('work', $work)->with('experience', $experience)->with('gallery', $gallery)->with('totalgallery', $totalgallery)->with('totalexperience', $totalexperience)->with('totalwork', $totalwork)->with('banner', $banner)->with('totalbanner', $totalbanner);
    }
    public function blogs()
    {
        return view('blogs.index');
    }

    public function experience(){
        $experience = Experience::all();
        return view('experience.index')->with('experience', $experience);
    }

    public function work(){
        $work = Work::all();
        return view('work.index')->with('work', $work);
    }
}
