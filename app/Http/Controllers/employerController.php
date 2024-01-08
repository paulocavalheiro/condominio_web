<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
use Illuminate\Support\Facades\Hash;

class employerController extends Controller
{


    public function create (){
        return view('admin/employers/create');
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
        $user->phone = $request->input('phone');
        $user->password = Hash::make($request->get('password'));
        $user->isAdmin = 2;
        $user->status = 1;

        if($user->save()){
            return redirect('admin/employers/create')->with('success','Registro efetuado');
        }
    }


    public function index (){

        $users = User::where('isAdmin','=',2)
                            ->where('status','<>',0)
                            ->paginate(10);
        return view('admin/employers/index',array('users'=>$users));

    }


    public function busca(request $request){

        $busca = $request->input('buscaUsuario');
        $users = User::where('name', 'LIKE', '%' . $busca . '%')
            ->where('status', '=' ,1)
            ->orwhere('email', 'LIKE', '%' . $busca . '%')
            ->paginate(10);
        return view('admin/employers/index', array('users' => $users, 'busca'=>$busca ));

    }

    public function edit($id){

        $user = User::find($id);
        return view('admin/employers/edit',compact('user','id'));

    }


    public function update($id,request $request){

        $user = User::find($id);

        $this->validate($request,[
            'name' => 'required|min:5',
            'email' => 'required',

        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        if($request->get('password')){
            $user->password = Hash::make($request->get('password'));
        }
        $user->isAdmin = 2;
        $user->status = 1;

        if($user->update()){

            return redirect( 'admin/employers/'.$id.'/edit')->with('success','Registro alterado');
        }


    }

    public function destroy($id){

        $user = User::find($id);
        $user->status = 0;

        if($user->update()){
            return redirect('admin/employers/')->with('success','Registro deletado');
        }
        
        
    }



}
