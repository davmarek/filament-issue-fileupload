<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;



class Post extends Model
{
    use HasFactory;

    public const DEFAULT_IMAGE = 'img/default/post.jpg';

    protected $fillable = ['image'];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => $value ? Storage::url($value) : self::DEFAULT_IMAGE,
        );
    }
}
