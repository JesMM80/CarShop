@extends('layouts.app')

@section('titulo',"Insert car")

@section('contenido')

    @livewire('insert-car', ['brand_id' => $brand->id])
    
@endsection