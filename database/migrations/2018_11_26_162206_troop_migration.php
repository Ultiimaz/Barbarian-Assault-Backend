<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TroopMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('troops', function (Blueprint $table)
        {
            $table->increments('troop_id'); //because we'll probably not create more than 65k different ingame troop types
            $table->string('troop_name');
            $table->integer('troop_time');
            $table->integer('troop_cost');
            $table->integer('AttackLevel');
            $table->integer('DefenceLevel');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
