<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('content');

            $table->integer('client_id')->unsigned()->index();
            $table->foreign('client_id')->references('id')->on('clients');

            $table->integer('langue_ini')->unsigned()->index();
            $table->foreign('langue_ini')->references('id')->on('langs');
            
            $table->integer('langue_dest')->unsigned()->index();
            $table->foreign('langue_dest')->references('id')->on('langs');

            $table->integer('adresse_id')->unsigned()->index();
            $table->foreign('adresse_id')->references('id')->on('adresses');

            $table->integer('etat_id')->unsigned()->index();
            $table->foreign('etat_id')->references('id')->on('etats');
            
            $table->timestamp('dateEvent');
            $table->timestamp('dateEndEvent');
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
        Schema::drop('demandes');
    }
}
