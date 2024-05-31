<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('chiefs', function (Blueprint $table) {
            $table->text('description');
            $table->string('address');
            $table->string('rating');
            $table->string('salary');
        });
    }

    public function down(): void
    {
        Schema::table('chiefs', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('address');
            $table->dropColumn('rating');
            $table->dropColumn('salary');
        });
    }
};
