<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Intervention\Image\Image as InterventionImage;


trait FileSaver
{
    /**
     * @param $image
     * @param string $path
     * @param string|null $oldKey
     * @param string $format
     * @param int $defaultWidth
     * @return string
     */
    public function uploadImageDefaultRatio ($image, string $path, string $oldKey=null, string $format='jpg', int $defaultWidth=1920): string
    {
        if ($image->getClientOriginalExtension() == 'gif') {
            $format = $image->getClientOriginalExtension();
        }
        $imageName = str_replace('.', '', microtime(true)) . mt_rand(100000, 999999) . mt_rand(1000000, 9999999) . "." . $format;

        $image = Image::make($image);
        $image->resizeCanvas($image->width(), $image->height());
        $defaultImage = $this->_optimizeImageQuality($image, $defaultWidth, $format);

        $relativePath = 'uploads/images/' . trim($path, '/');
        $fullPath = public_path($relativePath);

        if (!File::exists($fullPath)) {
            File::makeDirectory($fullPath, 0755, true);
        }

        if ($oldKey) {
            $basename = basename(parse_url($oldKey, PHP_URL_PATH));
            $oldFilePath = $fullPath . '/' . $basename;

            if (File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }
        }

        $defaultImage->save($relativePath . '/' . $imageName);

        // Return full URL
        return $relativePath . '/' . $imageName;
    }


    /**
     * @param InterventionImage $image
     * @param int $maxWidth
     * @param string $format
     * @param int $quality
     * @return InterventionImage
     */
    private function _optimizeImageQuality (InterventionImage $image, int $maxWidth=1920, string $format='jpg', int $quality=100): InterventionImage
    {
        $optimizedImage = clone $image;
        $imageWidth = $optimizedImage->width();
        $imageHeight = $optimizedImage->height();

        $optimizedImage = $format == 'jpg' ?
            $optimizedImage->encode($format, $quality)
            : $optimizedImage->encode($format);
        $optimizedImage = Image::make($optimizedImage);

        //the width shall be trimmed to the threshold value and the height accordingly keeping the ratio
        $multiplier = $imageWidth > $maxWidth ? $maxWidth/$imageWidth : 1;
        $optimizedImage->resize(intval($imageWidth*$multiplier), intval($imageHeight*$multiplier));

        return $optimizedImage;
    }

}
