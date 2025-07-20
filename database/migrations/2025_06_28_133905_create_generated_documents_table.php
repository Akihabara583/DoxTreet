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
        Schema::create('generated_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // ✅ ШАГ 1: Делаем поле template_id необязательным,
            // так как документ может быть создан из шаблона пользователя.
            $table->foreignId('template_id')->nullable()->constrained()->onDelete('cascade');

            // ✅ ШАГ 2: Добавляем новое поле для связи с пользовательскими шаблонами.
            // Оно тоже необязательное.
            $table->foreignId('user_template_id')->nullable()->constrained()->onDelete('cascade');

            $table->json('data')->comment('User submitted data for the template');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generated_documents');
    }
};
