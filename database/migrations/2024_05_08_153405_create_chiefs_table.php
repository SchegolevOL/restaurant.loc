<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chiefs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('patronymic')->nullable();
            $table->date('date_of_birth');
            $table->string('phone')->unique();;
            $table->string('email')->unique();;
            $table->integer('designation_id');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('twitter');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chiefs');
    }
};
