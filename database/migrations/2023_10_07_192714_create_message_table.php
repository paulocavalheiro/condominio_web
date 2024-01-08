<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titleMessage');
            $table->string('descriptionMessage')->nulable();
            $table->integer('statusMessage')->nulable();
            $table->integer('fk_id_user')->unsigned();
            $table->dateTime('dateMessage')->nulable();
            $table->longText('historicMessage')->nulable();
            $table->foreign('fk_id_user')->references('id')->on('users')->ondelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
