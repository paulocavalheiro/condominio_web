<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nameComp');
            $table->string('responsibleComp');
            $table->string('phoneComp')->nullable();
            $table->string('addressComp')->nullable();
            $table->string('cityComp')->nullable();
            $table->dateTime('iniDateService')->nullable();
            $table->dateTime('endDateService')->nullable();
            $table->string('typeService')->nullable();
            $table->integer('status');
            $table->integer('block')->nullable();
            $table->integer('aptNumber')->nullable();
            $table->integer('fk_idUser')->unsigned();
            $table->foreign('fk_idUser')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('services');
    }
}
