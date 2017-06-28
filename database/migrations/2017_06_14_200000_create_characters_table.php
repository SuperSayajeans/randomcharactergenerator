<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->string('name');
            $table->integer('race');
            $table->string('sex');
            $table->integer('self-esteem');
            $table->integer('lawfulness');
            $table->integer('optimism');
            $table->integer('risk');
            $table->integer('emotional');
            $table->integer('arrogance');
            $table->integer('selfishness');
            $table->integer('introversion');
            $table->integer('fat');
            $table->integer('height');
            $table->string('description');
            $table->string('personal_charct_array');
            $table->string('social_charct_array');
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
        Schema::dropIfExists('characters');
    }
}
