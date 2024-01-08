<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $fileble = [
            'nameComp','responsibleComp','phoneComp','addressComp','cityComp','iniDateService','endDateService','typeService', 'fk_idUser'
    ];

    protected $table = 'services';
}

