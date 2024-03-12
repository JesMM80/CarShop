<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>CarShop Login</title>
</head>
<body>
  <main>
    <div class="container mx-auto text-center">

        <div class="grid place-items-center h-screen mt-10">
            <div class="w-full sm:w-3/4 md:w-1/2 lg:w-2/3 xl:w-3/4 bg-white p-6 rounded-lg shadow-xl">

                @if (session('message'))
                    <x-alerts.red-alert class="p-6 text-lg">
                        {{ session('message') }}
                    </x-alerts.red-alert>
                @endif

                <form method="POST" action="{{route('auth.store')}}">
                    @csrf
                        
                    <div class="mb-5 text-xl font-bold text-gray-600">
                        Inicio de sesión en CarShop
                    </div>

                    <div class="mb-5">
                        <label for="email" class="mb-2 block uppercase text-gray-500 font-bold text-left">
                            Email
                        </label>
                        <input type="email" name="email" placeholder="Email" class="border p-3 w-full rounded-lg" value="{{old('email')}}">
                        
                        @error('email')
                            <x-alerts.red-alert>
                                {{$message}}
                            </x-alerts.red-alert>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="password" class="mb-2 block uppercase text-gray-500 font-bold text-left">
                            Contraseña
                        </label>
                        <input type="password" name="password" placeholder="password" class="border p-3 w-full rounded-lg">
                        @error('password')
                            <x-alerts.red-alert>
                                {{$message}}
                            </x-alerts.red-alert>
                        @enderror                    
                    </div>
    
                    <div class="mb-5">
                        <input type="checkbox" name="remember">
                        <label class="text-gray-500 text-sm">Mantener sesión abierta</label>
                    </div>
                    <x-buttons.confirm-blue>
                        Iniciar sesión
                    </x-buttons.confirm-blue>
                </form>
                <x-buttons.dblue-link :url="route('register.index')">
                    Registro
                </x-buttons.dblue-link>
            </div>
        </div>
    </div>
  
  
  </main>
</body>
</html>

