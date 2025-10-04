<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ResizeImage implements ShouldQueue
{
    use Queueable;

    public $image_path;

    public function __construct($image_path)
    {
        $this->image_path = $image_path;
    }

    public function handle(): void
    {
        // Obtener el archivo desde storage
        $upload = Storage::get($this->image_path);

        // Sacar la extensión de la ruta
        $extension = pathinfo($this->image_path, PATHINFO_EXTENSION);

        // Redimensionar la imagen
        $image = Image::read($upload)->scale(width: 1200);

        // Sobrescribir la misma ruta
        Storage::put(
            $this->image_path,
            $image->encodeByExtension($extension, quality: 70)
        );
    }
}
