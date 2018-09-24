<?php

namespace Mattmangoni\NovaBlogifyTool\Models;

use Spatie\MediaLibrary\File;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Mattmangoni\NovaBlogifyTool\Traits\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model implements HasMedia
{
    use SoftDeletes, Sluggable, HasMediaTrait;

    /**
     * Fillable properties.
     * @var array
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'summary',
        'body',
        'scheduled_for',
        'featured',
    ];

    /**
     * Appended fields.
     * @var array
     */
    protected $appends = ['published'];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'featured' => 'boolean',
        'scheduled_for' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * The attributes that should be mutated to dates.
     * @var array
     */
    protected $dates = [
        'scheduled_for',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /**
     * Published mutator.
     * @return bool
     */
    public function getPublishedAttribute()
    {
        return now() > $this->scheduled_for;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(config('nova-blogify.resources.users.model'), 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection(config('nova-blogify.image_settings.collection'))
            ->useDisk(config('nova-blogify.image_settings.disk'))
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpeg';
            })
            ->singleFile();
    }
}
