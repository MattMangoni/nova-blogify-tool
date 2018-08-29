<?php

namespace Mattmangoni\NovaBlogifyTool\Resources;

use App\Nova\User;
use App\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Boolean;
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
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title', 'summary', 'body',
    ];

    public static $displayInNavigation = false;

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Author', 'author', User::class)
                ->sortable()
                ->rules('required'),

            Image::make('Image')
                ->thumbnail(
                    function () {
                        return $this->image->link;
                    }
                )
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            BelongsTo::make('Image', 'image')
                ->hideFromIndex()
                ->hideFromDetail(),

            BelongsTo::make('Category', 'category', Category::class)
                ->sortable()
                ->rules('required'),

            HasMany::make('Comments', 'comments', Comment::class)
                ->sortable()
                ->rules('required'),

            BelongsToMany::make('Tags', 'tags', Tag::class),

            Text::make('Title')->sortable()->rules('required'),

            Text::make('Slug')
                ->rules(
                    [
                        'required',
                        'string',
                    ]
                )
                ->creationRules(
                    [
                        'unique:posts,slug',
                    ]
                )
                ->updateRules(
                    [
                        'unique:posts,slug,{{resourceId}}',
                    ]
                ),
            Textarea::make('Summary')
                ->rules(
                    [
                        'required',
                        'string',
                        'max:255',
                    ]
                )
                ->hideFromIndex(),
            Markdown::make('Body')
                ->rules(
                    [
                        'required',
                        'string',
                    ]
                )
                ->hideFromIndex(),

            Boolean::make('Is Published')
                ->sortable(),
            Boolean::make('Is Featured')
                ->sortable(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
