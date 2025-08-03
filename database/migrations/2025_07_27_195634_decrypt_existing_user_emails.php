<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Crypt;
use App\Models\User; // Импортируем модель User

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // !!! ВАЖНО: ОТКЛЮЧАЕМ СОБЫТИЯ МОДЕЛИ !!!
        // Это позволяет нам работать с сырыми данными напрямую в БД,
        // чтобы мутаторы не зашифровали email обратно сразу после дешифрования.
        User::withoutEvents(function () {
            User::chunk(100, function ($users) {
                foreach ($users as $user) {
                    // Проверяем, зашифрован ли email (начинается ли с 'eyJpdiI6')
                    if (str_starts_with($user->getRawOriginal('email'), 'eyJpdiI6')) {
                        try {
                            // Дешифруем email
                            $decryptedEmail = Crypt::decryptString($user->getRawOriginal('email'));
                            // Присваиваем дешифрованное значение напрямую в атрибуты
                            $user->setAttribute('email', $decryptedEmail);
                            // Сохраняем без вызова событий и мутаторов
                            $user->saveQuietly();
                        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                            // Логируем ошибку, если дешифрование не удалось (например, неверный APP_KEY)
                            \Log::error("Failed to decrypt email for user ID {$user->id}: " . $e->getMessage());
                            // Можно пропустить эту запись или предпринять другие действия
                        }
                    }
                }
            });
        });
    }

    /**
     * Reverse the migrations.
     * (Откат этой миграции зашифрует email'ы обратно, что снова сломает вход)
     */
    public function down(): void
    {
        // Обычно не рекомендуется откатывать такие миграции,
        // так как это снова сделает email-ы зашифрованными и сломает вход.
        // Если вам действительно нужно откатить, вы можете зашифровать их обратно:
        /*
        User::withoutEvents(function () {
            User::chunk(100, function ($users) {
                foreach ($users as $user) {
                    // Шифруем email обратно, если он не зашифрован
                    if (!str_starts_with($user->getRawOriginal('email'), 'eyJpdiI6')) {
                        $user->setAttribute('email', Crypt::encryptString($user->getRawOriginal('email')));
                        $user->saveQuietly();
                    }
                }
            });
        });
        */
    }
};
