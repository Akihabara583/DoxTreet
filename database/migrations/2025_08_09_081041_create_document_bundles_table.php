<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_document_bundles_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('document_bundles', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Название пакета, например "Пакет для сдачи квартиры в аренду"
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->string('country_code', 2); // 'PL', 'UA', 'DE'
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('document_bundles');
    }
};
