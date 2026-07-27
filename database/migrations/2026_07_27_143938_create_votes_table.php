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

    $table->string('ip_address', 45);

    $table->timestamps();

    $table->unique(['candidate_info_id', 'ip_address']);
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
