<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

   

    public function __construct(){

        $this->middleware('guest')->except('logout');

    }

    protected function authenticated(Request $request, $user){

        if ($user->isAdmin === 1) {
            return redirect()->intended('/admin/admins');
        } else{
            return redirect()->intended('admin/employers');
        }    
    }

    protected function validateLogin(Request $request) {

        $request->validate([
            $this->username() => 'required|string|email',
            'password' => 'required|string',
        ], [
            'password.required' => 'O campo senha é obrigatório.',
        ]);
    }
}
