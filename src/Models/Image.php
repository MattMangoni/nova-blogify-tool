<?php

namespace Mattmangoni\NovaBlogifyTool\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * Fillable properties.
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
     * @return string
     */
    public function getLinkAttribute()
    {
        return url('uploads/images/'.$this->filename);
    }
    
    /**
     * Get image thumbnail's link.
     * @return string
     */
    public function getThumbnailLinkAttribute()
    {
        return url('uploads/images/thumbs/'.$this->thumbnail);
    }
}
