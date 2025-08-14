<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth; // ✅ Добавлен use Auth

// ✅ ИСПРАВЛЕНИЕ: Добавлены PHPDoc для связей
/**
 * @property-read Template|null $template
 * @property-read UserTemplate|null $userTemplate
 */

class GeneratedDocument extends Model
{
    use HasFactory;

    /**
     * ✅ ШАГ 1: Добавляем 'user_template_id' в список разрешенных для записи полей.
     */
    protected $fillable = [
        'user_id',
        'template_id',
        'user_template_id', // <--- ДОБАВЛЕНО
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];


    public static function replacePlaceholders(string $content): string
    {
        // Этот метод не используется для сохранения, оставляем без изменений
        $user = Auth::user();
        if (!$user || !$user->details) {
            return $content;
        }
        $details = $user->details;

        // Собираем все возможные данные в один массив для удобства
        $data = [
            'full_name_nominative' => $details->full_name_nominative ?? $user->name,
            'full_name_genitive' => $details->full_name_genitive ?? $details->full_name_nominative ?? $user->name,
            'short_name' => $details->short_name ?? $user->name,
            'address_registered' => $details->address_registered,
            'address_factual' => $details->address_factual ?? $details->address_registered,
            'phone_number' => $details->phone_number,
            'email' => $user->email, // Берем email из основной модели User
            'tax_id_number' => $details->tax_id_number,
            'passport_series' => $details->passport_series,
            'passport_number' => $details->passport_number,
            'passport_issuer' => $details->passport_issuer,
            'passport_date' => optional($details->passport_date)->format('d.m.Y'),
            'id_card_number' => $details->id_card_number,
            'company_name' => $details->company_name,
            'position' => $details->position,
        ];

        // Заменяем плейсхолдеры
        foreach ($data as $key => $value) {
            $content = str_replace("[[$key]]", $value ?? '', $content);
        }

        return $content;
    }
    /**
     * Get the user that owns the document.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the template that was used for this document.
     */
    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    /**
     * ✅ ШАГ 2: Добавляем новую связь с моделью UserTemplate.
     * Это позволит нам получать информацию о пользовательском шаблоне из истории.
     */
    public function userTemplate()
    {
        return $this->belongsTo(UserTemplate::class);
    }
}
