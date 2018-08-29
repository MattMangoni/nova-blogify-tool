<?php

namespace Mattmangoni\NovaBlogifyTool\Processors;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreImage
{
    public function __invoke(Request $request)
    {
        $file = $request->image;
        $newFileName = uniqid(
                'IMAGE',
                true
            ).'.'.$file->getClientOriginalExtension();
        $thumbFileName = 'THUMB'.$newFileName;
        $this->make_thumb(
            $file->getRealPath(),
            $file->getRealPath().'_thumb',
            300
        );
        // store files
        Storage::put(
            $newFileName,
            file_get_contents($file->getRealPath())
        );
        Storage::put(
            $thumbFileName,
            file_get_contents($file->getRealPath().'_thumb')
        );

        return [
            'title' => $file->getClientOriginalName(),
            'filename' => $newFileName,
            'thumbnail' => $thumbFileName,
            'size' => number_format(
                    $file->getSize() / 1000000,
                    2
                ).'MB',
        ];
    }

    public function make_thumb($src, $dest, $desired_width)
    {
        /* read the source image */
        switch ( strtolower( pathinfo( $src, PATHINFO_EXTENSION ))) {
            case 'jpeg':
            case 'jpg':
            $source_image =  imagecreatefromjpeg($src);
                break;

            case 'png':
                $source_image =  imagecreatefrompng($src);
                break;

            case 'gif':
                $source_image =  imagecreatefromgif($src);
                break;

            default:
                throw new InvalidArgumentException('File "'.$src.'" is not valid jpg, png or gif image.');
                break;
        }

        $width = imagesx($source_image);
        $height = imagesy($source_image);
        /* find the "desired height" of this thumbnail, relative to the desired width  */
        $desired_height = floor($height * ($desired_width / $width));
        /* create a new, "virtual" image */
        $virtual_image = imagecreatetruecolor(
            $desired_width,
            $desired_height
        );
        /* copy source image at a resized size */
        imagecopyresampled(
            $virtual_image,
            $source_image,
            0,
            0,
            0,
            0,
            $desired_width,
            $desired_height,
            $width,
            $height
        );
        /* create the physical thumbnail image to its destination */
        imagejpeg(
            $virtual_image,
            $dest,
            100
        );
    }
}
