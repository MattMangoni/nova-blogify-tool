<?php

namespace Mattmangoni\NovaBlogifyTool\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    /**
     * each post belongs to multiple tags.
     *
     * @return BelongsToMany
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsTo(Post::class);
    }
}
