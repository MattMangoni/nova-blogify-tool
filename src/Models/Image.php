<?php

namespace Mattmangoni\NovaBlogifyTool\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = [
        'title',
        'filename',
        'thumbnail',
        'size',
    ];
    protected $casts = [
        'title' => 'string',
        'filename' => 'string',
        'thumbnail' => 'string',
        'size' => 'string',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getLinkAttribute()
    {
        return '/images/' . $this->id;
    }

    public function getThumbnailLinkAttribute()
    {
        return '/images/' . $this->id . '?thumb';
    }
}
