<?php

namespace App\Helpers;

class AppHelper
{

    public function uploadImage($image, $path)
    {
        if ($image) {
            $imagePath = $image->store($path, 'public');
            return $imagePath;
        }
    }

    public function deleteImage($image)
    {
        if ($image) {
            if (file_exists(public_path($image))) {
                unlink(public_path($image));
            }
        }
    }

    public static function instance()
    {
        return new AppHelper();
    }
}