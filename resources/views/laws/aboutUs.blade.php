@extends('layouts.app')
@section('titulo', 'About Us')
    
@section('contenido')

    <div class="bg-slate-50 grid grid-cols-1 sm:grid-cols-2 gap-5">
        <h2 class="text-xl mb-2 text-center mt-4">
            ¡Bienvenido a Nuestro Mundo de Velocidad y Estilo!
            <br>
            ¡Bienvenido a Carshop!
            <img src="{{asset('images/clkgtr3.webp')}}" alt="GTR2" title="AMG CLK-GTR">
        </h2>
        <div class="p-4">
            <p class="text-sm sm:text-base md:text-lg lg:text-xl xl:text-2xl mb-2">
                En nuestro apasionante universo de automóviles deportivos, la velocidad y el estilo convergen para crear 
                una experiencia inigualable. 
            </p>
            <p class="text-sm sm:text-base md:text-lg lg:text-xl xl:text-2xl mb-2">
                En nuestra sección "About Us", queremos compartir contigo la esencia de lo que somos y lo que representamos.
            </p>
            
            <p class="text-sm sm:text-base md:text-lg lg:text-xl xl:text-2xl mb-2">
                Desde nuestros modestos comienzos hasta convertirnos en un referente en el mundo de los coches deportivos, 
                nuestra pasión y dedicación han sido el motor que impulsa cada paso que damos. 
                <br>
                <br>
                Nos enorgullece ofrecerte una amplia selección de las máquinas más emocionantes sobre ruedas, 
                fusionando ingeniería de vanguardia con un diseño que inspira admiración y despierta la adrenalina en cada curva.
            </p>
            <p class="text-sm sm:text-base md:text-lg lg:text-xl xl:text-2xl mb-2">
                En el corazón de nuestra filosofía se encuentra el compromiso con la excelencia y la satisfacción del cliente. Nuestro equipo de expertos está aquí para guiar y asesorarte en tu búsqueda del automóvil deportivo perfecto, ya sea que busques la potencia pura de un motor rugiente, la elegancia aerodinámica de líneas perfectas o la emoción de la conducción en su forma más pura.
            </p>
            <p class="text-sm sm:text-base md:text-lg lg:text-xl xl:text-2xl mb-2">
                ¡Bienvenido a nuestra familia de amantes de los coches deportivos!
                [CarShop]
            </p>              
            
        </div>
    </div>
    

@endsection