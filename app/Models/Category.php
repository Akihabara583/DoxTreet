<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['slug'];

    public function getRouteKeyName() { return 'slug'; }

    public function templates() {
        return $this->hasMany(Template::class);
    }

    // Получаем переведенное имя из lang файлов
    public function getNameAttribute() {
        return __("categories.{$this->slug}");
    }
}
