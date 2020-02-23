<?php

namespace App\Http\Controllers;

use App\Process;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\DocumentRequest;

class ProcessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admins');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => ['required'],
            'requirement_id' => ['required'],
            'json' => ['required']
            ]);
        $process = Process::create($request->all());
        $request->session()->flash('success', 'Requirement "'.$process->requirement->name.'" asigned to Customer "'.$process->customer->name.'" successfully.');

        
        $data = $this->getDataToEdit( $process->id );
        Mail::to( $process->customer->email )->send(new DocumentRequest( $data ));
        return redirect("admin/customer/".$process->customer->id."/edit");
    }

    public function mail(){
        return view('admin.process.updateM', $this->getDataToEdit( 2 ));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function show(Process $process)
    {
        dd($process);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function edit(Process $process)
    {
        $data = $this->getDataToEdit($process->id);
        return view('admin.process.update', $data);
    }

    public function getDataToEdit($processId){
        // DB::enableQueryLog();
        $files = DB::table('processes')
            ->join('file_types', 'file_types.requirement_id', '=', 'processes.requirement_id')
            ->leftJoin('files', function ($join) {
                $join->on([['files.file_types_id', '=', 'file_types.id'],['files.processes_id','=','processes.id']]);
            })
            ->join('customers', 'customers.id', '=', 'processes.customer_id')
            ->join('requirements', 'requirements.id', '=', 'processes.requirement_id')
            ->select( 
                'file_types.id as file_type_id',
                'file_types.name as file_type_name',
                'file_types.description as file_type_description',
                'files.name as file_name',
                'files.id as file_id',
                'files.status as status',
                'customers.id as customer_id',
                'customers.name as customer_name',
                'customers.email as customer_email',
                'requirements.name as requirements_name',
                'requirements.description as requirements_description',
                'requirements.days as requirements_days',
                'processes.created_at as processes_created_at',
                'processes.id as processes_id',
            )
            ->where([
                ['processes.id','=',$processId]
            ])
            ->get();

            foreach ($files as  $file) {
                $arr = json_decode($file->status, true);
                $file->status = (isset($arr['whatched']) && $arr['whatched']== true)?true:false;
            }
        // dd(DB::getQueryLog());
        // dd($files);
        
        $left = \Carbon\Carbon::parse($files[0]->processes_created_at)->startOfDay()->addDays(
            $files[0]->requirements_days +1
        )->addMinutes(-1)->diffInDays(\Carbon\Carbon::now());

        $past = \Carbon\Carbon::parse($files[0]->processes_created_at)->startOfDay()->addDays(
            $files[0]->requirements_days+1
        )->isPast();

        if($left > 7){
            $bgColor = 'success';
        } elseif($left > 5) {
            $bgColor = 'info';
        } else {
            $bgColor = 'danger';
        }
        if($files[0]->requirements_days==0){
            $files[0]->requirements_days =+0.0001;
        }
       
        $progress = ((1-$left/$files[0]->requirements_days)*100);
        if($past){
            $progress = 100;
            $bgColor = 'danger';
        }
        return [
            'files' => $files,
            'left'=> $left,
            'isPast' => $past,
            'progress' => $progress,
            'bgColor' => $bgColor
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Process $process)
    {
        // $process->update($request->all());
        // return redirect("admin/customer/".$process->customer->id."/edit");
        return "//@todo update process";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function destroy(Process $process)
    {
        //
    }
}
