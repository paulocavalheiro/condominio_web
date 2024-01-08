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


    public function index()
    {
        $users = User::where('isAdmin', '=', 0)
                            ->where('status','<>',0)
                            ->paginate(5);
        return view('admin/users/index',array('users'=>$users));

    }


    public function store(request $request)
    {

        $this->validate($request,[
            'name' => 'required|min:5',
            'email' => 'required|unique:users',
            'aptNumber' => 'required|min:3|unique:users',
            'block' => 'required',
            'password' => 'required|min:6'

        ]);

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

        $this->validate($request,[
            'name' => 'required|min:5',
            'email' => 'required',
            'aptNumber' => 'required|min:3',
            'block' => 'required'
        ]);

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
//            $this->emailPassword($request->input('name'),$request->input('email'));
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
        var_dump($user);
        if($user->update()){
            return redirect('admin/users/')->with('message','Registro deletado');
        }

    }


    public function busca(request $request){

        $busca = $request->input('buscaUsuario');
        $users = User::where('name', 'LIKE', '%' . $busca . '%')
                            ->orwhere('email', 'LIKE', '%' . $busca . '%')
                            ->paginate(10);
        return view('admin/users/index', array('users' => $users, 'busca'=>$busca ));

    }

    // listar todos apts
    public function listAptNumbers(){

        $users = User::where('status', '=', 1)
                            ->where('aptNumber','<>',0)
                            ->get();
        return array('users'=>$users);

    }


}
