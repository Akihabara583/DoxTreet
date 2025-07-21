<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignedDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'original_filename',
        'signed_file_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
