<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_details', function (Blueprint $table) {
            // Добавляем новые поля после существующих
            $table->string('contact_email')->nullable()->after('position');
            $table->string('website')->nullable()->after('contact_email');

            // Данные компании или ФОП (физ. лица-предпринимателя)
            $table->string('legal_entity_name')->nullable()->after('website');
            $table->string('legal_entity_address')->nullable()->after('legal_entity_name');
            $table->string('legal_entity_tax_id')->nullable()->after('legal_entity_address');
            $table->string('represented_by')->nullable()->after('legal_entity_tax_id');

            // Банковские реквизиты
            $table->string('bank_name')->nullable()->after('represented_by');
            $table->string('bank_iban')->nullable()->after('bank_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropColumn([
                'contact_email',
                'website',
                'legal_entity_name',
                'legal_entity_address',
                'legal_entity_tax_id',
                'represented_by',
                'bank_name',
                'bank_iban',
            ]);
        });
    }
};
