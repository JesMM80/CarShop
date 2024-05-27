@extends('layouts.app')

@section('titulo','Details of the Release')

@section('contenido')
    <div class="container">
        
        <div class="mx-auto sm:w-11/12 w-11/12 border-gray-800 p-5 shadow">
            <x-forms.label for="title">Title</x-forms.label>
            <p class="mb-5 ml-2">
                {{$release->title}}
            </p>

            <x-forms.label for="description">Description</x-forms.label>
            <p class="mb-5 ml-2">
                {{$release->description}}" 
            </p>  

            <x-forms.label for="title">Image</x-forms.label>
            <img src="{{$release->image}}" alt="{{$release->title}}" class="sm:w-1/4 w-full sm:ml-2">              
        </div>

        <div class="mx-auto sm:w-11/12 w-11/12 border-gray-800 p-5 shadow">
            
            <livewire:comments-list :release="$release" />
            
        </div>   
    </div>
@endsection