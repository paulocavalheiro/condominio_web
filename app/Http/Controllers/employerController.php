<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
use Illuminate\Support\Facades\Hash;

class employerController extends Controller
{

    public function index (){

        $users = User::where('isAdmin','=',2)
                            ->where('status','<>',0)
                            ->paginate(10);
        return view('admin/employers/index',array('users'=>$users));

    }


    public function create (){
        return view('admin/employers/create');
    }


    public function store(request $request){

        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6'
        ];

        $customMessages = [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O campo nome deve ter pelo menos :min caracteres.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'O campo senha deve ter pelo menos :min caracteres.'    
        ];

        $this->validate($request, $rules, $customMessages);

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


    public function busca(request $request){

        $busca = $request->input('buscaUsuario');
        if(!$busca){
            return $this->index();
        }else{  
            $users = User::where(function($query) use ($busca) {
                $query->where('name', 'LIKE', '%' . $busca . '%')
                    ->orWhere('email', 'LIKE', '%' . $busca . '%');
            })
            ->where('isAdmin', '=', 2)
            ->where('status', '=', 1)
            ->paginate(10);
        }

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
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id

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
