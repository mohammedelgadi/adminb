<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('demande_id')->unsigned()->index();
            $table->foreign('demande_id')->references('id')->on('demandes');
            $table->integer('interpreteur_id')->unsigned()->index();
            $table->foreign('interpreteur_id')->references('id')->on('interpreteurs');
            $table->float('total');
            // par defaut en cours
            $table->integer('activation')->default(1);
            // mail sended
            $table->integer('reminder')->default(1);
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
        Schema::drop('devies');
    }
}
