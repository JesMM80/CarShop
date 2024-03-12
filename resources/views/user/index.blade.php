@extends('layouts.app')

@section('titulo','Perfil de usuario')

@section('contenido')
    <div class="mx-auto mt-5">
        <div class="grid grid-cols-1 w-full md:grid-cols-2 md:w-3/4 mx-auto gap-2 p-2 shadow-lg mb-5">
            <div class="bg-blue-100">
                <div class="p-2">
                    <p class="text-lg text-center">
                        Datos del Usuario
                    </p>
                    <x-forms.label for="name">Name</x-label>
                    <input type="text" name="name" class="p-2 w-full border rounded" value="{{auth()->user()->name}}">
                </div>
                <div class="p-2">
                    <x-forms.label for="email">Email</x-forms.label>
                    <input type="text" name="email" class="p-2 w-full border rounded" value="{{auth()->user()->email}}">
                </div>
                <div class="p-2">
                    <x-forms.label for="registered">
                        Registered
                    </x-forms.label>
                    <input type="text" name="registered" class="p-2 w-full border rounded" value="{{auth()->user()->created_at->format('d/m/Y')}}">
                </div>
            </div>
            <div class="bg-gray-100">
                <img src="{{asset('images/clkgtr2.jpg')}}" alt="gtr2" title="CLK">
            </div>
            <div class="md:col-span-2 bg-gray-100 p-2">
                Datos adicionales
            </div>
        </div>
    </div>

@endsection