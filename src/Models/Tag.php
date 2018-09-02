<?php

namespace Mattmangoni\NovaBlogifyTool\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = [
        'name',
        'description',
        'tagged_count',
    ];
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'tagged_count' => 'integer',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    
    /**
     * @return BelongsToMany
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
