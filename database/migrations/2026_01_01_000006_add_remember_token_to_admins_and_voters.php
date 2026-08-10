<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('admins') && !Schema::hasColumn('admins', 'remember_token')) {
            Schema::table('admins', function (Blueprint $table) {
                $table->rememberToken();
            });
        }

        if (Schema::hasTable('voters') && !Schema::hasColumn('voters', 'remember_token')) {
            Schema::table('voters', function (Blueprint $table) {
                $table->rememberToken();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('admins') && Schema::hasColumn('admins', 'remember_token')) {
            Schema::table('admins', function (Blueprint $table) {
                $table->dropRememberToken();
            });
        }

        if (Schema::hasTable('voters') && Schema::hasColumn('voters', 'remember_token')) {
            Schema::table('voters', function (Blueprint $table) {
                $table->dropRememberToken();
            });
        }
    }
};
