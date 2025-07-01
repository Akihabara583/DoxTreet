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
        'fields',
        'is_active',
        'header_html',
        'body_html',
        'footer_html',
    ];

    protected $casts = [

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
        // Этот метод будет принудительно преобразовывать поле fields в массив
        // при каждом обращении к нему
        return json_decode($value, true) ?? [];
    }

}
