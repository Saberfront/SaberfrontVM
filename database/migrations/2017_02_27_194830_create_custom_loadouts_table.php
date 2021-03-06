<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomLoadoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loadouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string("weapon_name");
            $table->string("secondary_name");
            $table->string("loadout_name");
            $table->integer("rid");
            $table->boolean("public");
            
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
        Schema::dropIfExists('loadouts');
    }
}
