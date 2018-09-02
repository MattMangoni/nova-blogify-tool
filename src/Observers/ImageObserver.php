<?php

namespace Mattmangoni\NovaBlogifyTool\Observers;

use Illuminate\Support\Facades\Storage;
use Mattmangoni\NovaBlogifyTool\Models\Image;

class ImageObserver
{
    /**
     * Handle the image "deleting" event.
     * @param Image $image
     * @return void
     */
    public function deleting(Image $image)
    {
        Storage::disk(config('nova-blogify.image_settings.disk'))->delete($image->filename);
        Storage::disk(config('nova-blogify.image_settings.disk'))->delete(config('nova-blogify.image_settings.path_thumb').$image->thumbnail);
    }
}
