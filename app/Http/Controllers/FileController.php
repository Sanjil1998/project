<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
Use App\User;
Use App\Document;
Use Storage;

class FileController extends Controller
{

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

        if($request->hasfile('file'))
         {
            foreach ($request->file('file') as $file) {
                $filename=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $filename);



            }
        }

        $check = new Document;
        $check->file=$filename;
        $check->save();

        return back()->with('success', 'Great! files has been successfully uploaded.');

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
}
