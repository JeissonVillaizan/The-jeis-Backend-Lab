<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'issuer',
        'date',
        'url',
        'image',
    ];

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image ? Storage::disk('r2')->url($this->image) : null,
        );
    }
}