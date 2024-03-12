@extends('layouts.app')

@section('titulo','Contact Us')

@section('contenido')
    <div class="bg-slate-200 w-full md:w-3/4 mx-auto mb-10 px-2 shadow-md">
        @if (session('message'))
            <x-alerts.green>{{ session('message') }}</x-alerts.green>
        @endif
        <form action="{{ route('laws.store') }}" method="post" class="grid grid-cols-1 sm:grid-cols-2 gap-4 p-2">
            @csrf
            <div>
                <x-forms.label for="name">Name</x-forms.label>
                <input type="text" name="name" class="p-2 mb-5 border w-full rounded-lg" value="{{old('name')}}" placeholder="John Hazuki">
                @error('name')
                    <x-alerts.red-alert>{{$message}}</x-alerts.red-alert>
                @enderror
            </div>
            <div>
                <x-forms.label for="email">Email</x-forms.label>
                <input type="email" name="email" class="p-2 mb-5 border w-full rounded-lg" value="{{old('email')}}" placeholder="hazuki@yokosuka.com">
                @error('email')
                    <x-alerts.red-alert>{{$message}}</x-alerts.red-alert>                    
                @enderror
            </div>
            <div class="sm:col-span-2">
                <x-forms.label for="comment">Comment</x-forms.label>
                <textarea name="comment" class="p-2 mb-5 border w-full rounded-md h-32">{{old('comment')}}</textarea>
                
                @error('comment')
                    <x-alerts.red-alert>{{$message}}</x-alerts.red-alert>
                @enderror

                <x-buttons.confirm-blue>Send comment</x-buttons.confirm-blue>
            </div>

        </form>
    </div>
@endsection