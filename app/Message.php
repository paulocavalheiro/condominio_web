<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $filable = [
                'titleMessage','descriptionMessage','fk_id_user','statusMessage','dateMessage'
    ];


    protected $table = 'messages';
}
