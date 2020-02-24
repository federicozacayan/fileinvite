<?php

namespace App\Http\Controllers;

use App\FileType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admins');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => ['required'],
            'requirement_id' =>  ['required']
            ]);
        $product = FileType::create($request->all());
        $request->session()->flash('success', 'File type "'.$product->name.'" created was successfully.');
        return redirect("admin/requirement/$request->requirement_id/edit");
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FileType  $fileType
     * @return \Illuminate\Http\Response
     */
    public function edit(FileType $fileType)
    {
        return view('admin.filetype.update',[
            'filetype' =>$fileType,
            // 'requirement' => $fileType->requirement->name
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FileType  $fileType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileType $fileType)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required']
            ]);

        $fileType->update($request->all());
        $request->session()->flash('success', 'File type "'.$fileType->name.'" updated successfully.');
        return redirect("admin/requirement/".$fileType->requirement->id."/edit");
    }

}
