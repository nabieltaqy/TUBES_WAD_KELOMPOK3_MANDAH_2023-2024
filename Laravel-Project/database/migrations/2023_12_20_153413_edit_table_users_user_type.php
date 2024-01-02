<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('user_type', ['Super Admin', 'Admin', 'Teknisi', 'Keuangan'])->change();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Mengembalikan kolom 'user_type' ke kondisi semula
            $table->enum('user_type', ['Super Admin', 'Admin'])->change();
        });
    }
};
