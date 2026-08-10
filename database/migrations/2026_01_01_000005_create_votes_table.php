<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('voter_id')->constrained('voters')->cascadeOnDelete();
            $table->foreignId('candidate_id')->constrained('candidates')->cascadeOnDelete();
            $table->foreignId('election_id')->constrained('elections')->cascadeOnDelete();
            $table->timestamp('voted_at')->useCurrent();
            $table->string('ip_address')->nullable();
            $table->timestamps();

            // Prevent duplicate voting per voter per election
            $table->unique(['voter_id', 'election_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
