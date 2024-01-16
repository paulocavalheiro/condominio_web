<?php

namespace App\Http\Controllers;

use App\Forum;
use Illuminate\Http\Request;
use App\Http\Controllers\utilitiesController;

class forumController extends Controller
{

    private $utilities_controller;

    // acesso controller utilities
    public function __construct(utilitiesController $utilitiesController){

          $this->utilities_controller = $utilitiesController;

    }

    // create view
    public function create(){

        return view('admin/forum/create');

    }


    // inserir
    public function store(request $request){

        $userInfo = $this->utilities_controller->sessionUser();

        $rules = [
            'title' => 'required|min:3',
            'description' => 'required|min:5'
        ];

        $customMessages = [
            'title.required' => 'O campo titulo é obrigatório.',
            'title.min' => 'O campo titulo deve ter pelo menos :min caracteres.',
            'description.required' => 'O campo descrição é obrigatório.',
            'description.min' => 'O campo descrição deve ter pelo menos :min caracteres.'    
        ];

        $this->validate($request, $rules, $customMessages);


        $this->validate($request, [
            'title' => 'required|min:3',
            'description' => 'required|min:5'
        ]);

        $forum = new Forum();
        $forum->titleForum = $request->input('title');
        $forum->descForum = html_entity_decode($request->input('description'));
        $forum->statusForum = 1;
        $forum->fk_id_userForum = $userInfo['id'];

        if ($forum->save()) {
            return redirect('admin/forum/create')->with('message', 'Registro efetuado');
        }

    }


    // listar
    public function index(){

        $foruns = Forum::where('statusForum', '=', 1)
            ->paginate(10);
        return view('admin/forum/index', array('foruns' => $foruns));

    }

    // delete
    public function destroy ($id){

        $forum = Forum::find($id);
        $forum->statusForum = 0;

        if($forum->update()){
            return redirect('admin/forum/')->with('message','Registro deletado');
        }

    }

    // busca para editar
    public function edit($id){

        $forum = Forum::find($id);
        return view('admin/forum/edit',compact('forum','id'));

    }

    // update
    public function update($id,request $request){

        $forum = Forum::find($id);
        $userInfo = $this->utilities_controller->sessionUser();

        $this->validate($request, [
            'title' => 'required|min:3',
            'description' => 'required|min:5'
        ]);

        $forum->titleForum = $request->input('title');
        $forum->descForum = html_entity_decode($request->input('description'));
        $forum->fk_id_userForum = $userInfo['id'];

        if($forum->update()){
            return redirect('admin/forum/'.$id.'/edit')->with('message','Registro alterado');
        }

    }

    // busca
    public function busca(request $request){

        $busca = $request->input('buscaForum');
        $forum = Forum::where('titleForum', 'LIKE', '%' . $busca . '%')
            ->orwhere('created_at', 'LIKE', '%' . $busca . '%')
            ->paginate(10);

        return view('admin/forum/index', array('foruns' => $forum, 'busca'=>$busca ));

    }



}