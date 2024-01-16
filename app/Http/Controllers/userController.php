<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use TrueBV\Punycode;

class userController extends Controller
{

    public function create(){
        return view('admin.users.create');
    }


    public function index(){

        $users = User::where('isAdmin', '=', 0)
                            ->where('status','<>',0)
                            ->paginate(5);
        return view('admin/users/index',array('users'=>$users));

    }


    public function store(request $request){

        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|unique:users|email',
            'aptNumber' => 'required|min:3|unique:users',
            'block' => 'required',
            'password' => 'required|min:6'
        ];

        $customMessages = [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O campo nome deve ter pelo menos :min caracteres.',
            'aptNumber.required' => 'O campo número apt é obrigatório.',
            'aptNumber.min' => 'O campo número apt deve ter pelo menos :min caracteres.',
            'block.required' => 'O campo bloco é obrigatório.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'O campo senha deve ter pelo menos :min caracteres.'    
        ];

        $this->validate($request, $rules, $customMessages);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->get('password'));
        $user->isAdmin = 0;
        $user->status = 1;
        $user->phone = $request->input('phone');
        $user->veic1 = $request->input('veic1');
        $user->plate1 = $request->input('plate1');
        $user->veic2  = $request->input('veic2');
        $user->plate2 = $request->input('plate2');
        $user->aptNumber = $request->input('aptNumber');
        $user->block = $request->input('block');

        if($user->save()){
            return redirect('admin/users/create')->with('message','Registo efetuado');
        }
    }


    public function edit($id){

        $user = User::find($id);
        return view('admin/users/edit',compact('user','id'));
    }


    public function update($id, request $request){

        $user = User::find($id);

        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'aptNumber' => 'required|min:3',
            'block' => 'required'
        ];

        $customMessages = [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O campo nome deve ter pelo menos :min caracteres.',
            'aptNumber.required' => 'O campo número apt é obrigatório.',
            'aptNumber.min' => 'O campo número apt deve ter pelo menos :min caracteres.',
            'block.required' => 'O campo bloco é obrigatório.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'O campo senha deve ter pelo menos :min caracteres.'    
        ];

        $this->validate($request, $rules, $customMessages);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($request->get('password')){
            $user->password = Hash::make($request->get('password'));
        }
        $user->isAdmin = 0;
        $user->status = 1;
        $user->phone = $request->input('phone');
        $user->veic1 = $request->input('veic1');
        $user->plate1 = $request->input('plate1');
        $user->veic2  = $request->input('veic2');
        $user->plate2 = $request->input('plate2');
        $user->aptNumber = $request->input('aptNumber');
        $user->block = $request->input('block');

        if($user->update()){

            return redirect( 'admin/users/'.$id.'/edit')->with('message','Registro alterado');
        }

    }

    protected function emailPassword($name,$email){

        $msg = 'Sua nova senha do portal condolon ';

        $infoMail = array(
            'subject' => 'Nova senha portal',
            'name' => $name,
            'email' => $email,
            'msg' => $msg
        );

        // nao implementado
        Mail::send('admin.email.contact',$infoMail,function($message){

            $message->from('teste@email.com','paulo');
            $message->subject('Nova senha portal');
            $message->to('');
        });
        

    }


    public function destroy ($id){

        $user = User::find($id);
        $user->status = 0;
        
        if($user->update()){
            return redirect('admin/users/')->with('message','Registro deletado');
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
            ->where('isAdmin', '=', 0)
            ->where('status', '=', 1)
            ->paginate(10);

            return view('admin/users/index', array('users' => $users, 'busca'=>$busca ));
        }       

    }

    // listar todos apts
    public function listAptNumbers(){

        $users = User::where('status', '=', 1)
                            ->where('aptNumber','<>',0)
                            ->get();
        return array('users'=>$users);

    }


}
