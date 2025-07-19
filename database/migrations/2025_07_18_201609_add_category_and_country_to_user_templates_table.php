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
        Schema::table('user_templates', function (Blueprint $table) {
            // Добавляем поле для страны после user_id
            $table->string('country_code')->after('user_id');

            // Добавляем поле для связи с категорией
            $table->foreignId('category_id')->after('country_code')->constrained('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_templates', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn(['country_code', 'category_id']);
        });
    }
};
