<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserTemplate extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'country_code', 'category_id', 'name', 'fields', 'layout'];

    protected $casts = [
        'fields' => 'array', // Автоматически преобразует JSON в массив и обратно
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
