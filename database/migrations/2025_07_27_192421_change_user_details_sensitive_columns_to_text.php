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
        Schema::table('user_details', function (Blueprint $table) {
            // Изменяем string на text для полей, которые будут зашифрованы
            $table->text('full_name_nominative')->change();
            $table->text('full_name_genitive')->change();
            $table->text('address_registered')->change();
            $table->text('address_factual')->change();
            $table->text('phone_number')->change();
            $table->text('tax_id_number')->change();
            $table->text('passport_series')->change();
            $table->text('passport_number')->change();
            $table->text('passport_issuer')->change();
            // passport_date: Если будете шифровать дату, измените на text.
            // Если нет, то оставьте как date.
            // Я предполагаю, что вы будете шифровать большинство полей, поэтому включаю его сюда
            // Если вы решили НЕ шифровать дату, удалите следующую строку
            $table->text('passport_date')->change();

            $table->text('id_card_number')->change();
            $table->text('contact_email')->change();
            $table->text('website')->change();
            $table->text('legal_entity_name')->change();
            $table->text('legal_entity_address')->change();
            $table->text('legal_entity_tax_id')->change();
            $table->text('represented_by')->change();
            $table->text('bank_name')->change();
            $table->text('bank_iban')->change();
            // 'signature' уже text, его менять не нужно, но можно добавить для ясности, что он тоже подходит
            // $table->text('signature')->change(); // Необязательно, так как он уже TEXT
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            // ВНИМАНИЕ: Откат шифрования может привести к потере данных,
            // так как расшифрованный текст может быть длиннее оригинального 'string'.
            // Обычно такие изменения не откатываются.
            // Если все же нужно:
            // $table->string('full_name_nominative', 255)->change();
            // ... и так далее для всех измененных полей
        });
    }
};
