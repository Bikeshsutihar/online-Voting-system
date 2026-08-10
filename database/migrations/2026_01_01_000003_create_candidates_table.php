<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('election_id')->nullable()->constrained('elections')->nullOnDelete();
            $table->string('name');
            $table->string('email')->unique();
            $table->date('dob');
            $table->string('class');
            $table->string('student_id')->unique();
            $table->string('party_name');
            $table->string('logo'); // relative path stored in DB (public/uploads/...)
            $table->string('phone_no');
            $table->string('id_card_photo'); // relative path stored in DB (public/uploads/...)
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamp('applied_at')->useCurrent();
            $table->foreignId('approved_by')->nullable()->constrained('admins')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
