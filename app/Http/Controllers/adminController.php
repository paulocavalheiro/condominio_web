<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{

    public function create(){
        return view('admin/admins/create');
    }


    public function index(){

        $users = User::where('isAdmin','=',1)
            ->where('status','<>',0)
            ->paginate(10);
        return view('admin/admins/index',array('users'=>$users));

    }


    public function store(request $request){

        $this->validate($request,[
            'name' => 'required|min:5',
            'email' => 'required|unique:users',
            'password' => 'required|min:6'

        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->get('password'));
        $user->isAdmin = 1;
        $user->status = 1;

        if($user->save()){
            return redirect('admin/admins/create')->with('message','Registro efetuado');
        }
    }


    public function edit($id){

        $user = User::find($id);
        return view('admin/admins.edit',compact('user','id') );

    }


    public function update($id,request $request){

        $user = User::find($id);

        $this->validate($request,[
            'name' => 'required|min:5',
            'email' => 'required',

        ]);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if($request->get('password')){
            $user->password = Hash::make($request->get('password'));
        }

        if($user->update()){
            return redirect( 'admin/admins/'.$id.'/edit')->with('message','Registro alterado');
        }

    }


    public function destroy ($id){

        $user = User::find($id);
        $user->status = 0;

        if($user->update()){
            return redirect('admin/admins/')->with('message','Registro deletado');
        }

    }


    public function busca(request $request){

        $busca = $request->input('buscaUsuario');
        $users = User::where('name', 'LIKE', '%' . $busca . '%')
            ->orwhere('email', 'LIKE', '%' . $busca . '%')
            ->where('isAdmin', '=', 1)
            ->where('status', '=', 1)
            ->paginate(10);

        return view('admin/admins/index', array('users' => $users, 'busca'=>$busca ));
    }


}