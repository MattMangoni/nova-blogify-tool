<?php

namespace Mattmangoni\NovaBlogifyTool\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    /**
     * each post can have multiple comments.
     *
     * @return HasMany
     */
    public function post(): HasMany
    {
        return $this->belongsTo(Post::class);
    }
}
