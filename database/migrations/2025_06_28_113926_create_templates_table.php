<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('slug')->unique();
            $table->string('blade_view')->comment('Path to the Blade file for the PDF');
            $table->json('fields')->comment('JSON structure for form fields');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Таблица для переводов
        Schema::create('template_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('template_id')->constrained()->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description');

            $table->unique(['template_id', 'locale']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('template_translations');
        Schema::dropIfExists('templates');
    }
};
