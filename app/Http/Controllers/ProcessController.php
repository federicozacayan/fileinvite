<?php

namespace App\Http\Controllers;

use App\Process;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return redirect("admin/customer/".$process->customer->id."/edit");
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
                'files.name as file_name',
                'customers.id as customer_id',
                'customers.name as customer_name',
                'customers.email as customer_email',
                'requirements.name as requirements_name',
                'requirements.days as requirements_days',
                'processes.created_at as processes_created_at',
            )
            ->where([
                ['processes.id','=',$process->id]
            ])
            ->get();
        // dd(DB::getQueryLog());
        // dd($files);
        
        

        $left = \Carbon\Carbon::parse($files[0]->processes_created_at)->addDays(
            $files[0]->requirements_days
        )->diffInDays(\Carbon\Carbon::now());
        
        switch ($left) {
            case $left > 7:
                $bgColor = 'success';
                break;
            case $left > 5:
                $bgColor = 'info';
                break;
            default:
                $bgColor = 'danger';
                break;
        }
        return view('admin.process.update',[
            'files' => $files,
            'left'=> $left,
            'bgColor' => $bgColor
        ]);

        
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
