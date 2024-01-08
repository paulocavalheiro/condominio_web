<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class utilitiesController extends Controller
{
    // carrega sessão usuario logado
    public function sessionUser(){

        $session = session()->get('userSession');
        return ($session);
        // array userSession -> ['name'],['id'],['isAdmin']

    }


    // converte data BR para Eua
    public function dateToEua($dateBr){

        $dateArray = explode("/",$dateBr);
        $dateEua = Carbon::create($dateArray[2], $dateArray[1], $dateArray[0]);

        return ($dateEua);

    }

    // converte data Eua para BR
    public function dateToBr($dateEua){
    }


}
