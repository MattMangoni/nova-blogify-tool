<?php

namespace Mattmangoni\NovaBlogifyTool\Models;

use Illuminate\Database\Eloquent\Model;
use Mattmangoni\NovaBlogifyTool\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    public function posts() : BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }


}
