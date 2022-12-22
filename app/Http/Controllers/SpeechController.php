<?php

namespace App\Http\Controllers;

use App\Models\Speech;
use Illuminate\Http\Request;
use App\Http\Requests\SpeechRequest;
use Image;
class SpeechController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $speech = Speech::orderBy('id', 'desc')->get();
        $speechCount = Speech::count();
         return view('backend.speech.index',['speech'=>$speech,'speechCount'=> $speechCount,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.speech.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpeechRequest $request)
    {
        //
        $speech = Speech::create($request->all());
        if ($request->hasFile('file')) {
            $this->_uploadfile($request, $speech);
        }

        if ($request->hasFile('logo')) {
            $this->_uploadImage($request, $speech);
        }
        return redirect()->route('speech.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Speech  $speech
     * @return \Illuminate\Http\Response
     */
    public function show(Speech $speech)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Speech  $speech
     * @return \Illuminate\Http\Response
     */
    public function edit(Speech $speech)
    {
        //
        return view('backend.speech.edit',[
            'edit' => $speech
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Speech  $speech
     * @return \Illuminate\Http\Response
     */
    public function update(SpeechRequest $request, Speech $speech)
    {
        //
        $speech->update($request->all());
        if ($request->hasFile('file')) {
            @unlink('storage/'.$speech->file);
            $this->_uploadfile($request, $speech);
        }

        if ($request->hasFile('logo')) {
            @unlink('storage/'.$speech->logo);
            $this->_uploadImage($request, $speech);
        }
        return redirect()->route('speech.index')->with('success','Data inserted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Speech  $speech
     * @return \Illuminate\Http\Response
     */
    public function destroy(Speech $speech)
    {
        //
        if(!empty($speech->logo));
        @unlink('storage/'.$speech->logo);
        if(!empty($speech->file));
        @unlink('storage/'.$speech->file);
        $speech->delete();
        return redirect()->route('speech.index')->with('status','Data deleted successfully!');
    }


    private function _uploadfile($request, $speech)
    {
        # code...
        if($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            
                  $request->file->move('storage/',$fileName);

           
            $speech->file = $fileName;
            $speech->save();
        }
       
    }



    private function _uploadImage($request, $about)
    {
        # code...
        if( $request->hasFile('logo') ) {
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1000, 700)->save('storage/' . $filename);
            $about->logo = $filename;
            $about->save();
        }
       
    }
}
