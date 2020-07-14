<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Document;
use App\About;
use App\Skills;
use App\Profile;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $about = About::all();
        $skill = Skills::all();
        $user = User::all();
        $profile = Profile::all();
        return view('admin.profile.index')->with('about', $about)->with('skill', $skill)->with('user', $user)->with('profile', $profile);
    }

    public function edit_profile(){
        return view('admin.profile.edit');
    }

    public function store_profile(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'gmail' => 'required|email',
            'phone' => 'nullable|numeric',
            'dob' => 'nullable|date',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'image' => 'image',
        ]);

        if ($request->hasFile('image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();

            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Upload Image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);

        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        $profile = new Profile;
        $profile->name = $request->input('name');
        $profile->address = $request->input('address');
        $profile->gmail = $request->input('gmail');
        $profile->phone = $request->input('phone');
        $profile->dob = $request->input('dob');
        $profile->facebook = $request->input('facebook');
        $profile->instagram = $request->input('instagram');
        $profile->twitter = $request->input('twitter');
        $profile->linkedin = $request->input('linkedin');
        $profile->image = $fileNameToStore;
        $profile->save();

        return redirect(route('admin.profile.index'));

    }

    public function update_profile($id){
        $profile = Profile::find($id);
        return view('admin.profile.edit_profile')->with('profile', $profile);

    }

    public function store_update_profile($id, Request $request){
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'gmail' => 'required|email',
            'phone' => 'nullable|numeric',
            'dob' => 'nullable|date',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'image' => 'image',
        ]);
        if ($request->hasFile('image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();

            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Upload Image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);

        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        $profile = Profile::find($id);;
        $profile->name = $request->input('name');
        $profile->address = $request->input('address');
        $profile->gmail = $request->input('gmail');
        $profile->phone = $request->input('phone');
        $profile->dob = $request->input('dob');
        $profile->facebook = $request->input('facebook');
        $profile->instagram = $request->input('instagram');
        $profile->twitter = $request->input('twitter');
        $profile->linkedin = $request->input('linkedin');
        $profile->image = $fileNameToStore;
        $profile->save();

        return redirect(route('admin.profile.index'));


    }

    public function about(){
        $about = About::all();
        $skill = Skills::all();
        return view('admin.profile.about')->with('about', $about)->with('skill', $skill);
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

    public function store_skills(Request $request){
        $this->validate($request, [
            'skill_name' => 'required',
            'skill_level' => 'required|numeric'
        ]);

        $skill = new Skills;
        $skill->skill_name = $request->input('skill_name');
        $skill->skill_level = $request->input('skill_level');
        $skill->save();

        return redirect(route('admin.profile.about'))->with('success', 'Skillsets added successfully')->with('skill', $skill);



    }

    public function edit_skills($id){
        $skill = Skills::find($id);
        return view('admin.profile.edit_skills')->with('skill', $skill);
    }

    public function update_skills($id, Request $request){

        $this->validate($request, [
            'skill_name' => 'required',
            'skill_level' => 'required|numeric'
        ]);

        $skill = Skills::find($id);;
        $skill->skill_name = $request->input('skill_name');
        $skill->skill_level = $request->input('skill_level');
        $skill->save();

        return redirect(route('admin.profile.about'))->with('success', 'Skillsets updated successfully')->with('skill', $skill);

    }

    public function delete_skills($id){
        $skill = Skills::find($id);
        $skill->delete();
        return redirect(route('admin.profile.about'))->with('success', 'Skillset has been deleted');
    }

    public function contact(){
        $profile = Profile::all();
        return view('admin.profile.contact')->with('profile',$profile);
    }

    public function work(){
        return view('admin.profile.work.index');
    }



}
