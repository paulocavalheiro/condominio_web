<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $filable = [
                            'titleForum','descForum','statusForum','fk_id_userForum','created_at','updated_at'
    ];


    protected $table = 'forums';
}
