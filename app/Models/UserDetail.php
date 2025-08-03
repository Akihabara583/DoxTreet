<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt; // Импортируем фасад Crypt
use Carbon\Carbon; // Импортируем Carbon для работы с датами, если шифруем passport_date

class UserDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'full_name_nominative',
        'full_name_genitive',
        'address_registered',
        'address_factual',
        'phone_number',
        'tax_id_number',
        'passport_series',
        'passport_number',
        'passport_issuer',
        'passport_date',
        'id_card_number',
        'company_name',
        'position',
        'contact_email',
        'website',
        'legal_entity_name',
        'legal_entity_address',
        'legal_entity_tax_id',
        'represented_by',
        'bank_name',
        'bank_iban',
        'signature', // Добавьте, если это поле существует в БД и должно быть заполнено
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'passport_date' => 'date', // ЗАКОММЕНТИРУЙТЕ ИЛИ УДАЛИТЕ ЭТУ СТРОКУ, если вы шифруете 'passport_date'
        // Если вы решили НЕ шифровать passport_date, оставьте ее и удалите 'passport_date' из $encrypted.
    ];

    // Массив атрибутов, которые нужно зашифровать
    protected $encrypted = [
        'full_name_nominative',
        'full_name_genitive',
        'address_registered',
        'address_factual',
        'phone_number',
        'tax_id_number',
        'passport_series',
        'passport_number',
        'passport_issuer',
        'passport_date', // ВКЛЮЧИТЕ 'passport_date', если вы решили его шифровать
        // Если вы НЕ шифруете passport_date, удалите эту строку.
        'id_card_number',
        'contact_email',
        'website',
        'legal_entity_name',
        'legal_entity_address',
        'legal_entity_tax_id',
        'represented_by',
        'bank_name',
        'bank_iban',
        'signature', // Если вы хотите шифровать подпись
    ];

    /**
     * Get the user that owns the details.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Динамическое получение атрибутов, которые должны быть зашифрованы/расшифрованы.
     *
     * @param  string  $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        // Обрабатываем специфическое поле 'passport_date'
        // Если оно в $encrypted, дешифруем как строку и затем парсим.
        if ($key === 'passport_date' && in_array($key, $this->encrypted) && ! is_null($value)) {
            try {
                return Carbon::parse(Crypt::decryptString($value));
            } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                // Обработка ошибки дешифрования. Вернуть null или оригинальное значение, логировать.
                return null;
            }
        }

        if (in_array($key, $this->encrypted) && ! is_null($value)) {
            try {
                return Crypt::decryptString($value);
            } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                // Обработка ошибки дешифрования. Вернуть null или оригинальное значение, логировать.
                return null;
            }
        }

        return $value;
    }

    /**
     * Динамическая установка атрибутов, которые должны быть зашифрованы.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return $this
     */
    public function setAttribute($key, $value)
    {
        // Обработка специфического поля 'passport_date'
        // Если оно в $encrypted, форматируем его перед шифрованием.
        if ($key === 'passport_date' && in_array($key, $this->encrypted) && ! is_null($value)) {
            $stringValue = ($value instanceof Carbon) ? $value->format('Y-m-d') : $value;
            $this->attributes[$key] = Crypt::encryptString($stringValue);
        } elseif (in_array($key, $this->encrypted) && ! is_null($value)) {
            $this->attributes[$key] = Crypt::encryptString($value);
        } else {
            parent::setAttribute($key, $value);
        }

        return $this;
    }

    /**
     * НОВЫЙ АКСЕССОР: Автоматически создает "Фамилию И. О."
     * из полного имени. Например, "Іванов Іван Іванович" -> "Іванов І. І."
     *
     * @return string|null
     */
    public function getShortNameAttribute(): ?string
    {
        // Доступ к расшифрованному full_name_nominative
        if (empty($this->full_name_nominative)) {
            return null;
        }

        // Разбиваем полное имя на части
        $parts = explode(' ', $this->full_name_nominative, 3);

        $lastName = $parts[0] ?? '';
        $firstNameInitial = !empty($parts[1]) ? mb_substr($parts[1], 0, 1) . '.' : '';
        $middleNameInitial = !empty($parts[2]) ? mb_substr($parts[2], 0, 1) . '.' : '';

        return trim("$lastName $firstNameInitial $middleNameInitial");
    }
}
