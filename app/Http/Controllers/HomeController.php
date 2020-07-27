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
        $work = Work::all();
        $experience = Experience::all();
        $document = Document::where('file', 'CV-Sanjil-Shakya.pdf')->get();
        return view('index')->with('document', $document)->with('about', $about)->with('skill', $skill)->with('user', $user)->with('profile', $profile)->with('work', $work)->with('experience', $experience);
    }
    public function blogs()
    {
        return view('blogs.index');
    }
}
