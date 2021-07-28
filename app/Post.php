<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    protected $guarded = [''];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
