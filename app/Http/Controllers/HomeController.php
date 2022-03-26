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
use App\Blog;

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
        $skill = Skills::orderBy('skill_level', 'desc')->get();
        $profile = Profile::all();
        $user = User::all();
        $work = Work::orderBy('created_at', 'desc')->take(4)->get();
        $blog = Blog::where('publish_status', 1)->orderBy('updated_at', 'desc')->take(4)->get();
        $totalBlog = count(Blog::where('publish_status',1)->get());
        $totalwork = count(Work::all());
        $experience = Experience::orderBy('created_at', 'desc')->take(3)->get();
        $totalexperience = count(Experience::all());
        $gallery = Gallery::orderBy('created_at', 'desc')->take(4)->get();
        $totalgallery = count(Gallery::all());
        $document = Document::where('file', 'CV-Sanjil-Shakya.pdf')->get();
        $banner = Banner::all();
        $totalbanner = count(Banner::all());
        return view('index')->with('document', $document)->with('about', $about)->with('skill', $skill)->with('user', $user)->with('profile', $profile)->with('work', $work)->with('experience', $experience)->with('gallery', $gallery)->with('totalgallery', $totalgallery)->with('totalexperience', $totalexperience)->with('totalwork', $totalwork)->with('banner', $banner)->with('totalbanner', $totalbanner)->with('blog', $blog)->with('totalBlog', $totalBlog);
    }
    public function blogs()
    {
        $blog = Blog::where('publish_status', 1)->orderBy('updated_at', 'desc')->take(4)->get();
        $totalBlog = count(Blog::where('blog_status',0)->get());
        return view('blogs.index')->with('blog', $blog)->with('totalBlog', $totalBlog);
    }

    public function experience(){
        $experience = Experience::orderBy('created_at', 'desc')->get();
        return view('experience.index')->with('experience', $experience);
    }

    public function work(){
        $work = Work::orderBy('created_at', 'desc')->get();
        return view('work.index')->with('work', $work);
    }


}
