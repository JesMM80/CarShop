<?php

namespace App\Livewire;

use App\Models\Brand;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;

class DeleteBrand extends Component
{

    public $brand_id;

    public function render()
    {
        return view('livewire.delete-brand');
    }

    #[On('deleteBrand')]
    public function deleteBrand(Brand $brand){

        // Verifica si la imagen no es la predeterminada 'carShop.png' y si existe en el servidor
        if ($brand->logo != 'carShop.png' && Storage::exists('public/brands/' . $brand->logo)) {
            Storage::delete('public/brands/' . $brand->logo);
        }

        $brand->delete();
        return to_route('brands.index');
    }
}
