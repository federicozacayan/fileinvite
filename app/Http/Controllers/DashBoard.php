<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class DashBoard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admins');
    }
    
    public function secret(){
        $user = auth('admins')->user();
        // echo 'Admin id #'.$user->id;
        return view('admin.dashboard');
    }
    
}