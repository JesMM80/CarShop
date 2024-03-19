<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class InsertCar extends Component
{
    use WithFileUploads; 
    
    public $brand_id;
    public $car_id;
    public $model;
    public $brand;
    public $engine;
    public $hp;
    public $consum;
    public $year;
    public $top_speed;
    public $acceleration;
    public $price;
    public $imgCar;

    protected $rules = [
        'model' => 'required|min:2|unique:cars,model',
        'brand' => 'required|min:2',
        'engine' => 'required|min:2',
        'hp' => 'required|min:2|integer',
        'consum' => 'required|numeric',
        'year' => 'required|min:2|integer',
        'top_speed' => 'required|min:2|integer',
        'acceleration' => 'required|numeric',
        'price' => 'required|min:2|integer',
        'imgCar' => 'image|max:1024|nullable',
    ];

    public function render()
    {
        $cars = Car::where('brand_id','=',$this->brand_id)
            ->select('model','engine','hp','img_car','id')
            ->get();

        return view('livewire.insert-car',['cars' => $cars]);
    }

    public function insertCar(){

        $this->validate();
        
        if($this->imgCar){
            $imgCarPath = $this->imgCar->store('public/images/cars');
            $imgCar = basename($imgCarPath);
        }else{
            $imgCar = '';
        }

        Car::create([
            'brand_id' => $this->brand_id,
            'model' => $this->model,
            'brand' => $this->brand,
            'engine' => $this->engine,
            'hp' => $this->hp,
            'consum' => $this->consum,
            'year' => $this->year,
            'top_speed' => $this->top_speed,
            'acceleration' => $this->acceleration,
            'price' => $this->price,
            'img_car' => $imgCar,
        ]);
        
        session()->flash('message','The car was stored.');
    }

    public function deleteCar(Car $car_id){

        if (Storage::exists('public/images/cars/' . $car_id->img_car)) {
            Storage::delete('public/images/cars/' . $car_id->img_car);
        }

        $car_id->delete();

        session()->flash('messageDelete','The car was erased from the database.');
    }
}
