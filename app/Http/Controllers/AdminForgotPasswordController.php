<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
class AdminForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;
    public function broker()
    {
        return Password::broker('admins');
    }
    public function showLinkRequestForm()
    {
        return view('admin.email');
    }
}