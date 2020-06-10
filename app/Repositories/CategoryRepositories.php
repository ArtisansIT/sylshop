<?php


namespace App\Repositories;

use Intervention\Image\Facades\Image;


class CategoryRepositories
{

    public  function resizeImage($request, $height, $width, $name)

    {
        if ($request->image) {

            $image = $request->file('image');
            $originalExtension = $image->getClientOriginalExtension();
            $imgName = time() . '_' . uniqid() . $name . '.' . $originalExtension;
            $imgPath = 'images/' . $imgName;
            Image::make($image)->resize($height, $width)->save($imgPath);
            return $imgName;
        } else {
            $image = $request->file('banner');
            $originalExtension = $image->getClientOriginalExtension();
            $imgName = time() . '_' . uniqid() . $name . '.' . $originalExtension;
            $imgPath = 'images/' . $imgName;
            Image::make($image)->resize($height, $width)->save($imgPath);
            return $imgName;
        }
    }
}
