<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class adminController extends Controller
{

    public function index(){

        $users = User::where('isAdmin','=',1)
            ->where('status','<>',0)
            ->paginate(10);
        return view('admin/admins/index',array('users'=>$users));

    }

    public function create(){
        return view('admin/admins/create');

    }

    public function store(request $request){
     
        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6'];


        $customMessages = [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O campo nome deve ter pelo menos :min caracteres.',
            'password.required' => 'O campo senha é obrigatória.',
            'password.min' => 'O campo senha deve ter pelo menos :min caracteres.'        
        ];
           
        $this->validate($request, $rules, $customMessages);
        
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

        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ];

        $customMessages = [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O campo nome deve ter pelo menos :min caracteres.',
               
        ];

        $this->validate($request, $rules, $customMessages);

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
        if(!$busca){
            return $this->index();
        }else{     
            
            $users = User::where(function($query) use ($busca){
                $query->where('name', 'LIKE', '%' . $busca . '%')
                ->orWhere('email', 'LIKE', '%' . $busca . '%');
            })
            ->where('isAdmin', '=', 1)
            ->where('status', '=', 1)
            ->paginate(10);

            return view('admin/admins/index', array('users' => $users, 'busca'=>$busca ));
        }
        
    }


}