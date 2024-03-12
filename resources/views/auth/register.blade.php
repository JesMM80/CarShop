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
                    <form method="POST" action="{{route('register.store')}}">
                        @csrf
                            
                        <div class="mb-5 text-xl font-bold text-gray-600">
                            Registro en CarShop
                        </div>

                        <div class="mb-5">
                            <label for="email" class="mb-2 block uppercase text-gray-500 font-bold text-left">
                                Email
                            </label>
                            <input type="email" name="email" id="email" placeholder="Email" class="border p-3 w-full rounded-lg" value="{{old('email')}}">
                            @error('email')
                                <x-alerts.red-alert>
                                    {{$message}}
                                </x-alerts.red-alert>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="name" class="mb-2 block uppercase text-gray-500 font-bold text-left">
                                Name
                            </label>
                            <input type="text" name="name" placeholder="User's name" class="border p-3 w-full rounded-lg" value="{{old('name')}}">
                            @error('name')
                                <x-alerts.red-alert>
                                    {{$message}}
                                </x-alerts.red-alert>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="password" class="mb-2 block uppercase text-gray-500 font-bold text-left">
                                Password
                            </label>
                            <input type="password" name="password" id="password" placeholder="password" class="border p-3 w-full rounded-lg">
                            @error('password')
                                <x-alerts.red-alert>
                                    {{$message}}
                                </x-alerts.red-alert>
                            @enderror                    
                        </div>

                        <div class="mb-5">
                            <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold text-left">
                                Repeat password
                            </label>
                            <input type="password" name="password_confirmation" class="border p-3 w-full rounded-lg" placeholder="Repeat password">
                            @error('password_confirmation')
                                <x-alerts.red-alert>
                                    {{$message}}
                                </x-alerts.red-alert>
                            @enderror
                        </div>
                        <x-buttons.confirm-blue>
                            Register
                        </x-buttons.confirm-blue>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

