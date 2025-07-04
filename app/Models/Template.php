<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Template extends Model
{
    use HasFactory;

    // Теперь здесь только непереводимые поля
    protected $fillable = [
        'category_id',
        'slug',
        'is_active',
        'country_code',
        'fields',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'fields' => 'array',
    ];

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

    // Получает перевод для текущего языка
    public function translation()
    {
        return $this->hasOne(TemplateTranslation::class)->where('locale', App::getLocale());
    }

    // Далее идут "аксессоры", чтобы легко получать переведенные поля
    public function getTitleAttribute()
    {
        return $this->translation->title ?? '';
    }

    public function getDescriptionAttribute()
    {
        return $this->translation->description ?? '';
    }

    public function getHeaderHtmlAttribute()
    {
        return $this->translation->header_html ?? '';
    }

    public function getBodyHtmlAttribute()
    {
        return $this->translation->body_html ?? '';
    }

    public function getFooterHtmlAttribute()
    {
        return $this->translation->footer_html ?? '';
    }


}
