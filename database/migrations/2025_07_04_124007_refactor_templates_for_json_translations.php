<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // Удаляем колонки из основной таблицы
        Schema::table('templates', function (Blueprint $table) {
            $table->dropColumn(['header_html', 'body_html', 'footer_html']);
        });
        // Добавляем их в таблицу переводов
        Schema::table('template_translations', function (Blueprint $table) {
            $table->text('header_html')->nullable();
            $table->text('body_html')->nullable();
            $table->text('footer_html')->nullable();
        });
    }
    public function down(): void { // Для отката
        Schema::table('template_translations', function (Blueprint $table) {
            $table->dropColumn(['header_html', 'body_html', 'footer_html']);
        });
        Schema::table('templates', function (Blueprint $table) {
            $table->text('header_html')->nullable();
            $table->text('body_html')->nullable();
            $table->text('footer_html')->nullable();
        });
    }
};
