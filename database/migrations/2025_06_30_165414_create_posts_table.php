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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Заголовок статьи
            $table->string('slug')->unique(); // Уникальная ссылка (URL), например "kak-napisat-zayavlenie"
            $table->longText('body'); // Основной текст статьи
            $table->string('image')->nullable(); // Путь к изображению статьи (необязательно)
            $table->boolean('is_published')->default(false); // Опубликована ли статья (true/false)
            $table->timestamp('published_at')->nullable(); // Дата публикации

            // Поля для SEO (очень важно для Google)
            $table->string('meta_title')->nullable(); // SEO-заголовок для тега <title>
            $table->string('meta_description')->nullable(); // SEO-описание для тега <meta name="description">

            $table->timestamps(); // Поля created_at и updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
