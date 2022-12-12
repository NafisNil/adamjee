<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Requests\NoticeRequest;
use Image;
class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notice = Notice::orderBy('id', 'desc')->get();
        $noticeCount = Notice::count();
         return view('backend.notice.index',['notice'=>$notice,'noticeCount'=> $noticeCount,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticeRequest $request)
    {
        //
        $notice = Notice::create($request->all());
        if ($request->hasFile('file')) {
            $this->_uploadfile($request, $notice);
        }

        if ($request->hasFile('logo')) {
            $this->_uploadImage($request, $notice);
        }
        return redirect()->route('notice.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        //
        return view('backend.notice.edit',[
            'edit' => $notice
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(NoticeRequest $request, Notice $notice)
    {
        //
        $notice->update($request->all());
        if ($request->hasFile('file')) {
            @unlink('storage/'.$notice->file);
            $this->_uploadfile($request, $notice);
        }

        if ($request->hasFile('logo')) {
            @unlink('storage/'.$notice->logo);
            $this->_uploadImage($request, $notice);
        }
        return redirect()->route('notice.index')->with('success','Data inserted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        //
        if(!empty($notice->logo));
        @unlink('storage/'.$notice->logo);
        if(!empty($notice->file));
        @unlink('storage/'.$notice->file);
        $notice->delete();
        return redirect()->route('notice.index')->with('status','Data deleted successfully!');
    }

    private function _uploadfile($request, $notice)
    {
        # code...
        if($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            
                  $request->file->move('storage/',$fileName);

           
            $notice->file = $fileName;
            $notice->save();
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
