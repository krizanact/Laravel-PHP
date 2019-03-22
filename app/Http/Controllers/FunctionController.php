<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use DataTables;


use App\Document;


class FunctionController extends Controller
{


    /*Access control  without login */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {
        return view('documents.create');
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'title'=>'required',
            'doc_upload' =>'nullable|required|max:1999',
            'doc_type' => 'required'
        ]);


        //important UPLOAD code
        if ($request->hasFIle('doc_upload')) {
            // extension
            $filenameWithExt = $request->file('doc_upload')->getClientOriginalName();
            //get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get extensions
            $extension = $request->file('doc_upload')->getClientOriginalExtension();
            //store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //upload


            $path = $request->file('doc_upload')->storeAs('public/doc_upload', $fileNameToStore);
        } else {
            $fileNameToStore = 'nodocument';

        }

       $document = new Document;
       $document->title = $request->input('title');
       $document->user_id=auth()->user()->id;
       $document->doc_upload=$fileNameToStore;
       $document->doc_type=$request->input('doc_type');

        $document->save();

       // return $request;
       return redirect('/home')->with('success','Document Created');

    }



    public function edit($id)
    {
        $document = Document::find($id);
        return view('documents.edit')->with('document', $document);

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required',
            'doc_type' => 'required'

        ]);


        //important UPLOAD code
        if($request->hasFIle('doc_upload')){
            // extension
            $filenameWithExt = $request->file('doc_upload')->getClientOriginalName();
            //get filename
            $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get extension
            $extension=$request->file('doc_upload')->getClientOriginalExtension();
            //store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //upload
            $path=$request->file('doc_upload')->storeAs('public/doc_upload',$fileNameToStore);
        } else {
            $fileNameToStore =  Document::find($id)->doc_upload;

        }



        $document = Document::find($id);
        $document->title = $request->input('title');
        //delete old file when uploading new file
        Storage::delete('public/doc_upload/'.$document->doc_upload);
        $document->doc_upload=$fileNameToStore;
        $document->doc_type=$request->input('doc_type');
        $document->save();



        return redirect('/home')->with('success','Document Updated');


    }


    public function destroy($id)
    {
       $document= Document::find($id);

       //delete doc

        Storage::delete('public/doc_upload/'.$document->doc_upload);


       $document->delete();
        return redirect('/home')->with('success','Document Removed');
    }




}
