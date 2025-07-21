<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('signed_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('original_filename'); // Имя файла, который загрузил пользователь
            $table->string('signed_file_path');  // Путь к сохраненному подписанному файлу
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('signed_documents');
    }
};
