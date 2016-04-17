<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInterpreteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interpreteurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('tel_portable');
            $table->text('commentaire');
            $table->string('tel_fixe');
            $table->string('image');
            
            $table->integer('adresse_id')->unsigned()->index();
            $table->foreign('adresse_id')->references('id')->on('adresses');

            $table->integer('langue_ini')->unsigned()->index();
            $table->foreign('langue_ini')->references('id')->on('langs');
            
            $table->integer('langue_dest')->unsigned()->index();
            $table->foreign('langue_dest')->references('id')->on('langs');

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
        Schema::drop('interpreteurs');
    }
}
