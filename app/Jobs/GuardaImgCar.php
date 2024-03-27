<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GuardaImgCar implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $imagePath;
    public $imageName;

    public function __construct($imagePath, $imageName)
    {
        $this->imagePath = $imagePath;
        $this->imageName = $imageName;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        try {
            // Lee el contenido del archivo usando la ruta temporal
            $fileContent = file_get_contents($this->imagePath);
            
            // Guarda la imagen en el disco público
            Storage::disk('public')->put('images/cars/'.$this->imageName, $fileContent);
        } catch (\Exception $e) {
            // Manejo de errores si falla el almacenamiento de la imagen
            logger()->error('Error al guardar la imagen: '.$e->getMessage());
            return back()->with('error', 'Error al guardar la imagen');
        }
    }
}
