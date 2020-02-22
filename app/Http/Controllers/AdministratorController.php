<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AdministratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admins', ['only' => ['secret']]);
    }
    use AuthenticatesUsers;
    public function showLoginForm(Request $request)
    {

        if (auth('admins')->check()) {
            // $this->logout($request);
            return view('admin.alreadyloged');
        }
        return view('admin.login');
    }
    private $redirectTo = 'admin/area';
    public function secret()
    {
        $user = auth('admins')->user();
        echo 'Admin id #' . $user->id;
    }
    protected function guard()
    {
        return Auth::guard('admins');
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/admin/login');
    }
}
