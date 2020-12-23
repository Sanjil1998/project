<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Document;
use App\About;
use App\Skills;
use App\Profile;
use App\Work;
use App\Experience;

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
        $work = Work::all();
        $totalwork = count(Work::all());
        $totalskills = count(Skills::all());
        return view('admin.profile.index')->with('about', $about)->with('skill', $skill)->with('user', $user)->with('profile', $profile)->with('work', $work)->with('totalwork', $totalwork)->with('totalskills', $totalskills);
    }

    public function create_profile(){
        return view('admin.profile.create');
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
        return view('admin.profile.edit')->with('profile', $profile);

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

    // About functions

    public function about(){
        $about = About::all();
        $skill = Skills::all();
        return view('admin.profile.about.about')->with('about', $about)->with('skill', $skill);
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
        return view('admin.profile.about.edit_about')->with('about', $about);

    }

    public function update_about($id, Request $request){

        $this->validate($request, [
            'body' => 'required'
        ]);

        $about = About::find($id);
        $about->body = $request->input('body');
        $about->save();

        return redirect(route('admin.profile.about'))->with('success', 'About content Updated');

    }

    public function delete_about($id){
        $about = About::find($id);
        $about->delete();
        return redirect(route('admin.profile.about'))->with('success', 'About content Deleted');
    }

    // File functions

    public function file(){
        $document = Document::all();
        return view('admin.profile.file.file')->with('document', $document);
    }

    // Skills functions

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
        return view('admin.profile.about.edit_skills')->with('skill', $skill);
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

    // contact functions

    public function contact(){
        $profile = Profile::all();
        return view('admin.profile.contact.contact')->with('profile',$profile);
    }

    // work functions

    public function work(){
        $work = Work::all();
        return view('admin.profile.work.index')->with('work', $work);
    }

    public function work_add(){
        return view('admin.profile.work.create');
    }

    public function work_store(Request $request){
        $this->validate($request, [
            'work_title' => 'required|max:254',
            'work_subtitle' => 'required|max:254',
            'work_description' => 'required',
            'work_image' => 'required|image',
            'work_links' => 'required|url',
            'work_leader' => 'nullable',
            'work_provider' => 'nullable',
        ]);

        if ($request->hasFile('work_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('work_image')->getClientOriginalName();

            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just ext
            $extension = $request->file('work_image')->getClientOriginalExtension();

            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Upload Image
            $path = $request->file('work_image')->storeAs('public/work_images', $fileNameToStore);

        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        $work = new Work;
        $work->work_title=$request->input('work_title');
        $work->work_subtitle=$request->input('work_subtitle');
        $work->work_description=$request->input('work_description');
        $work->work_image=$fileNameToStore;
        $work->work_links=$request->input('work_links');
        $work->work_leader=$request->input('work_leader');
        $work->work_provider=$request->input('work_provider');
        $work->save();


        return redirect(route('admin.profile.work'));

    }

    public function delete_work($id){
        $work = Work::find($id);
        $work->delete();
        return redirect(route('admin.profile.work'))->with('success', 'Work content Deleted');
    }

    public function work_edit($id){
        $work = Work::find($id);
        return view('admin.profile.work.edit')->with('work', $work);
    }

    public function work_update($id, Request $request){
        $this->validate($request, [
            'work_title' => 'required|max:254',
            'work_subtitle' => 'required|max:254',
            'work_description' => 'required',
            'work_image' => 'required|image',
            'work_links' => 'required|url',
            'work_leader' => 'nullable',
            'work_provider' => 'nullable',
        ]);

        if ($request->hasFile('work_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('work_image')->getClientOriginalName();

            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just ext
            $extension = $request->file('work_image')->getClientOriginalExtension();

            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Upload Image
            $path = $request->file('work_image')->storeAs('public/work_images', $fileNameToStore);

        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        $work = Work::find($id);
        $work->work_title=$request->input('work_title');
        $work->work_subtitle=$request->input('work_subtitle');
        $work->work_description=$request->input('work_description');
        $work->work_image=$fileNameToStore;
        $work->work_links=$request->input('work_links');
        $work->work_leader=$request->input('work_leader');
        $work->work_provider=$request->input('work_provider');
        $work->save();

        return redirect(route('admin.profile.work'))->with('success', 'About content Updated');

    }

    // Experience functions

    public function experience(){
        $experience = Experience::all();

        return view('admin.profile.experience.index')->with('experience', $experience);

    }

    public function experience_add(){
        return view('admin.profile.experience.create');
    }

    public function experience_store(Request $request){
        $this->validate($request, [
            'experience_title' => 'required|max:255',
            'experience_description' => 'required',
            'experience_duties' => 'required',

        ]);

        $experience = new Experience;
        $experience->experience_title = $request->input('experience_title');
        $experience->experience_description = $request->input('experience_description');
        $experience->experience_duties = $request->input('experience_duties');
        $experience->save();

        return redirect(route('admin.profile.experience'));

    }

    public function delete_experience($id){
        $experience = Experience::find($id);
        $experience->delete();
        return redirect(route('admin.profile.experience'))->with('success', 'Experience content Deleted');
    }

    public function experience_edit($id){
        $experience = Experience::find($id);
        return view('admin.profile.experience.edit')->with('experience', $experience);
    }

    public function experience_update($id, Request $request){
        $this->validate($request, [
            'experience_title' => 'required|max:255',
            'experience_description' => 'required',
            'experience_duties' => 'required',

        ]);

        $experience = Experience::find($id);
        $experience->experience_title = $request->input('experience_title');
        $experience->experience_description = $request->input('experience_description');
        $experience->experience_duties = $request->input('experience_duties');
        $experience->save();

        return redirect(route('admin.profile.experience'));

    }



}
