<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->string('card_number')->primary();
            $table->string('account_holder_name');
            $table->integer('funds');
            $table->string('cvv')->unique();
        });


        Schema::create('banks', function (Blueprint $table) {
            $table->string('number')->primary();
            $table->string('name');
            $table->string('cvv')->unique();
            $table->string('expiry');
            $table->boolean('default')->default(false);
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('number')->references('card_number')->on('bank_accounts')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
        Schema::dropIfExists('banks');
    }
};
