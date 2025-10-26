<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Course extends Model
{
    //
    protected $fillable = [
        'title',
        'level',
        'price',
        'description',
    ];

    public function modules() : HasMany
    {
        return $this->hasMany(Module::class);
    }

    public function contents() : HasManyThrough
    {
        return $this->hasManyThrough(Content::class, Module::class);
    }
}
