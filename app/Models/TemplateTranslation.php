<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateTranslation extends Model
{
    use HasFactory;

    /**
     * Указываем, что у этой таблицы нет полей created_at и updated_at.
     */
    public $timestamps = false;

    /**
     * Поля, которые можно записывать в базу данных.
     */
    protected $fillable = [
        'template_id', 'locale', 'title', 'description',
        'header_html', 'body_html', 'footer_html',
        // 'fields' УДАЛЕНО ОТСЮДА
    ];

    /**
     * Главное правило: Laravel сам будет превращать массив в JSON при записи
     * и JSON в массив при чтении.
     * Никаких других методов для поля 'fields' не нужно.
     */
    protected $casts = [
        'fields' => 'array',
    ];

    /**
     * Связь с основной моделью.
     */
    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
