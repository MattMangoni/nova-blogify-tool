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
        Storage::disk('public')->delete($image->filename);
        Storage::disk('public')->delete('thumbs/'.$image->thumbnail);
    }
}
