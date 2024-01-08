<?php

namespace App\Http\Controllers;

use App\Service;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;


class servicesController extends Controller
{


    private $user_controller;
    private $utilities_controller;

    // acesso controller usuarios/utilities
    public function __construct(userController $usuariosController, utilitiesController $utilitiesController){

        $this->user_controller = $usuariosController;
        $this->utilities_controller = $utilitiesController;

    }


    public function create(){

        $users = $this->user_controller->listAptNumbers();
        return view('admin/services/create',($users));

    }


    public function index(){

        $services = Service::where('status', '=', 1)
                            ->paginate(10);
        return view('admin/services/index',array('services'=>$services));

    }


    public function store (request $request){

        $this->validate($request,[
            'nameComp' => 'required|min:3',
            'responsible' => 'required',
            'address' => 'required|min:5',
            'iniServ' => 'required',
            'endServ' => 'required',
            'aptNumber' => 'required'
        ]);

        $dateBegin = $this->utilities_controller->dateToEua($request->input('iniServ'));
        $dateEnd   = $this->utilities_controller->dateToEua($request->input('endServ'));

        $service = new Service();
        $service->nameComp = $request->input('nameComp');
        $service->responsibleComp = $request->input('responsible');
        $service->addressComp = $request->input('address');
        $service->iniDateService = $dateBegin;
        $service->endDateService = $dateEnd;
        $service->cityComp = $request->input('city');
        $service->phoneComp = $request->input('phone');
        $service->fk_idUser = $request->input('aptNumber');
        $service->typeService = $request->input('type');
        $service->status = 1;
        $service->block = $request->input('block');
        $service->aptNumber = $request->input('aptNumber');
        $service->created_at = now()->timestamp;

        if($service->save()){
            return redirect ('admin/services/create')->with('success','Registro efetuado');
        }


    }


    public function busca(request $request){

        $busca = $request->input('buscaServ');
        $services = Service::where('nameComp', 'LIKE', '%' . $busca . '%')
            ->where('status', '=', 1)
            ->orwhere('aptNumber', '=', $busca )
            ->paginate(10);

        return view('admin/services/index', array('services' => $services, 'busca'=>$busca ));

    }

    public function destroy ($id){

        $service = Service::find($id);
        $service->status = 0;

        if($service->update()){
            return redirect('admin/services/')->with('success','Registro deletado');
        }

    }


    public function edit($id){

        $service = Service::find($id);
        $users = $this->user_controller->listAptNumbers();
        return view('admin/services/edit',($users),compact('service','id'));

    }

    public function update($id,request $request){

        $service = Service::find($id);

        $this->validate($request,[
            'nameComp' => 'required|min:3',
            'responsible' => 'required',
            'address' => 'required|min:5',
            'iniServ' => 'required',
            'endServ' => 'required',
            'aptNumber' => 'required'
        ]);

        $dateBegin = $this->utilities_controller->dateToEua($request->input('iniServ'));
        $dateEnd   = $this->utilities_controller->dateToEua($request->input('endServ'));

        $service->nameComp = $request->input('nameComp');
        $service->responsibleComp = $request->input('responsible');
        $service->addressComp = $request->input('address');
        $service->iniDateService = $dateBegin;
        $service->endDateService = $dateEnd;
        $service->cityComp = $request->input('city');
        $service->phoneComp = $request->input('phone');
        $service->fk_idUser = $request->input('aptNumber');
        $service->typeService = $request->input('type');
        $service->block = $request->input('block');
        $service->aptNumber = $request->input('aptNumber');
//        $service->updated_at = now()->timestamp;

        if($service->update()){
            return redirect( 'admin/services/'.$id.'/edit')->with('message','Registro alterado');
        }

    }


}
