<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts(): BelongsTo
    {
        return $this->hasMany(Post::class);
    }
}
