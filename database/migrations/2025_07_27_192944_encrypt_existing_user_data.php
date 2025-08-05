<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Добавлено для доступа к DB facade

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Отключаем массовые обновления, чтобы setAttribute вызывался для каждого поля
        // User::withoutEvents(function () { // Раскомментируйте, если есть проблемы с событиями

        // ИСПОЛЬЗУЕМ withTrashed(), ЧТОБЫ ИГНОРИРОВАТЬ SoftDeletes, ТАК КАК КОЛОНКА deleted_at ЕЩЕ НЕ СОЗДАНА
        User::withTrashed()->chunk(100, function ($users) {
            foreach ($users as $user) {
                // Присваивание уже существующих значений вызовет setAttribute
                // и зашифрует их, если они не были зашифрованы ранее.
                // Если данные уже зашифрованы, getAttribute расшифрует их, а затем setAttribute повторно зашифрует.
                $user->name = $user->name;
                $user->email = $user->email;
                // Если вы решили шифровать gumroad_subscriber_id, раскомментируйте:
                // $user->gumroad_subscriber_id = $user->gumroad_subscriber_id;
                $user->save();
            }
        });
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Откат шифрования очень рискован. Обычно не реализуется.
        // Если вам нужно отменить, вы должны вручную расшифровать данные.
        // НЕ РЕКОМЕНДУЕТСЯ ИСПОЛЬЗОВАТЬ В ПРОДАКШЕНЕ БЕЗ ЧЕТКОГО ПЛАНА
    }
};
