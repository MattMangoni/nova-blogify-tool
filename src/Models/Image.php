<?php

namespace Mattmangoni\NovaBlogifyTool\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * Fillable properties.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'filename',
        'thumbnail',
        'size',
    ];

    /**
     * Get image's link.
     *
     * @return string
     */
    public function getLinkAttribute()
    {
        return '/images/'.$this->id;
    }

    /**
     * Get image thumbnail's link.
     *
     * @return string
     */
    public function getThumbnailLinkAttribute()
    {
        return '/images/'.$this->id.'?thumb';
    }
}
