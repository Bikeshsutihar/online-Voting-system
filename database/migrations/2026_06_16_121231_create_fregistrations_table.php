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
        Schema::create('fregistrations', function (Blueprint $table) {
            $table->id();
            $table->text('fullname');
            $table->string('email')->unique();
            $table->bigInteger('phone_number')->unique();
            $table->string('gender');
            $table->bigInteger('voter_id')->unique();
            $table->bigInteger('citizenship_no')->unique();
            $table->string('password');
            $table->string('confirm_password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fregistrations');
    }
};
