<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
Use App\User;
Use App\Document;
Use Storage;
use App\Traits\UploadFiles;

class FileController extends Controller
{
    use UploadFiles;

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function save(Request $request)
    {
        request()->validate([
         'file' => 'required',
         'file.*' => 'mimes:doc,pdf,docx,txt,zip,png'
       ]);

        if($request->hasFile('file'))
         {

            foreach ($request->file('file') as $file) {
                $filename=$file->getClientOriginalName();
                $file->move(public_path('upload/').'/files/', $filename);
                // \dd($fileLocation);

            }
        }

        $check = new Document;
        $check->file=$filename;
        $check->save();

        return back()->with('success', 'Great! your file has been successfully uploaded.');

    }

    public function show($id){

        return Storage::download($document);

    }

    public function cv($id){
        $cv = DB::table('documents')
        ->where('file', 'CV.pdf')->get();
        return Storage::download($cv);
    }

    public function destroy($id){

        $document = Document::find($id);
        $document->delete();

        return back()->with('success', 'File has been deleted.');

    }

    // public function uploadDocument(UploadedFile $file, $location){

    //     $filename=$file->getClientOriginalName();

    //     $file->move(public_path('upload/'.$location.'/'.$filename));

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
}
