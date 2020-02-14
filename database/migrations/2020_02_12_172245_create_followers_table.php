<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguidores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fans_face')->nullable();
            $table->date('data_face');
            $table->integer('seguidores_insta')->nullable();
            $table->date('data_insta');
            $table->integer('contatos_linkedin')->nullable();
            $table->date('data_contatos_linkedin');
            $table->integer('inscritos')->nullable();
            $table->date('data_youtube');
            $table->integer('seguidores_twitter')->nullable();
            $table->date('data_seguidores');
            $table->unsignedBigInteger('id_company');
            $table->timestamps();
        });

        Schema::table('seguidores', function($table) {
            $table->foreign('id_company')->references('id')->on('companies')->onDelete('cascade');;
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seguidores');
    }
}
