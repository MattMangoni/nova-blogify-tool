<?php

namespace Mattmangoni\NovaBlogifyTool\Observers;

use Illuminate\Support\Facades\Storage;
use Mattmangoni\NovaBlogifyTool\Models\Image;

class ImageObserver
{
    /**
     * Handle the image "deleting" event.
     *
     * @param Image $image
     *
     * @return void
     */
    public function deleting(Image $image)
    {
        Storage::delete($image->filename);
        Storage::delete($image->thumbnail);
    }
}
