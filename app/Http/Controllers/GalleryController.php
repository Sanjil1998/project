<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Gallery;
use App\Experience;
use App\Work;
use App\Banner;
use App\Traits\UploadFiles;

class GalleryController extends Controller
{
    use UploadFiles;

    public function home(){
        $gallery=Gallery::orderBy('created_at', 'desc')->get();
        $totalgallery = count(Gallery::all());
        $totalexperience = count(Experience::all());
        $totalwork = count(Work::all());
        return view('gallery.index')->with('gallery', $gallery)->with('totalgallery', $totalgallery)->with('totalexperience', $totalexperience)->with('totalwork', $totalwork);
    }

    public function index(){
        $gallery=Gallery::orderBy('created_at', 'desc')->get();
        $totalgallery = count(Gallery::all());
        // dd(view('admin.gallery.index')->with('gallery', $gallery));
        return view('admin.gallery.index')->with('gallery', $gallery)->with('totalgallery', $totalgallery);
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
            $imageLocation = $this->uploadImage($request->file('image'), 'galleryimages');
            // dd(getImage($imageLocation));
            // //get filename with extension
            // $filenamewithextension = $request->file('image')->getClientOriginalName();

            // //get filename without extension
            // $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            // //get file extension
            // $extension = $request->file('image')->getClientOriginalExtension();

            // //filename to store
            // $filenametostore = $filename.'_'.time().'.'.$extension;

            // //small thumbnail name
            // $smallthumbnail = 'small_'.$filename.'_'.time().'.'.$extension;

            // //medium thumbnail name
            // $mediumthumbnail = 'medium_'.$filename.'_'.time().'.'.$extension;

            // //large thumbnail name
            // $largethumbnail = 'large_'.$filename.'_'.time().'.'.$extension;

            // //Upload File
            // $request->file('image')->storeAs('public/galleryimages', $filenametostore);
            // $request->file('image')->storeAs('public/galleryimages/thumbnail', $smallthumbnail);
            // $request->file('image')->storeAs('public/galleryimages/thumbnail', $mediumthumbnail);
            // $request->file('image')->storeAs('public/galleryimages/thumbnail', $largethumbnail);

            // //create small thumbnail
            // $smallthumbnailpath = public_path('storage/galleryimages/thumbnail/'.$smallthumbnail);
            // $this->createThumbnail($smallthumbnailpath, 150, 93);

            // //create medium thumbnail
            // $mediumthumbnailpath = public_path('storage/galleryimages/thumbnail/'.$mediumthumbnail);
            // $this->createThumbnail($mediumthumbnailpath, 300, 185);

            // //create large thumbnail
            // $largethumbnailpath = public_path('storage/galleryimages/thumbnail/'.$largethumbnail);
            // $this->createThumbnail($largethumbnailpath, 550, 250);


        }

        $gallery = new Gallery;
        $gallery->image_title=$request->input('image_title');
        $gallery->image=$imageLocation;
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
        $this->deleteImage($gallery->image);
        $gallery->delete();

        return redirect(route('admin.gallery.index'))->with('success', 'Image deleted from gallery');
    }

    public function banner(){
        $banner = Banner::all();
        $totalbanner = count(Banner::all());
        return view('admin.banner.index')->with('totalbanner', $totalbanner)->with('banner', $banner);
    }

    public function banner_create(){
        // $smallSize = \config('imageSize.small.banner');
        // dd($smallSize);

        $totalbanner = count(Banner::all());
        if ($totalbanner<2) {
            return view('admin.banner.create')->with('totalbanner', $totalbanner);
        }
        else{
            return redirect(route('admin.gallery.banner.index'));
        }
    }

    public function banner_store(Request $request){

        $this->validate($request, [
            'banner_image_title' => 'required|max:254',
            'banner_image' => 'required|image',
        ]);

        if($request->hasFile('banner_image')){
            $BannerImageLocation = $this->uploadImage($request->file('banner_image'), 'bannerimages');
            // \dd($BannerImageLocation);
            // //get filename with extension
            // $filenamewithextension = $request->file('banner_image')->getClientOriginalName();

            // //get filename without extension
            // $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            // //get file extension
            // $extension = $request->file('banner_image')->getClientOriginalExtension();

            // //filename to store
            // $filenametostore = $filename.'_'.time().'.'.$extension;

            // //small thumbnail name
            // $smallthumbnail = 'small_'.$filename.'_'.time().'.'.$extension;

            // //medium thumbnail name
            // $mediumthumbnail = 'medium_'.$filename.'_'.time().'.'.$extension;

            // //large thumbnail name
            // $largethumbnail = 'large_'.$filename.'_'.time().'.'.$extension;

            // //Upload File
            // $request->file('banner_image')->storeAs('public/bannerimages', $filenametostore);
            // $request->file('banner_image')->storeAs('public/bannerimages/thumbnail', $smallthumbnail);
            // $request->file('banner_image')->storeAs('public/bannerimages/thumbnail', $mediumthumbnail);
            // $request->file('banner_image')->storeAs('public/bannerimages/thumbnail', $largethumbnail);

            // //create small thumbnail
            // $smallthumbnailpath = public_path('storage/bannerimages/thumbnail/'.$smallthumbnail);
            // $this->createThumbnail($smallthumbnailpath, 300, 185);

            // //create medium thumbnail
            // $mediumthumbnailpath = public_path('storage/bannerimages/thumbnail/'.$mediumthumbnail);
            // $this->createThumbnail($mediumthumbnailpath, 550, 250);

            // //create large thumbnail
            // $largethumbnailpath = public_path('storage/bannerimages/thumbnail/'.$largethumbnail);
            // $this->createThumbnail($largethumbnailpath, 1920, 1080);

        }

        $banner = new Banner;
        $banner->banner_image_title=$request->input('banner_image_title');
        $banner->banner_image=$BannerImageLocation;
        $banner->save();

        return redirect(route('admin.gallery.banner.index'))->with('success', "Banner image uploaded successfully.");

    }

    public function banner_delete($id){
        $banner = Banner::find($id);
        $this->deleteBanner($banner->banner_image);

        $banner->delete();

        return redirect(route('admin.gallery.banner.index'))->with('success', 'Image deleted from gallery');
    }
}
