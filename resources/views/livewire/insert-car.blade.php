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
    <form wire:submit="insertCar" class="grid grid-cols-1 md:grid-cols-3 gap-2">
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
        <div class="border p-2 border-slate-100 shadow mb-2 hidden sm:grid sm:grid-cols-6 text-center font-bold">
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
            <div>
                View/Edit
            </div>
        </div>
        @forelse ($cars as $car)
            <div class="border p-2 border-slate-100 shadow mb-2 grid sm:grid-cols-6 text-center">
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
                        wire:click="$dispatch('alertDelete',{{$car->id}})"                        
                        class="flex justify-center items-center p-2 bg-red-500 border rounded-md text-white w-full cursor-pointer hover:bg-red-800 transition duration-700 font-bold">
                        Delete car
                    </button>
                </div>
                <div>
                    <x-buttons.blue-link 
                        {{-- :url="route('cars.show',['car' => $car->id])"  --}}
                        :url="route('cars.show',['car' => $car->id, 'brand' => $brand_id])" 
                        class="flex justify-center items-center p-2 bg-blue-500 border rounded-md text-white w-full cursor-pointer hover:bg-blue-800 transition duration-700 font-bold">
                        Details
                    </x-buttons.blue-link>
                </div>
            </div>
        @empty
            <x-alerts.red-alert>There are no cars stored in the database</x-alerts.red-alert>
        @endforelse
    </div>
</div>


@push('sweetAlert')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('alertDelete', function(id) {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "The car will be delete",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Delete'
                    }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.dispatch('deleteCar', { car_id: id })
                        Swal.fire(
                        'Deleted!',
                        'The car was deleted.',
                        'success'
                        )

                    }
                })
            })
        });
    </script>
@endpush


