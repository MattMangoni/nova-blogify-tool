<?php

namespace Mattmangoni\NovaBlogifyTool\Fields;

use Laravel\Nova\Fields\Image;

class ImageUpload extends Image
{
    /**
     * The field's component.
     * @var string
     */
    public $component = 'image-upload-preview';
}
