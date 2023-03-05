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
        Schema::create('bank', function (Blueprint $table) {
            $table->string('number')->primary();
            $table->string('name');
            $table->string('cvv');
            $table->date('expiry');
            $table->boolean('default')->default('false');
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank');
    }
};
