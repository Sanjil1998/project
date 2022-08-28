<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Image;


trait UploadFiles {
    // public function createThumbnail($path, $width, $height){
    //     $img = Image::make($path)->resize($width, $height, function ($constraint) {
    //     $constraint->aspectRatio();
    //     });
    //     $img->save($path);

    // }

    public function uploadImage(UploadedFile $file, $location){

        //get filename with extension
        $filenamewithextension = $file->getClientOriginalName();

        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //get file extension
        $extension = $file->getClientOriginalExtension();

        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;

        // //small thumbnail name
        // $smallthumbnail = 'small_'.$filename.'_'.time().'.'.$extension;

        // //medium thumbnail name
        // $mediumthumbnail = 'medium_'.$filename.'_'.time().'.'.$extension;

        // //large thumbnail name
        // $largethumbnail = 'large_'.$filename.'_'.time().'.'.$extension;

        //Upload File
        Image::make($file)->save(public_path('upload/'.$location.'/'.$filenametostore));
        // $file->save($location, $filenametostore);


        // $file->storeAs('public/galleryimages/thumbnail', $smallthumbnail);
        // $file->storeAs('public/galleryimages/thumbnail', $mediumthumbnail);
        // $file->storeAs('public/galleryimages/thumbnail', $largethumbnail);

        // create small thumbnail
        if (!file_exists('upload/small/'.$location)) {
            File::makeDirectory('upload/small/'.$location, 0777, true, true);
        }

        $smallthumbnailpath = public_path('upload/small/'.$location.'/'.$filenametostore);
        Image::make($file)->resize(  150, 93, function ($constraint) {
            $constraint->aspectRatio();
            })->save($smallthumbnailpath);

        //create medium thumbnail
        if (!file_exists('upload/medium/'.$location)) {
            File::makeDirectory('upload/medium/'.$location, 0777, true, true);
        }
        $mediumthumbnailpath = public_path('upload/medium/'.$location.'/'.$filenametostore);
        Image::make($file)->resize( 300, 185, function ($constraint) {
            $constraint->aspectRatio();
            })->save($mediumthumbnailpath);

        //create large thumbnail
        if (!file_exists('upload/large/'.$location)) {
            File::makeDirectory('upload/large/'.$location, 0777, true, true);
        }
        $largethumbnailpath = public_path('upload/large/'.$location.'/'.$filenametostore);
        Image::make($file)->resize( 550, 250, function ($constraint) {
            $constraint->aspectRatio();
            })->save($largethumbnailpath);

        return $location.'/'.$filenametostore;
    }

    public function deleteImage($location){
        if(File::exists('upload/'.$location)) {
            File::delete('upload/'.$location);
        }
        if(File::exists('upload/small/'.$location)) {
            File::delete('upload/small/'.$location);
        }
        if(File::exists('upload/medium/'.$location)) {
            File::delete('upload/medium/'.$location);
        }
        if(File::exists('upload/large/'.$location)) {
            File::delete('upload/large/'.$location);
        }
    }

    // public function uploadDocument(UploadedFile $file, $location){

    //     $filename=$file->getClientOriginalName();

    //     $request->file->move(public_path('upload/'.$location.'/'.$filename));

    //     return $location.'/'.$filename;


    // }

    // public function deleteFile($location){
    //     if(File::exists('upload/'.$location)){
    //         File::delete('upload/'.$location);
    //     }
    //     if(File::exists('upload/files'.$location)){
    //         File::delete('upload/files'.$location);
    //     }

    // }

    public function uploadBanner(UploadedFile $file, $location){
        //get filename with extension
        $filenamewithextension = $file->getClientOriginalName();

        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //get file extension
        $extension = $file->getClientOriginalExtension();

        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;

        //Upload File
        Image::make($file)->save(public_path('upload/'.$location.'/'.$filenametostore));

        //create large thumbnail
        if (!file_exists('upload/bannerimages/'.$location)) {
            File::makeDirectory('upload/bannerimages/'.$location, 0777, true, true);
        }
        $bannerImage = public_path('upload/bannerimages/'.$location.'/'.$filenametostore);
        Image::make($file)->save($bannerImage);

        return $location.'/'.$filenametostore;
    }

