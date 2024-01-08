<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    public function handle($request, Closure $next)
    {

        if(\auth::check()){

            Session::put('userSession', [
                'name'=>auth()->user()->name,
                'id'=>auth()->user()->id,
                'isAdmin'=>auth()->user()->isAdmin
            ]);

            if(auth()->user()->isAdmin == 1 ){
                return $next($request);
            }
            if(auth()->user()->isAdmin == 2 ){
                return new Response(view('admin/error')->with('message','Acesso negado'));
            }

        }else{
            return redirect('home')->with('error','Acesso negado');
        }

//        Session::put('userSession', [
//            'name'=>auth()->user()->name,
//            'id'=>auth()->user()->id,
//            'isAdmin'=>auth()->user()->isAdmin
//        ]);
        //return redirect('home'    )->with('error','Acesso negado');
    }



}
