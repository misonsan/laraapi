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
         /*    originale del video
        Schema::create('users', function (Blueprint $table) {


            $table->bigIncrements('id');
            $table->string('name', 32);
            $table->string('email', 32)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            // campi opzionali
            $table->string('lastName', 32)->nullable();
            $table->string('phone', 16)->nullable();
            $table->string('province', 32)->nullable();
            $table->smallInteger('age', 0, true)->nullable();
            $table->string('fiscalcode', 16)->nullable();
            */

            /*  da risorse  */

            Schema::create('users', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name',32);
                $table->string('lastname', 32)->nullable();
                $table->char('fiscalcode', 16)->nullable();
                $table->string('province', 32)->nullable();
                $table->string('phone', 32)->nullable();
                $table->smallInteger('age', false, true)->nullable();
                $table->string('email', 32)->unique();
                $table->timestamp('email_verified_at')->nullable();
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
