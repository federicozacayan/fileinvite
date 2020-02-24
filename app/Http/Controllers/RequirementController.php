<?php

namespace App\Http\Controllers;

use App\Requirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RequirementController extends Controller
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
        $data = Requirement::all();        
        return view('admin.requirement.index',[
            'data' => $data
        ]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Requirement::find(1)->filetype);
        return view('admin.requirement.create');
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
            'name' => ['required','unique:requirements'],
            'description' => ['required'],
            'days' => ['required', 'numeric']
            ]);
        $requirement = Requirement::create($request->all());
        $request->session()->flash('success', 'Requirement "'.$requirement->name.'" created successfully.');
        return redirect("admin/requirement/$requirement->id/edit");
    }

    public function search(Request $request, $name )
    {
        $requirements = DB::table('requirements')
            ->join('file_types', 'file_types.requirement_id', '=', 'requirements.id')
            ->select('requirements.*')
            ->where('requirements.name','LIKE','%'.$name.'%')
            ->groupBy('requirements.name')
            ->havingRaw('count(file_types.id )  > ?', [0])
            ->get();
        return $requirements;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function edit(Requirement $requirement)
    {
        // $requirement->update($requirement->all());
        // dd($requirement->id);
        return view('admin.requirement.update',[
            'requirement' => $requirement,
            'files' => $requirement->filetype
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requirement $requirement)
    {
        $request->validate([
            'name' => ['required',],
            'description' => ['required'],
            'days' => ['required', 'numeric']
            ]);
        $requirement->update($request->all());
        $request->session()->flash('success', 'Requirement "'.$requirement->name.'" updated successfully.');
        return redirect("admin/requirement/".$requirement->id."/edit");
    }
}
