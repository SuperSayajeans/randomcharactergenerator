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
            $table->int('race',10);
            $table->int('sex',8);
            $table->int('self-esteem',8);
            $table->int('lawfulness',8);
            $table->int('optimism',8);
            $table->int('risk',8);
            $table->int('emotional',8);
            $table->int('arrogance',8);
            $table->int('selfishness',8);
            $table->int('introversion',8);
            $table->int('fat',8);
            $table->int('height',8);
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
