<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaplocalisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maplocalisations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('longitude');
            $table->integer('latitude');
            $table->string('nom_map');
            $table->string('type_map');
            $table->string('ville_map');
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
        Schema::table('maplocalisations', function (Blueprint $table) {
            //
        });
    }
}
