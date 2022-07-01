<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'slug', 'description', 'founded_at'];

    protected $casts = [
        'founded_at' => 'datetime'
    ];

    protected static function booted()
    {
        static::creating(fn ($model) => $model->slug = Str::slug($model->name));
    }
}
