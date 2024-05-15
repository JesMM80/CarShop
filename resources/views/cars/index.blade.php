@extends('layouts.app')

@section('titulo',"List of cars")

@section('contenido')
    <div>
        <div class="border p-2 border-slate-100 shadow mb-2 hidden sm:grid sm:grid-cols-6 text-center font-bold">
            <div>
                Pic
            </div>
            <div>
                Model
            </div>
            <div>
                Engine
            </div>
            <div>
                Horsepower
            </div>
            <div>
                Delete
            </div>
            <div>
                View/Edit
            </div>
        </div>
        @forelse ($cars as $car)
            <div class="border p-2 border-slate-100 shadow mb-2 grid sm:grid-cols-6 text-center">
                <div>
                    <label class="font-bold sm:hidden">Pic: </label>
                    <img src="{{asset('storage/images/cars/'.$car->img_car)}}" alt="{{$car->model}}" class="w-1/4 mx-auto">
                </div>
                <div>
                    <label class="font-bold sm:hidden">Model: </label>
                    {{$car->model}}
                </div>
                <div>
                    <label class="font-bold sm:hidden">Engine: </label>
                    {{$car->engine}}
                </div>
                <div>
                    <label class="font-bold sm:hidden">Horsepower: </label>
                    {{$car->hp}}
                </div>
                <div>
                    <button 
                        wire:click="$dispatch('alertDelete',{{$car->id}})"                        
                        class="flex justify-center items-center p-2 bg-red-500 border rounded-md text-white w-full cursor-pointer hover:bg-red-800 transition duration-700 font-bold">
                        Delete car
                    </button>
                </div>
                <div>
                    <x-buttons.blue-link 
                        :url="route('cars.show',['car' => $car->id, 'brand' => $brand])" 
                        class="flex justify-center items-center p-2 bg-blue-500 border rounded-md text-white w-full cursor-pointer hover:bg-blue-800 transition duration-700 font-bold">
                        Details
                    </x-buttons.blue-link>
                </div>
            </div>
        @empty
            <x-alerts.red-alert>There are no cars stored in the database</x-alerts.red-alert>
        @endforelse
    </div>
    
@endsection