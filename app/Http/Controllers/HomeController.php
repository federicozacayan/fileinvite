<?php

namespace App\Http\Controllers;

use App\Process;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        // DB::enableQueryLog();
  
        $requirements = DB::table('processes')
        ->join('customers', 'customers.id', '=', 'processes.customer_id')
        ->join('requirements', 'requirements.id', '=', 'processes.requirement_id')
        ->select('processes.id', 'requirements.name')
        ->where('customers.email', '=', $user->email)
        ->get();

        return view('home', ['data'=>$requirements]);
    }


    public function requirement($id){
        $process = new ProcessController();
        $data = $process->getDataToEdit($id);
        return view('requirement', $data);
    }
}
