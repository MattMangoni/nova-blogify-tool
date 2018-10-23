<?php

namespace Mattmangoni\NovaBlogifyTool\Traits;

use Illuminate\Database\Eloquent\Model;

trait Sluggable
{
    /**
     * @var array
     */
    protected static $sluggableEvents = [
        'saving',
        'updating',
    ];

    /**
     * Leverage bootableTraits functionality in case I need to stack multiple.
     */
    public static function bootSluggable(): void
    {
        foreach (static::$sluggableEvents as $event) {
            static::{$event}(function ($model) use ($event) {
                $column = static::getSluggableField($model);

                $model->slug = static::generateUniqueSlug(
                    $model->{$column},
                    $event === 'updating'
                        ? $model->id
                        : null
                );
            });
        }
    }

    /**
     * Fetch sluggable field.
     * @param Model $model
     * @return string|null
     */
    protected static function getSluggableField(Model $model): ?string
    {
        $table = $model->getTable();
        $prefix = config('nova-blogify.table_prefix');

        if (substr($table, 0, strlen($prefix)) == $prefix) {
            $table = substr($table, strlen($prefix));
        }

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
     * @param string $fieldValue
     * @param int|null $oldId
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
     * @param int|null $oldId
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
