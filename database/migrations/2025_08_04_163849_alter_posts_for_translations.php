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
            // Убедитесь, что у вас установлен пакет doctrine/dbal
            // composer require doctrine/dbal
            $table->json('title')->change();
            $table->json('body')->change();
            $table->json('meta_title')->nullable()->change();
            $table->json('meta_description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Внимание: откат этой миграции может привести к потере данных.
            $table->string('title')->change();
            $table->text('body')->change();
            $table->string('meta_title')->nullable()->change();
            $table->string('meta_description')->nullable()->change();
        });
    }
};
