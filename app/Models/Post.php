<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations; // 1. Подключаем трейт

class Post extends Model
{
    use HasFactory, HasTranslations; // 2. Используем трейт

    // 3. Указываем, какие поля являются переводимыми
    public $translatable = [
        'title',
        'body',
        'meta_title',
        'meta_description'
    ];

    protected $fillable = [
        'title',
        'slug',
        'body',
        'meta_title',
        'meta_description',
        'is_published',
        'published_at',
        'template_id',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
