<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Jobs\GuardaImagenBrand;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandsRequest;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::all(['name','country','logo','id']);
        return view('brands.index',['brands' => $brands]);
    }

    public function create(){
        return view('brands.create');
    }

    public function store(StoreBrandRequest $request)
    {
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imagePath = $image->getRealPath(); // Obtiene la ruta temporal del archivo
            $imageName = time().'.'.$image->getClientOriginalExtension();
            GuardaImagenBrand::dispatch($imagePath, $imageName); // Pasa la ruta temporal en lugar del objeto de archivo
        }else{
            $imageName = 'carShop.png';
        }

        Brand::create([
            'name' => $request->name,
            'country' => $request->country,
            'logo' => $imageName,
        ]);

        return to_route('brands.create')->with('message','The brand has been saved!');
    }

    public function edit(Brand $brand){
        return view('brands.edit',['brand' => $brand]);
    }

    public function update(UpdateBrandsRequest $request,Brand $brand){
        
        if ($request->file('logo')) {
            //Borramos la imagen actual
            Storage::delete('public/brands/' . $brand->logo);
            
            $image = $request->file('logo');
            $imagePath = $image->getRealPath();
            $imageName = time(). '.' .$image->getClientOriginalExtension();
            GuardaImagenBrand::dispatch($imagePath, $imageName);
            
        }else{
            $imageName = $brand->logo;
        }
        
        $brand->name = $request->name;
        $brand->country = $request->country;
        $brand->logo = $imageName;
        $brand->save();

        return to_route('brands.index')->with('message','The brand was updated!');
    }
    
    public function destroy(Brand $brand){

        // Verifica si la imagen no es la predeterminada 'carShop.png' y si existe en el servidor
        if ($brand->logo != 'carShop.png' && Storage::exists('public/brands/' . $brand->logo)) {
            Storage::delete('public/brands/' . $brand->logo);
        }

        $brand->delete();
        return to_route('brands.index');
    }
    
    
}
