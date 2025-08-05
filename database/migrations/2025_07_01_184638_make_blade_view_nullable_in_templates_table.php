<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Добавляем это

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('templates', function (Blueprint $table) {
            // Изменяем колонку, чтобы она могла быть NULL
            $table->string('blade_view')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Перед откатом, заменяем все NULL значения на пустую строку,
        // чтобы избежать ошибки "Invalid use of NULL value".
        DB::table('templates')->whereNull('blade_view')->update(['blade_view' => '']);

        Schema::table('templates', function (Blueprint $table) {
            // Возвращаем как было (на случай отката)
            $table->string('blade_view')->nullable(false)->change();
        });
    }
};
