@extends('layouts.app')

@section('titulo','Brands')
@section('contenido')

    <x-menu-brands />

    <div>
        @if (session('message'))
            <x-alerts.green>
                {{ session('message') }}
            </x-alerts.green>
        @endif
    </div>

    <div class="mx-5 container grid sm:grid-cols-1 md:grid-cols-5 gap-4">
        
        @forelse ($brands as $brand)
            <a href="{{route('brands.edit',$brand->id)}}" class="flex justify-center items-center">
                <div 
                    class="p-4 rounded-md border border-blue-700 bg-blue-100 hover:bg-blue-500 hover:transition hover:duration-700 cursor-pointer text-center">
                    
                    <p class="pb-2">
                        {{$brand->name}}
                    </p>
                    <img src="{{ asset('storage/brands/' . $brand->logo) }}" alt="Brand" class="w-full h-32 object-contain sm:h-40 md:h-48 lg:h-56 xl:h-64">
                </div>            
            </a>
        @empty
            <div class="p-4 col-span-5 text-center mx-2">
                <x-alerts.red-alert class="text-xl">There are no brands saved yet!</x-alerts.red-alert>
            </div> 
        @endforelse 
    </div>

@endsection