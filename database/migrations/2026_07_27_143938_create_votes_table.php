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
      Schema::create('votes', function (Blueprint $table) {
    $table->id();

    $table->foreignId('candidate_info_id')
        ->constrained('candidate_infos')
        ->cascadeOnDelete();

    $table->unsignedBigInteger('user_id');

    $table->timestamps();

    $table->unique(['candidate_info_id', 'user_id']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
