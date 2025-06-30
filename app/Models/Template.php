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

    public function getRouteKeyName()
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

    // !====== ВОТ НОВАЯ ФУНКЦИЯ, КОТОРАЯ ВСЁ ИСПРАВИТ ======!
    /**
     * Get the template's fields and ensure it's an array.
     *
     * @param  string  $value
     * @return array
     */
    public function getFieldsAttribute($value)
    {
        // Эта функция принудительно декодирует JSON-строку в массив
        return json_decode($value, true);
    }
    // !=================================================!
}
