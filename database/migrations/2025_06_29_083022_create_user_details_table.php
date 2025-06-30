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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            // Уникальный внешний ключ, создающий связь "один к одному" с пользователем
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');

            // --- ОБЩИЕ ДАННЫЕ ---
            $table->string('full_name_nominative')->nullable()->comment('ФИО в именительном падеже');
            $table->string('full_name_genitive')->nullable()->comment('ФИО в родительном падеже');
            $table->string('address_registered')->nullable()->comment('Адрес прописки');
            $table->string('address_factual')->nullable()->comment('Фактический адрес проживания');
            $table->string('phone_number')->nullable()->comment('Контактный телефон');
            $table->string('tax_id_number')->nullable()->comment('ИНН / РНОКПП');

            // --- ПАСПОРТНЫЕ ДАННЫЕ ---
            $table->string('passport_series')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('passport_issuer')->nullable()->comment('Кем выдан');
            $table->date('passport_date')->nullable()->comment('Когда выдан');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
