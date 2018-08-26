<?php

namespace Mattmangoni\NovaBlogifyTool\Models;

use Illuminate\Database\Eloquent\Model;
use Mattmangoni\NovaBlogifyTool\Models\Post;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public function posts() : HasMany
    {
        return $this->hasMany(Post::class);
    }
}
