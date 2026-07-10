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
        Schema::create('candidate_infos', function (Blueprint $table) {
            $table->id();
             $table->string('fullname');
            $table->string('email')->unique();
            $table->string('phone', 10)->unique();
            $table->string('citizenship_no')->unique();

            $table->date('dob');
            $table->enum('gender', ['Male', 'Female', 'Other']);

            $table->string('party');
            $table->string('position');

            $table->text('address');
            $table->text('manifesto')->nullable();

            $table->string('photo');
            $table->string('party_logo')->nullable();

            $table->string('password');

            $table->enum('status', [
                'Pending',
                'Approved',
                'Rejected'
            ])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_infos');
    }
};
