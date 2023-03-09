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
        Schema::create('money_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_sender_id');
            $table->unsignedBigInteger('request_reciever_id');
            $table->double('amount');
            $table->string('reason');
            $table->string('status')->default('Not Resolved');
            $table->foreign('request_sender_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('request_reciever_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('money_requests');
    }
};
