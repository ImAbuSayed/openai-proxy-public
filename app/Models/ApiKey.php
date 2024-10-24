<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiKey extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'name'];

    public static function generateUniqueKey()
    {
        do {
            $key = \Str::random(32);
        } while (static::where('key', $key)->exists());

        return $key;
    }
}
