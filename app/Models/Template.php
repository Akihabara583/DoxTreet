<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'slug',
        'blade_view',
        'fields',
        'is_active',
    ];

    protected $casts = [
        'fields' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * --- КЛЮЧЕВОЙ МЕТОД ДЛЯ ИСПРАВЛЕНИЯ ОШИБКИ 404 ---
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function translations()
    {
        return $this->hasMany(TemplateTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(TemplateTranslation::class)->where('locale', App::getLocale());
    }

    public function getTitleAttribute()
    {
        return $this->translation->title ?? $this->translations->first()->title ?? 'No Title';
    }

    public function getDescriptionAttribute()
    {
        return $this->translation->description ?? $this->translations->first()->description ?? '';
    }

    public function getFieldsAttribute($value)
    {
        return json_decode($value, true) ?? [];
    }
}
