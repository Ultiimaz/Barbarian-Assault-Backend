<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CityMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table)
        {
            $table->string('id')->unique();
            $table->integer("LoggingCampLevel");
            $table->integer("SilverMineLevel");
            $table->integer("IronMineLevel");
            $table->integer("AcademyLevel");
            $table->string("CityName"); // because of UUID
            $table->string("Academy")->nullable(); // because of UUID and possible to not have been build yet
            $table->string("Owner_id"); // because of UUID
            $table->string("Garrison_id")->nullable(); // because of UUID and possible to not have been build yet
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
        //
    }
}
