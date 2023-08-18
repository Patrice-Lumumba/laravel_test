<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('mat_client')->nullable();
            $table->string('sexe')->nullable();
            $table->string('firstname')->nullable();
            $table->string('gender')->nullable();
            $table->string('date_naiss')->nullable();
            $table->string('lieu_naiss')->nullable();
            $table->string('numb_identite')->nullable();
            $table->string('numb_passport')->nullable();
            $table->string('name_father')->nullable();
            $table->string('name_mother')->nullable();
            $table->string('company')->nullable();
            $table->string('numb_card_bank')->nullable();
            $table->enum('type_carb_bank', ['mastercard', 'visa']);
            $table->enum('status', ['active', 'inactive']);
            $table->string('adresse')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('clients');
    }
};
