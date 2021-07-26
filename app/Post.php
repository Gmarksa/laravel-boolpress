<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [''];

    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
