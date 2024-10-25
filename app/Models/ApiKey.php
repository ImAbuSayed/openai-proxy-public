<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ApiKey extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'key'];

    public static function generateUniqueKey(): string
    {
        do {
            $key = 'pk_' . Str::random(32);
        } while (static::where('key', $key)->exists());

        return $key;
    }
}
