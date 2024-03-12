<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;

class ListCarBrands extends Component
{
    public $model;
    public $brand;
    public $engine;
    public $hp;
    public $consum;
    public $year;
    public $maxspeed;
    public $acceleration;
    public $price;
    public $name;
    
    protected $rules = [
        'model' => 'required|min:2',
        'brand' => 'required|min:2',
        'engine' => 'required|min:2',
        'hp' => 'required|min:2|integer',
        'consum' => 'required|min:2|integer',
        'year' => 'required|min:2|integer',
        'maxspeed' => 'required|min:2|integer',
        'acceleration' => 'required|min:2|integer',
        'price' => 'required|min:2|integer',
    ];
    
    public function render()
    {
        $cars = Car::all();
        return view('livewire.list-car-brands',['cars' => $cars]);
    }
}
