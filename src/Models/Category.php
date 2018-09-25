<?php

namespace Mattmangoni\NovaBlogifyTool\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Mattmangoni\NovaBlogifyTool\Models\Traits\Sluggable;

class Category extends Model
{
    use Sluggable;

    /**
     * Specify sluggable field.
     *
     * @var string
     */
    protected $sluggableField = 'name';

    /**
     * Model fillable fields.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * each post belongs to an author.
     *
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
