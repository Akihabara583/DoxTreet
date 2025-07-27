<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Добавляем новую колонку для хранения ID подписчика из Gumroad
            $table->string('gumroad_subscriber_id')->nullable()->after('limits_reset_at');
        });
    }


    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Удаляем колонку, если миграция откатывается
            $table->dropColumn('gumroad_subscriber_id');
        });
    }


};

