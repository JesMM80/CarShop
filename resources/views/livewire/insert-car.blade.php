<div class="container mx-auto bg-slate-50">
    <h2 class="text-center text-3xl font-bold mb-5">Insert Car</h2>
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
    <form wire:submit.prevent="insertCar" class="grid grid-cols-1 md:grid-cols-3 gap-2">
        <div class="mx-2">
            <x-forms.label for="model">Model</x-forms.label>
            <input type="text" wire:model="model" placeholder="CLK 55" class="p-2 mb-5 border w-full lg:w-11/12 rounded-lg">        
            @error('model')
                <x-alerts.red-alert>
                    {{$message}}
                </x-alerts.red-alert>
            @enderror
        </div>
        <div class="mx-2">
            <x-forms.label for="brand">Brand</x-forms.label>
            <input type="text" wire:model="brand" placeholder="Mercedes-Benz" class="p-2 mb-5 border w-full lg:w-11/12 rounded-lg">
            @error('brand')
                <x-alerts.red-alert>
                    {{$message}}
                </x-alerts.red-alert>
            @enderror
        </div>
        <div class="mx-2">
            <x-forms.label for="engine">Engine</x-forms.label>
            <input type="text" wire:model="engine" placeholder="V8 5.5" class="p-2 mb-5 border w-full lg:w-11/12 rounded-lg">
            @error('engine')
                <x-alerts.red-alert>
                    {{$message}}
                </x-alerts.red-alert>
            @enderror
        </div>
        <div class="mx-2">
            <x-forms.label for="hp">Horse Power</x-forms.label>
            <input type="text" wire:model="hp" placeholder="367" class="p-2 mb-5 border w-full lg:w-11/12 rounded-lg">
            @error('hp')
                <x-alerts.red-alert>
                    {{$message}}
                </x-alerts.red-alert>
            @enderror
        </div>
        <div class="mx-2">
            <x-forms.label for="consum">Consum</x-forms.label>
            <input type="text" wire:model="consum" placeholder="12.5" class="p-2 mb-5 border w-full lg:w-11/12 rounded-lg">
            @error('consum')
                <x-alerts.red-alert>
                    {{$message}}
                </x-alerts.red-alert>
            @enderror
        </div>
        <div class="mx-2">
            <x-forms.label for="year">Year</x-forms.label>
            <input type="text" wire:model="year" placeholder="2004" class="p-2 mb-5 border w-full lg:w-11/12 rounded-lg">
            @error('year')
                <x-alerts.red-alert>
                    {{$message}}
                </x-alerts.red-alert>
            @enderror
        </div>
        <div class="mx-2">
            <x-forms.label for="top_speed">Top Speed</x-forms.label>
            <input type="text" wire:model="top_speed" placeholder="250" class="p-2 mb-5 border w-full lg:w-11/12 rounded-lg">
            @error('top_speed')
                <x-alerts.red-alert>
                    {{$message}}
                </x-alerts.red-alert>
            @enderror
        </div>
        <div class="mx-2">
            <x-forms.label for="acceleration">Acceleration</x-forms.label>
            <input type="text" wire:model="acceleration" placeholder="4.9" class="p-2 mb-5 border w-full lg:w-11/12 rounded-lg">
            @error('acceleration')
                <x-alerts.red-alert>
                    {{$message}}
                </x-alerts.red-alert>
            @enderror
        </div>
        <div class="mx-2">
            <x-forms.label for="price">Price</x-forms.label>
            <input type="text" wire:model="price" placeholder="100000" class="p-2 mb-5 border w-full lg:w-11/12 rounded-lg">
            @error('price')
                <x-alerts.red-alert>
                    {{$message}}
                </x-alerts.red-alert>
            @enderror
        </div>
        <div class="flex items-center h-full mx-2">
            <input type="file" wire:model="imgCar">
            @if ($imgCar)
                Foto preview:
                <img src="{{ $imgCar->temporaryUrl() }}">
            @endif
        </div>
        <div class="text-center w-3/5 mx-auto my-5 sm:col-span-3">
            <x-buttons.confirm-blue>Insert</x-buttons.confirm-blue>
        </div>
    </form>
    <div>
        <div class="border p-2 border-slate-100 shadow mb-2 hidden sm:grid sm:grid-cols-5 text-center font-bold">
            <div>
                Pic
            </div>
            <div>
                Model
            </div>
            <div>
                Engine
            </div>
            <div>
                Horsepower
            </div>
            <div>
                Delete
            </div>
        </div>
        @forelse ($cars as $car)
            <div class="border p-2 border-slate-100 shadow mb-2 grid sm:grid-cols-5 text-center">
                <div>
                    <label class="font-bold sm:hidden">Pic: </label>
                    <img src="{{asset('storage/images/cars/'.$car->img_car)}}" alt="{{$car->model}}" class="w-1/4 mx-auto">
                </div>
                <div>
                    <label class="font-bold sm:hidden">Model: </label>
                    {{$car->model}}
                </div>
                <div>
                    <label class="font-bold sm:hidden">Engine: </label>
                    {{$car->engine}}
                </div>
                <div>
                    <label class="font-bold sm:hidden">Horsepower: </label>
                    {{$car->hp}}
                </div>
                <div>
                    <button 
                        wire:click="deleteCar({{$car->id}})"
                        class="flex justify-center items-center p-2 bg-red-500 border rounded-md text-white w-full cursor-pointer hover:bg-red-800 transition duration-700 font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                        Delete  
                    </button>
                </div>
            </div>
        @empty
            <x-alerts.red-alert>There are no cars stored in the database</x-alerts.red-alert>
        @endforelse
    </div>
</div>
