@extends('layouts.app')

@section('titulo','News from CarShop')

@section('contenido')
    <div class="container">
        <div class="mx-auto w-11/12 flex flex-wrap sm:w-full md:w-11/12 border border-gray-100 shadow-md p-2">
            @foreach ($releases as $release)
                <div class="w-full p-4 border border-black">
                    <a href="{{route('releases.show', $release->id)}}" class="no-underline">
                        <p class="font-bold text-lg underline">
                            {{$release->title}}
                        </p>
                        <p class="text-lg">
                            {{$release->description}}
                        </p>
                        <img 
                            src="{{$release->image}}" 
                            alt="{{$release->title}}"
                            class="sm:w-1/4 w-full">
                        <p class="text-sm text-gray-500">
                            {{$release->comments}}
                        </p>
                    </a>
                    </div>
            @endforeach
        </div>
    </div>
    <div class="my-2 w-11/12 m-auto">
        {{ $releases->links() }}
    </div>
@endsection

