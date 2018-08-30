<?php

namespace Mattmangoni\NovaBlogifyTool\Traits;

use Illuminate\Database\Eloquent\Model;

trait Sluggable
{
    public static function boot()
    {
        parent::boot();

        foreach (['saving', 'updating'] as $event) {
            static::{$event}(function ($model) use ($event) {
                $column = static::getSluggableField($model);

                $uniqueSlug = static::generateUniqueSlug(
                    $model->{$column},
                    $event === 'updating'
                        ? $model->id
                        : null
                );

                $model->slug = $uniqueSlug;
            });
        }
    }

    /**
     * Fetch sluggable field.
     *
     * @param Model $model
     * @return string
     */
    protected static function getSluggableField(Model $model) : string
    {
        $table = $model->getTable();

        switch ($table) {
            case 'posts':
                return 'title';
            case 'categories':
                return 'name';
            default:
                return null;
        }
    }

    /**
     * Generate a unique slug.
     *
     * @param string $fieldValue
     * @param int|null $oldId
     * @return string
     */
    protected static function generateUniqueSlug(string $fieldValue, int $oldId = null) : string
    {
        $slug = str_slug($fieldValue);

        $additionalQuery = static::getAdditionalQueryString($oldId);

        $latestSlug = static::whereRaw("(slug = '$slug' or slug LIKE '$slug-%'){$additionalQuery}")
            ->latest('id')
            ->value('slug');

        if ($latestSlug) {
            $pieces = explode('-', $latestSlug);

            $slug .= '-' . (intval(end($pieces)) + 1);
        }

        return $slug;
    }

    /**
     * Additional check for "updating" event.
     * Solves a problem when updating without changing sluggable field.
     *
     * @param int|null $oldId
     * @return string
     */
    protected  static function getAdditionalQueryString($oldId) : string
    {
        if (is_null($oldId)) {
            return '';
        }

        return " AND id != '$oldId'";
    }
}