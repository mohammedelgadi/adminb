<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLangsInterpreteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('langinterpreteurs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('langs_init_id')->unsigned()->index();
            $table->foreign('langs_init_id')->references('id')->on('langs');
            $table->integer('langs_dest_id')->unsigned()->index();
            $table->foreign('langs_dest_id')->references('id')->on('langs');
            $table->integer('interpreteurs_id')->unsigned()->index();
            $table->foreign('interpreteurs_id')->references('id')->on('interpreteurs');
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
        Schema::drop('langinterpreteurs');
    }
}
