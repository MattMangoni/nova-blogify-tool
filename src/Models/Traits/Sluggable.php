<?php

namespace Mattmangoni\NovaBlogifyTool\Models\Traits;

trait Sluggable
{
    /**
     * @var array
     */
    protected static $sluggableEvents = [
        'saving',
        'updating',
    ];

    public static function bootSluggable(): void
    {
        foreach (static::$sluggableEvents as $event) {
            static::{$event}(function ($model) use ($event) {
                $model->slug = static::generateUniqueSlug(
                    $model->{$model->sluggableField},
                    $event === 'updating'
                        ? $model->id
                        : null
                );
            });
        }
    }

    /**
     * Generate a unique slug.
     *
     * @param string   $fieldValue
     * @param int|null $oldId
     *
     * @return string
     */
    protected static function generateUniqueSlug(string $fieldValue, int $oldId = null): string
    {
        $slug = str_slug($fieldValue);

        $additionalQuery = static::getAdditionalQueryString($oldId);

        $latestSlug = static::whereRaw("(slug = '$slug' or slug LIKE '$slug-%'){$additionalQuery}")
            ->latest('id')
            ->value('slug');

        if ($latestSlug) {
            $pieces = explode('-', $latestSlug);
            $slug .= '-'.(intval(end($pieces)) + 1);
        }

        return $slug;
    }

    /**
     * Additional check for "updating" event.
     * Solves a problem when updating without changing sluggable field.
     *
     * @param int|null $oldId
     *
     * @return string
     */
    protected static function getAdditionalQueryString($oldId): string
    {
        if (is_null($oldId)) {
            return '';
        }

        return " AND id != '$oldId'";
    }
}
