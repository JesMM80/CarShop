<div class="flex justify-center">
    <h2 class="text-3xl font-bold mb-5">
        @yield('titulo')
    </h2>    
    <a href="{{route('cars.create',$brand)}}"
        class="px-6 bg-blue-500 border rounded-md text-white w-full sm:w-auto items-center flex ml-5 mb-2 hover:bg-blue-800 transition-colors duration-700">
        Insert car
    </a>
    <a href="{{route('cars.index',$brand)}}"
        class="px-6 bg-green-500 border rounded-md text-white w-full sm:w-auto items-center flex ml-5 mb-2 hover:bg-green-800 transition-colors duration-700">
        List cars
    </a>
</div>