<?php

namespace App\Http\Controllers;

use App\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Exception;

class FilesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'processes_id' => ['required',],
            'file_types_id' => ['required'],
            'status' => ['required'],
            'file' => ['required']
            ]);

        $var = $request->file->store('files');
        $file = new Files;
        $file->name = $request->file->getClientOriginalName();
        $file->location = $var;
        $file->processes_id = $request->processes_id;
        $file->file_types_id = $request->file_types_id;
        $file->status = $request->status;
       
        $file->save();
        $request->session()->flash('success', 'File "'.$file->name.'" uploaded successfully.');
        return redirect('requirement/'.$request->processes_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {

        $user = auth()->user();
        // DB::enableQueryLog();
  
        $requirements = DB::table('files')
        ->join('processes', 'processes.id', '=', 'files.processes_id')
        ->join('customers', 'customers.id', '=', 'processes.customer_id')
        ->select('processes.id')
        ->where('files.id', '=', $id)
        ->where('customers.email', '=', $user->email)
        ->count();

        // dd(DB::getQueryLog());
        if($requirements > 0){
            $file = Files::find($id);
            return Storage::download($file->location, $file->name, []);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function adminDownload(Request $request, $id)
    {
        $file = Files::find($id);
        $statrus = json_decode($file->status, true);
        $statrus['whatched'] = true;
        if($request->thumbs == 'up'){
            $statrus['thumbs'] = $request->thumbs;
        }
        if($request->thumbs == 'down'){
            $statrus['thumbs'] = $request->thumbs;
            $statrus['reason'] = $request->reason;
        }
        $file->status = json_encode($statrus);
        $file->save();
        
        if($request->thumbs){
            return redirect('/admin/process/'.$file->processes_id.'/edit');
        }
        return Storage::download($file->location, $file->name, []); 
    }
}
