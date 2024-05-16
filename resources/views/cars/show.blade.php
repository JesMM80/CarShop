@extends('layouts.app')

@section('titulo',"Car's Details")

@section('contenido')
<div class="container mx-auto bg-slate-50">
    @if (session('message'))
        <x-alerts.green>
            {{session('message')}}
        </x-alerts.green>
    @endif
    @if (session('messageDelete'))
        <x-alerts.green>
            {{session('messageDelete')}}
        </x-alerts.green>
    @endif
    <div>
        <form action="{{route('cars.update',$car)}}" class="grid grid-cols-1 md:grid-cols-3 gap-2" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mx-2">
                <x-forms.label for="model">Model</x-forms.label>
                <x-forms.input-text name="model" placeholder="CLK 55" value="{{old('model', $car->model)}}"/>
                @error('model')
                    <x-alerts.red-alert>
                        {{$message}}
                    </x-alerts.red-alert>
                @enderror
            </div>
            <div class="mx-2">
                <x-forms.label for="brand">Brand</x-forms.label>
                <x-forms.input-text name="brand" placeholder="Mercedes-Benz" value="{{old('brand', $car->brand)}}"/>
                @error('brand')
                    <x-alerts.red-alert>
                        {{$message}}
                    </x-alerts.red-alert>
                @enderror
            </div>
            <div class="mx-2">
                <x-forms.label for="engine">Engine</x-forms.label>
                <x-forms.input-text name="engine" placeholder="V8 5.5" value="{{old('engine', $car->engine)}}"/>
                @error('engine')
                    <x-alerts.red-alert>
                        {{$message}}
                    </x-alerts.red-alert>
                @enderror
            </div>
            <div class="mx-2">
                <x-forms.label for="hp">Horse Power</x-forms.label>
                <x-forms.input-text name="hp" placeholder="367" value="{{old('hp', $car->hp)}}"/>
                @error('hp')
                    <x-alerts.red-alert>
                        {{$message}}
                    </x-alerts.red-alert>
                @enderror
            </div>
            <div class="mx-2">
                <x-forms.label for="consum">Consum</x-forms.label>
                <x-forms.input-text name="consum" placeholder="12.5" value="{{old('consum', $car->consum)}}"/>
                @error('consum')
                    <x-alerts.red-alert>
                        {{$message}}
                    </x-alerts.red-alert>
                @enderror
            </div>
            <div class="mx-2">
                <x-forms.label for="year">Year</x-forms.label>
                <x-forms.input-text name="year" placeholder="2004" value="{{old('year', $car->year)}}"/>
                @error('year')
                    <x-alerts.red-alert>
                        {{$message}}
                    </x-alerts.red-alert>
                @enderror
            </div>
            <div class="mx-2">
                <x-forms.label for="top_speed">Top Speed</x-forms.label>
                <x-forms.input-text name="top_speed" placeholder="250" value="{{old('top_speed', $car->top_speed)}}"/>
                @error('top_speed')
                    <x-alerts.red-alert>
                        {{$message}}
                    </x-alerts.red-alert>
                @enderror
            </div>
            <div class="mx-2">
                <x-forms.label for="acceleration">Acceleration</x-forms.label>
                <x-forms.input-text name="acceleration" placeholder="4.9" value="{{old('acceleration', $car->acceleration)}}"/>
                @error('acceleration')
                    <x-alerts.red-alert>
                        {{$message}}
                    </x-alerts.red-alert>
                @enderror
            </div>
            <div class="mx-2">
                <x-forms.label for="price">Price</x-forms.label>
                <x-forms.input-text name="price" placeholder="100000" value="{{old('price', $car->price)}}"/>
                @error('price')
                    <x-alerts.red-alert>
                        {{$message}}
                    </x-alerts.red-alert>
                @enderror
            </div>
            <div class="flex items-center h-full mx-2">
                <img src="{{asset('storage/images/cars/'.$car->img_car)}}" alt="{{$car->model}}" class="w-1/4 mx-auto">
                <input type="file" name="img_car">
            </div>
            <div class="text-center w-full sm:w-2/3 mx-auto mt-5 sm:col-span-3">
                <x-buttons.confirm-blue>Update</x-buttons.confirm-blue>
            </div>
        </form>
        <a href="{{route('cars.index',$brand)}}" class="mt-2 py-2 px-4 bg-sky-800 hover:bg-sky-600 transition-colors border rounded-md text-white w-full sm:w-2/3 mx-auto block text-center">
            Go back
        </a>
        {{-- <x-buttons.dblue-link url="{{route('brands.edit',$brand)}}">Volver</x-buttons.dblue-link> --}}
    </div>
</div>
@endsection