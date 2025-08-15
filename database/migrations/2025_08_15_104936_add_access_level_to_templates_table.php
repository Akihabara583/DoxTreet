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
        Schema::table('templates', function (Blueprint $table) {
            // Добавляем поле для определения уровня доступа к шаблону.
            // 'free' - бесплатный, 'standard' - для стандартной подписки, 'pro' - для про.
            // По умолчанию все существующие шаблоны станут бесплатными.
            $table->string('access_level')->default('free')->after('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('templates', function (Blueprint $table) {
            $table->dropColumn('access_level');
        });
    }
};
