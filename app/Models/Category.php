<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations; // 1. Импортируем трейт

class Category extends Model
{
    use HasFactory, HasTranslations; // 2. Используем трейт

    /**
     * Атрибуты, которые можно массово присваивать.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'country_code']; // 3. Обновляем fillable

    /**
     * Атрибуты, которые должны быть переводимыми.
     *
     * @var array
     */
    public $translatable = ['name']; // 4. Указываем, что 'name' переводится

    /**
     * Получить ключ маршрута для модели.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Определяет отношение "один ко многим" с моделью Template.
     */
    public function templates()
    {
        return $this->hasMany(Template::class);
    }

    // Старый аксессор getNameAttribute() больше не нужен,
    // трейт HasTranslations автоматически обрабатывает получение перевода.
}
