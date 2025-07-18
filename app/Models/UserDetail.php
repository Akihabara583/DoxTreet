<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'company_name', // Можно считать устаревшим, но оставим для совместимости
        'position',
        // --- НОВЫЕ ПОЛЯ ---
        'contact_email',
        'website',
        'legal_entity_name',
        'legal_entity_address',
        'legal_entity_tax_id',
        'represented_by',
        'bank_name',
        'bank_iban',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'passport_date' => 'date',
    ];

    /**
     * Get the user that owns the details.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * НОВЫЙ АКСЕССОР: Автоматически создает "Фамилию И. О."
     * из полного имени. Например, "Іванов Іван Іванович" -> "Іванов І. І."
     *
     * @return string|null
     */
    public function getShortNameAttribute(): ?string
    {
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
