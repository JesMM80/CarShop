<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Jobs\GuardaImgCar;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function show(Car $car, Brand $brand)
    {
        return view('cars.show', ['car' => $car, 'brand' => $brand]);
    }

    public function update(UpdateCarRequest $request, Car $car)
    {

        if ($request->file('img_car')) {
            //Borramos la imagen actual
            Storage::delete('public/images/cars/' . $car->img_car);
            $image = $request->file('img_car');
            $imagePath = $image->getRealPath();
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            GuardaImgCar::dispatch($imagePath, $imageName);
        } else {
            $imageName = $car->img_car;
        }

        // $car->img_car = $imgCar;
        $car->model = $request->model;
        $car->brand = $request->brand;
        $car->engine = $request->engine;
        $car->hp = $request->hp;
        $car->consum = $request->consum;
        $car->year = $request->year;
        $car->top_speed = $request->top_speed;
        $car->acceleration = $request->acceleration;
        $car->price = $request->price;
        $car->img_car = $imageName;

        $car->save();

        return back()->with('message', 'The details of the car were updated.');
    }

    public function create(Brand $brand)
    {

        return view('cars.create', ['brand' => $brand]);
    }

    public function index(Brand $brand)
    {

        $cars = Car::select('id', 'model', 'engine', 'hp', 'img_car')
            ->where('brand_id', '=', $brand->id)
            ->get();

        return view('cars.index', ['brand' => $brand->id, 'cars' => $cars]);
    }

    public function destroy(Car $carId, $brandId){
        $carId->delete();

        return to_route('cars.index',['brand' => $brandId]);
    }
}
