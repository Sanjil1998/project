<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Gallery;

class GalleryController extends Controller
{
    public function home(){
        $gallery=Gallery::orderBy('created_at', 'desc')->get();
        return view('gallery.index')->with('gallery', $gallery);
    }

    public function index(){
        $gallery=Gallery::orderBy('created_at', 'desc')->get();
        // dd(view('admin.gallery.index')->with('gallery', $gallery));
        return view('admin.gallery.index')->with('gallery', $gallery);
    }

    public function create(){
        return view('admin.gallery.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'image_title' => 'required|max:254',
            'image' => 'required|image',
        ]);

        if($request->hasFile('image')){
            //get filename with extension
            $filenamewithextension = $request->file('image')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('image')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //small thumbnail name
            $smallthumbnail = 'small_'.$filename.'_'.time().'.'.$extension;

            //medium thumbnail name
            $mediumthumbnail = 'medium_'.$filename.'_'.time().'.'.$extension;

            //large thumbnail name
            $largethumbnail = 'large_'.$filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('image')->storeAs('public/galleryimages', $filenametostore);
            $request->file('image')->storeAs('public/galleryimages/thumbnail', $smallthumbnail);
            $request->file('image')->storeAs('public/galleryimages/thumbnail', $mediumthumbnail);
            $request->file('image')->storeAs('public/galleryimages/thumbnail', $largethumbnail);

            //create small thumbnail
            $smallthumbnailpath = public_path('storage/galleryimages/thumbnail/'.$smallthumbnail);
            $this->createThumbnail($smallthumbnailpath, 150, 93);

            //create medium thumbnail
            $mediumthumbnailpath = public_path('storage/galleryimages/thumbnail/'.$mediumthumbnail);
            $this->createThumbnail($mediumthumbnailpath, 300, 185);

            //create large thumbnail
            $largethumbnailpath = public_path('storage/galleryimages/thumbnail/'.$largethumbnail);
            $this->createThumbnail($largethumbnailpath, 550, 250);


        }

        $gallery = new Gallery;
        $gallery->image_title=$request->input('image_title');
        $gallery->image=$filenametostore;
        $gallery->save();

        return redirect(route('admin.gallery.index'))->with('success', "Image uploaded successfully.");
    }

    public function createThumbnail($path, $width, $height){
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
        });
        $img->save($path);

    }

    public function delete($id){
        $gallery = Gallery::find($id);
        $gallery->delete();

        return redirect(route('admin.gallery.index'))->with('success', 'Image deleted from gallery');
    }
}
