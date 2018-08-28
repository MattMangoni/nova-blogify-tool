<?php

namespace Mattmangoni\NovaBlogifyTool\Models;

use Illuminate\Database\Eloquent\Model;
use Mattmangoni\NovaBlogifyTool\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

}
