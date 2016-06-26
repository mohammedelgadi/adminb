<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('demande_id')->unsigned()->index();
            $table->foreign('demande_id')->references('id')->on('demandes');
            $table->integer('devie_id')->unsigned()->index();
            $table->foreign('devie_id')->references('id')->on('devies');
            // par defaut en cours
            $table->integer('activation')->default(1);
            $table->integer('reminder')->default(0);
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
        Schema::drop('factures');
    }
}
