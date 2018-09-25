<?php

namespace Mattmangoni\NovaBlogifyTool\Resources;

use App\Nova\User;
use App\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;

class Post extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'Mattmangoni\NovaBlogifyTool\Models\Post';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * Get the searchable columns for the resource.
     *
     * @return array
     */
    public static function searchableColumns()
    {
        return ['title', 'body'];
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Author', 'author', User::class)
                ->sortable()
                ->rules(['required']),

            BelongsToMany::make('Tags'),

            Text::make('Title')
                ->rules(['required', 'string'])
                ->sortable(),

            Markdown::make('Body'),

            HasMany::make('Comments', 'comments', Comment::class)
                ->sortable()
                ->rules(['required']),

            BelongsToMany::make('Tags', 'tags', Tag::class)
                ->searchable(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
