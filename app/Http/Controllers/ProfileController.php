<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Document;
use App\About;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $about = About::all();
        return view('admin.profile.index')->with('about', $about);
    }

    public function about(){
        $about = About::all();
        return view('admin.profile.about')->with('about', $about);
    }

    public function store_about(Request $request){

        $this->validate($request, [
            'body' => 'required'
        ]);

        $about = new About;
        $about->body = $request->input('body');
        $about->save();

        return back();



    }

    public function edit_about($id){
        $about = About::find($id);
        return view('admin.profile.edit_about')->with('about', $about);

    }

    public function update_about($id, Request $request){

        $this->validate($request, [
            'body' => 'required'
        ]);

        $about = About::find($id);;
        $about->body = $request->input('body');
        $about->save();

        return redirect(route('admin.profile.about'))->with('success', 'About content Updated');

    }

    public function delete_about($id){
        $about = About::find($id);
        $about->delete();
        return redirect(route('admin.profile.about'))->with('success', 'About content Deleted');
    }



    public function file(){
        $document = Document::all();
        return view('admin.profile.file')->with('document', $document);
    }
}
