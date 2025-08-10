<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_bundle_template_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bundle_template', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_bundle_id')->constrained()->onDelete('cascade');
            $table->foreignId('template_id')->constrained()->onDelete('cascade');
            $table->integer('step_order'); // Порядок документа в мастере (Шаг 1, Шаг 2 и т.д.)
            $table->boolean('is_optional')->default(false); // Является ли документ в пакете обязательным
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bundle_template');
    }
};