    public function deleteBanner($location){
        if(File::exists('upload/'.$location)) {
            File::delete('upload/'.$location);
        }
        if(File::exists('upload/small/'.$location)) {
            File::delete('upload/small/'.$location);
        }
        if(File::exists('upload/medium/'.$location)) {
            File::delete('upload/medium/'.$location);
        }
        if(File::exists('upload/large/'.$location)) {
            File::delete('upload/large/'.$location);
        }
    }


    public function uploadProfileImage(UploadedFile $file, $location){
        //Get filename with the extension
        $filenameWithExt = $file->getClientOriginalName();

        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //Get just ext
        $extension = $file->getClientOriginalExtension();

        //Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;

        //Upload Image
        Image::make($file)->save(public_path('upload/'.$location.'/'.$fileNameToStore));
        // $path = $request->file('image')->storeAs('public/images', $fileNameToStore);

        if (!file_exists('upload/images/profileImage/'.$location)) {
            File::makeDirectory('upload/images/profileImage/'.$location, 0777, true, true);
        }
        $bannerImage = public_path('upload/images/profileImage/'.$location.'/'.$fileNameToStore);
        Image::make($file)->save($bannerImage);

        return $location.'/'.$fileNameToStore;


    }

    public function uploadWorkImage(UploadedFile $file, $location){
        //Get filename with the extension
        $filenameWithExt = $file->getClientOriginalName();

        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //Get just ext
        $extension = $file->getClientOriginalExtension();

        //Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;

        //Upload Image
        Image::make($file)->save(public_path('upload/'.$location.'/'.$fileNameToStore));
        // $path = $request->file('image')->storeAs('public/images', $fileNameToStore);

        // if (!file_exists('upload/images/workImage/'.$location)) {
        //     File::makeDirectory('upload/images/workImage/'.$location, 0777, true, true);
        // }
        // $bannerImage = public_path('upload/images/workImage/'.$location.'/'.$fileNameToStore);
        // Image::make($file)->save($bannerImage);

        // return $location.'/'.$fileNameToStore;

        // create small thumbnail
        if (!file_exists('upload/small/'.$location)) {
            File::makeDirectory('upload/small/'.$location, 0777, true, true);
        }

        $smallthumbnailpath = public_path('upload/small/'.$location.'/'.$fileNameToStore);
        Image::make($file)->resize(  150, 93, function ($constraint) {
            $constraint->aspectRatio();
            })->save($smallthumbnailpath);

        //create medium thumbnail
        if (!file_exists('upload/medium/'.$location)) {
            File::makeDirectory('upload/medium/'.$location, 0777, true, true);
        }
        $mediumthumbnailpath = public_path('upload/medium/'.$location.'/'.$fileNameToStore);
        Image::make($file)->resize( 300, 185, function ($constraint) {
            $constraint->aspectRatio();
            })->save($mediumthumbnailpath);

        //create large thumbnail
        if (!file_exists('upload/large/'.$location)) {
            File::makeDirectory('upload/large/'.$location, 0777, true, true);
        }
        $largethumbnailpath = public_path('upload/large/'.$location.'/'.$fileNameToStore);
        Image::make($file)->resize( 550, 250, function ($constraint) {
            $constraint->aspectRatio();
            })->save($largethumbnailpath);

        return $location.'/'.$fileNameToStore;


    }


}

// trait UploadDocuments {

//     public function uploadDocument(UploadedFile $file, $location){
//         dd('file is '.$file.' and location = '.$location);
//         // $filename=$file->getClientOriginalName();

//         // File::make($file)->save(public_path('upload/'.$location.'/'.$filename));

//         // return $location.'/'.$filename;


//     }
// }
