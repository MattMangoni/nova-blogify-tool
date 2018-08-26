<?php

namespace Mattmangoni\NovaBlogifyTool\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Mattmangoni\NovaBlogifyTool\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
