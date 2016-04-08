<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClientsLanguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     
        Schema::create('client_langue', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client_id')->unsigned()->index();
            $table->foreign('client_id')->references('id')->on('clients');

            $table->integer('langue_id')->unsigned()->index();
            $table->foreign('langue_id')->references('id')->on('langues');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('client_langue');
    }
}
