<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddServicesTable extends Migration
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
            $table->string('service');
            $table->string('designation');
            $table->string('qantite');
            $table->string('Unite');
            $table->string('prix');
            $table->string('total');
            
            $table->integer('devie_id')->unsigned()->index();
            $table->foreign('devie_id')->references('id')->on('devies');
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
        Schema::drop('services');
    }
}
