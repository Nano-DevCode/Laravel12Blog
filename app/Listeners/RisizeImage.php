<?php

namespace App\Listeners;

use App\Events\UploadedImage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class RisizeImage
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UploadedImage $event): void
    {
        // Obtener el archivo desde storage
        $upload = Storage::get($event->image_path);

        // Sacar la extensión de la ruta
        $extension = pathinfo($event->image_path, PATHINFO_EXTENSION);

        // Redimensionar la imagen
        $image = Image::read($upload)->scale(width: 1200);

        // Sobrescribir la misma ruta
        Storage::put(
            $event->image_path,
            $image->encodeByExtension($extension, quality: 70)
        );
    }
}
