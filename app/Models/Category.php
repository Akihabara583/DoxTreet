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

class Category extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['name', 'slug', 'country_code'];

    public $translatable = ['name'];

    protected $casts = [
        'name' => 'array',
        'is_active' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function templates()
    {
        return $this->hasMany(Template::class);
    }
}
