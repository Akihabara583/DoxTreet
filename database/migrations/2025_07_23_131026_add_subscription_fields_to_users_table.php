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
        Schema::table('users', function (Blueprint $table) {
            // Дата окончания текущей подписки
            $table->timestamp('subscription_expires_at')->nullable()->after('subscription_plan');

            // Дневные лимиты, которые будут установлены для пользователя
            $table->integer('daily_template_limit')->default(0)->after('subscription_expires_at');
            $table->integer('daily_signature_limit')->default(0)->after('daily_template_limit');
            $table->integer('daily_download_limit')->default(0)->after('daily_signature_limit');
            $table->integer('custom_template_limit')->default(0)->after('daily_download_limit');

            // Счётчики оставшихся действий на сегодня
            $table->integer('templates_left')->default(0)->after('custom_template_limit');
            $table->integer('signatures_left')->default(0)->after('templates_left');
            $table->integer('downloads_left')->default(0)->after('signatures_left');
            $table->integer('custom_templates_left')->default(0)->after('downloads_left');

            // Дата последнего сброса лимитов
            $table->date('limits_reset_at')->nullable()->after('custom_templates_left');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'subscription_expires_at',
                'daily_template_limit',
                'daily_signature_limit',
                'daily_download_limit',
                'custom_template_limit',
                'templates_left',
                'signatures_left',
                'downloads_left',
                'custom_templates_left',
                'limits_reset_at',
            ]);
        });
    }
};
