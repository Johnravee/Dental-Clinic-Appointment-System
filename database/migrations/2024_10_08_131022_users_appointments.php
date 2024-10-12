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
        Schema::create("users_appointments :", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("user_id")->references('id')->on('users')->cascadeOnDelete();
            $table->string("title");
            $table->string("concern");
            $table->dateTime("start");
        });
              
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};