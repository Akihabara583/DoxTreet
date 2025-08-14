<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('document_bundles', function (Blueprint $table) {
            // Добавляем поле для уровня доступа.
            // 'pro' - только для Pro-подписчиков
            // 'standard' - для Standard и Pro
            // 'all' - для всех, включая бесплатных
            $table->string('access_level')->default('pro')->after('country_code');
        });
    }

    public function down(): void
    {
        Schema::table('document_bundles', function (Blueprint $table) {
            $table->dropColumn('access_level');
        });
    }
};
