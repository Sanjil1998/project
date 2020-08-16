<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Gallery;
use App\Work;
use App\Skills;
use App\Document;
use App\Experience;
use App\Banner;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['index'],
            ]);
    }

    public function index(){
        return redirect('/login');
    }
    public function dashboard(){
        $totalimage = count(Gallery::all());
        $totalexperience = count(Experience::all());
        $totalwork = count(Work::all());
        $totalskills = count(Skills::all());
        $totaldocument = count(Document::all());
        $skill = Skills::all();
        $gallery = Gallery::orderBy('created_at', 'desc')->take(6)->get();
        $totalbanner = count(Banner::all());
        return view('admin.dashboard')->with('gallery', $gallery)->with('totalimage', $totalimage)->with('totalwork', $totalwork)->with('totalskills', $totalskills)->with('totaldocument', $totaldocument)->with('totalexperience', $totalexperience)->with('skill', $skill)->with('totalbanner', $totalbanner);
    }
    public function users(){
        return view('admin.users');
    }
    public function profile(){
        return view('admin.profile');
    }
}
