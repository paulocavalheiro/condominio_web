<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Residence extends Model
{
    protected $fileble = [
        'type','address','price','status'
    ];

    protected $table = 'residences';
}
