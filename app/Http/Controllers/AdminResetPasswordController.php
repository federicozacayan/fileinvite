<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;// check it out
use Illuminate\Support\Facades\Password;// check it out
class AdminResetPasswordController extends Controller
{
    use ResetsPasswords;
    protected $redirectTo = '/admin/login';
    public function broker()
    {
        return Password::broker('admins');
    }
    public function showResetForm(Request $request, $token = null)
    {
        return view('admin.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}