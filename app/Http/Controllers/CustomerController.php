<?php

namespace App\Http\Controllers;

use App\Requirement;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
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
        $data = Customer::all();

        

        return view('admin.customer.index',[
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
        return view('admin.customer.create');
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
            'name' => ['required'],
            'email' => ['required', 'unique:customers']
            ]);
        $customer = Customer::create($request->all());
        $request->session()->flash('success', 'Customer "'.$customer->name.'" created successfully.');
        return redirect("admin/customer/$customer->id/edit");
    }

    public function search(Request $request, $name )
    {
        // Requirement $requirement
        $requirements = Customer::where('name','LIKE','%'.$name.'%')->get();
        return $requirements;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        // $requirements = Requirement::all(); 
        // dd($customer->process[0]->requirement_id);

        $requirements = DB::table('customers')
            ->join('processes', 'customers.id', '=', 'processes.customer_id')
            ->join('requirements', 'processes.requirement_id', '=', 'requirements.id')
            ->select('requirements.*', 'processes.id as processes_id')
            ->where('customers.id', '=', $customer->id)
            ->get();

            // dd($requirements);

        return view('admin.customer.update',[
            'customer' => $customer,
            'requirements' => $requirements
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());
        $request->session()->flash('success', 'Customer "'.$customer->name.'" updated successfully.');
        return redirect("admin/customer/".$customer->id."/edit");
    }

}
