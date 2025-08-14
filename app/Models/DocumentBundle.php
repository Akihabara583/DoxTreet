<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Collection;

// ✅ ИСПРАВЛЕНИЕ: Добавлены PHPDoc для связи
/**
 * @property-read Collection|Template[] $templates
 */

class DocumentBundle extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'description'];
    protected $fillable = ['title', 'description', 'slug', 'country_code', 'is_active', 'access_level',];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Шаблоны, входящие в этот пакет.
     */
    public function templates()
    {
        return $this->belongsToMany(Template::class, 'bundle_template')
            ->withPivot('step_order', 'is_optional') // Важно для доступа к доп. полям
            ->orderBy('step_order'); // Сразу сортируем по порядку шагов
    }
}
