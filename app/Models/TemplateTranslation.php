<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateTranslation extends Model
{
    use HasFactory;

    // Указываем, что у этой таблицы нет полей created_at и updated_at
    public $timestamps = false;

    // Указываем поля, которые можно массово заполнять
    protected $fillable = [
        'template_id',
        'locale',
        'title',
        'description',
    ];

    // Определение отношения "обратно к одному" с основной моделью Template
    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
