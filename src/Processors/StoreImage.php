<?php

namespace Mattmangoni\NovaBlogifyTool\Processors;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class StoreImage
{
    public function __invoke(Request $request)
    {
        $image_file = $request->image;

        $file_extension = $image_file->getClientOriginalExtension();

        $new_filename = str_random(8).'_'.time().''.str_random(32);

        $filename = $new_filename.'.'.$file_extension;

        $filename_thumb = $new_filename.'_thumb.'.$file_extension;


        Storage::disk('blogify')->put($filename, (string)file_get_contents($image_file));
        //Storage::put('public/uploads/images/'.$filename, (string)file_get_contents($image_file), 'blogify');

        $image_get = Storage::disk('blogify')->path($filename);
        //$image_get = Storage::get('public/uploads/images/'.$filename);

        //$image_thumb = Image::make($image_get)
          //  ->resize(200, 200)
            //->encode($file_extension, 100);

        $image_thumb = Image::make($image_get)->resize(200, 200)->save($image_get);

        Storage::disk('blogify')->put('thumbs/'.$filename_thumb, file_get_contents($image_thumb));

        //Storage::put('public/uploads/images/thumbs/'.$filename_thumb, (string)$image_thumb, 'blogify');

        return [
            'title' => $image_file->getClientOriginalName(),
            'filename' => $filename,
            'thumbnail' => $filename_thumb,
            'size' => number_format(
                    $image_file->getSize() / 1000000,
                    2
                ) . 'MB',
        ];
    }
}
