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
                <div class="mb-5 text-xl font-bold text-gray-600">
                    Bievenido a CarShop!
                </div>

                <div class="mb-5">
                    <img src="{{ asset('images/Mercedes-Benz_CLK_GTR.jpg') }}" class="mx-auto block w-2/4" alt="amg" title="AMG GTR">
                </div>

                <div class="mb-5 mt-10">
                    <x-buttons.blue-link :url="route('login')">
                        Entrar
                    </x-buttons.blue-link>
                </div>
            </div>
        </div>
    </div>
  
  
  </main>
</body>
</html>

