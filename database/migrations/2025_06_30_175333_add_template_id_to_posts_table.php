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
        Schema::table('posts', function (Blueprint $table) {
            // Добавляем колонку для ID связанного шаблона.
            // Она может быть пустой (nullable), если статья ни к чему не привязана.
            // constrained() и onDelete('set null') означают, что если шаблон будет удален,
            // в этой колонке просто установится значение NULL, и сайт не сломается.
            $table->foreignId('template_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Это позволит откатить изменения, если что-то пойдет не так
            $table->dropForeign(['template_id']);
            $table->dropColumn('template_id');
        });
    }
};
