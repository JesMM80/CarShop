@extends('layouts.app')

@section('titulo','List of countries')
    
@section('contenido')
    <div class="container mx-auto">
        <div class="w-11/12 mx-auto">

            @foreach ($countries as $country)
                <p class="font-bold text-xl">
                    Country: {{$country->name}}
                </p>
                
                @foreach ($country->provinces as $province )
                <p class="ml-5 font-bold">
                    Province: {{$province->name}}
                </p>
                <p class="ml-10">
                    Dealers: {{$province->dealers}}
                </p>
                @endforeach
            @endforeach

            <div class="my-2">
                {{$countries->links()}}
            </div>
        </div>
    </div>
@endsection