<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email', 100)->nullable();
            $table->integer('gender_id')->unsigned()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 60)->nullable();
            $table->string('tel', 60)->nullable();
            $table->boolean('is_admin')->unsigned()->nullable()->default('0');
            $table->timestamp('check_in')->useCurrent();
            $table->timestamp('check_out')->useCurrent();


            $table->rememberToken();
            $table->timestamps();
            $table->index(["is_admin"]);
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
};
