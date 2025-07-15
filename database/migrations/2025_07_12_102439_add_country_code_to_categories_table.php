<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        // Проверяем, существует ли таблица 'categories' и отсутствует ли в ней столбец 'country_code'
        if (Schema::hasTable('categories') && !Schema::hasColumn('categories', 'country_code')) {
            Schema::table('categories', function (Blueprint $table) {
                // Добавляем новый столбец 'country_code' типа VARCHAR с длиной 2 символа
                // Он будет nullable, так как существующие записи могут не иметь этого значения
                // и будет добавлен после столбца 'slug' для логической группировки
                $table->string('country_code', 2)->nullable()->after('slug');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        // Проверяем, существует ли таблица 'categories' и присутствует ли в ней столбец 'country_code'
        if (Schema::hasTable('categories') && Schema::hasColumn('categories', 'country_code')) {
            Schema::table('categories', function (Blueprint $table) {
                // Удаляем столбец 'country_code' при откате миграции
                $table->dropColumn('country_code');
            });
        }
    }
};
