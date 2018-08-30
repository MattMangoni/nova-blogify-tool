<?php

namespace Mattmangoni\NovaBlogifyTool\Resources;

use App\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image as NovaImage;
use Mattmangoni\NovaBlogifyTool\Processors\StoreImage;

class Image extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'Mattmangoni\NovaBlogifyTool\Models\Image';

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
        'id', 'title',
    ];

    public static $displayInNavigation = false;

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            NovaImage::make('Image')
                ->thumbnail(function () {
                    return Storage::disk('blogify')->url($this->filename);
                })
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            NovaImage::make('Image')
                ->store(new StoreImage)
                ->hideWhenUpdating()
                ->hideFromDetail()
                ->hideFromIndex(),

            Text::make('Title')
                ->sortable()
                ->rules(
                    [
                        'required',
                        'string',
                        'max:255',
                    ]
                )
                ->hideWhenCreating(),

            Text::make('Filename')
                ->sortable()
                ->rules(
                    [
                        'required',
                        'string',
                        'max:255',
                    ]
                )
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            Text::make('Thumbnail')
                ->sortable()
                ->rules(
                    [
                        'required',
                        'string',
                        'max:255',
                    ]
                )
                ->hideFromIndex()
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            Text::make('Size')
                ->sortable()
                ->rules(
                    [
                        'required',
                        'string',
                        'max:255',
                    ]
                )
                ->hideWhenCreating()
                ->hideWhenUpdating(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
