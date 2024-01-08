<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class messageController extends Controller
{

    public function create(){

        //return view('admin/message/create');

    }

    // listar
    public function index(){

        $messages = Message::where('statusMessage','<>',0)
            ->paginate(10);
        //print_r($message);exit();
        return view('admin/message/index', array('messages' => $messages));

    }

    // visualizar
    public function view ($id){

        $messages = Message::find($id);
        return view('admin/message/view',compact('messages','id'));

    }

    // buscar
    public function busca(request $request){

        $busca = $request->input('buscaForum');
        $messages = Message::where('titleMessage','LIKE','%'.$busca.'%')
                            ->paginate(10);
                           // ->orwhere('');
        return view('admin/message/index',array('messages'=>$messages,'busca'=>$busca));




    }

}
