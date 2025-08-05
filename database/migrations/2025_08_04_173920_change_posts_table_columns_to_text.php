<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // <-- 1. Добавляем это

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Изменяем тип колонок на TEXT
            $table->text('title')->change();
            $table->text('body')->change();
            $table->text('meta_title')->nullable()->change();
            $table->text('meta_description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // <-- 2. Добавляем эту строку для очистки таблицы перед изменением структуры
        DB::table('posts')->truncate();

        Schema::table('posts', function (Blueprint $table) {
            // Возвращаем старый тип, если понадобится откат
            $table->string('title', 255)->change();
            // ВАЖНО: Возвращаем body тоже в string, а не text, чтобы откат был полным
            $table->string('body', 255)->change();
            $table->string('meta_title', 255)->nullable()->change();
            $table->string('meta_description', 255)->nullable()->change();
        });
    }
};
