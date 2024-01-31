<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
 

    public function index()
    {
        if(\auth::check()) {
            if (auth()->user()->isAdmin == 1 || auth()->user()->isAdmin == 2) {

                return redirect('admin/admins/');

            } else {

                return view('/welcome');

            }
        }else{
            return view('auth/');
        }

    }

    public function admin()
    {
        return view('/welcome');
    }




}
