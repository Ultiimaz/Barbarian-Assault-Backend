<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id')->unique(); // because UUID
            $table->string('displayName');
            $table->string('email')->unique();
            $table->longText('base64_avatar_url')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('privelege_level')->default('1'); // 0 is banned 5 is admin
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
