<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Car;
use Livewire\Component;

class InsertCar extends Component
{
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
    ];

    public function render()
    {
        $cars = Car::where('brand_id','=',$this->brand_id)->get();

        return view('livewire.insert-car',['cars' => $cars]);
    }

    public function insertCar(){

        $this->validate();

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
            'price' => $this->price
        ]);

        session()->flash('message','The car was stored.');
    }

    public function deleteCar(Car $carId){
        $carId->delete();

        session()->flash('messageDelete','The car was erased from the database.');
    }
}
