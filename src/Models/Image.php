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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'filename' => 'string',
        'thumbnail' => 'string',
        'size' => 'string',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
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
