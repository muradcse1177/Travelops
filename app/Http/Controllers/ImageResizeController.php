<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class ImageResizeController extends Controller
{
    public function resize()
    {
        $directory = base_path('public/images/upload/'); // test folder
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
        $maxFileSize = 100 * 1024; // 100 KB
        $resized = [];

        $files = File::allFiles($directory);

        foreach ($files as $file) {
            $path = $file->getRealPath();
            $ext = strtolower($file->getExtension());

            if (in_array($ext, $allowedExtensions) && filesize($path) > $maxFileSize) {
                $this->resizeImage($path, $ext, $maxFileSize);
                $resized[] = $file->getRelativePathname();
            }
        }

        return response()->json([
            'message' => 'Resize complete',
            'resized_files' => $resized
        ]);
    }

    protected function resizeImage($path, $ext, $maxFileSize)
    {
        $manager = new ImageManager(new GdDriver()); // ✅ Fixed for v3
        $image = $manager->read($path);
        $width = $image->width();
        $height = $image->height();
        $quality = 90;

        while (filesize($path) > $maxFileSize && $quality > 10) {
            $newWidth = round($width * 0.9);
            $newHeight = round($height * 0.9);

            $image->resize($newWidth, $newHeight);

            switch ($ext) {
                case 'png':
                    $image->toPng()->save($path);
                    break;
                case 'webp':
                    $image->toWebp($quality)->save($path);
                    break;
                default:
                    $image->toJpeg($quality)->save($path);
                    break;
            }

            $quality -= 5;
        }
    }

}
