@extends('layouts.app')

@section('titulo','Create a brand')

@section('contenido')
    <x-menu-brands />

    <div class="mx-auto w-full md:w-3/4 bg-gray-100 shadow-lg mb-10">
        @if (session('error'))
            <x-alerts.red-alert>
                {{session('error')}}
            </x-alerts.red-alert>            
        @endif

        @if(session('message'))
            <x-alerts.green>
                {{session('message')}}
            </x-alerts.green>
        @endif

        <form action="{{ route('brands.store') }}" method="post" class="ml-2 grid grid-cols-2 gap-2" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <x-forms.label for="name">Brand name</x-forms.label>
                <x-forms.input-text name="name" placeholder="Mercedes" value="{{old('name')}}"/>
                @error('name')
                    <x-alerts.red-alert>
                        {{$message}}
                    </x-alerts.red-alert>
                @enderror

                <x-forms.label for="country">Country</x-forms.label>
                <x-forms.input-text name="country" placeholder="Germany" value="{{old('country')}}"/>
                @error('country')
                    <x-alerts.red-alert>
                        {{$message}}
                    </x-alerts.red-alert>
                @enderror
            </div>
            <div class="mt-2">
                <input type="file" accept="image/*" name="logo" class="p-2 mb-5 border sm:w-full md:w-11/12 rounded-lg">
                @error('logo')
                    <<x-alerts.red-alert>
                        {{$message}}
                    </x-alerts.red-alert>
                @enderror
            </div>
            <div class="col-span-2 mx-auto w-2/3 mb-10 mt-5">
                <x-buttons.confirm-blue>Save brand</x-buttons.confirm-blue>
            </div>
        </form>
    </div>
@endsection