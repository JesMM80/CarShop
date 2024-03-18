
@extends('layouts.app')

@section('titulo','Edit brand')

@section('contenido')
    <form action="{{route('brands.update',$brand->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="bg-slate-50 mx-auto grid grid-cols-1 md:grid-cols-2">
            <div class="p-2">
                <x-forms.label for="name">Name</x-forms.label>
                <x-forms.input-text name="name" value="{{old('name',$brand->name)}}"/>
                @error('name')
                    <x-alerts.red-alert>
                        {{$message}}
                    </x-alerts.red-alert>                    
                @enderror

                <x-forms.label for="country">Country</x-forms.label>
                <x-forms.input-text name="country" value="{{old('country',$brand->country)}}"/>
                @error('country')
                    <x-alerts.red-alert>
                        {{$message}}
                    </x-alerts.red-alert>
                @enderror
            </div>
            <div class="flex justify-center items-center h-full">
                <img src="{{ asset('storage/brands/' . $brand->logo) }}" alt="Brand" class="w-1/4 mr-2">
                <input type="file" name="logo">
            </div>
        </div>
        <div class="text-center w-3/5 mx-auto my-5">
            <x-buttons.confirm-blue>
                Save details
            </x-buttons.confirm-blue>
        </div>
    </form>
    <form action="{{route('brands.destroy',$brand->id)}}" method="post">
        @csrf
        @method('delete')
        <div class="text-center w-3/5 mx-auto my-5">
            <x-buttons.confirm-red>
                Delete brand
            </x-buttons.confirm-red>
        </div>
    </form>
    @livewire('insert-car', ['brand_id' => $brand->id])
    {{-- <livewire:insert-car :brand_id="$brand->id"/> --}}
@endsection