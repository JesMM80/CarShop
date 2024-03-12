<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContactRequest;
use Illuminate\Support\Facades\Http;

class StaticPagesController extends Controller
{
    public function about(){
        return view('laws.aboutUs');
    }
    public function contact(){
        return view('laws.contact');
    }

    public function store(StoreContactRequest $request){
        
        Contact::create($request->all());

        return back()->with('message','Su formulario se ha recibido!');

    }

    // Prueba de conexión a API externa
    public function store_paises(StoreContactRequest $request){
        
        $response = Http::get('https://reqres.in/api/users?page=2');
        $countries = $response->json();
        foreach ($countries as $country) {
            echo "Nombre común: " . $country['id'] . "<br>";
            echo "Nombre oficial: " . $country['email'] . "<br>";
            echo "Nombre nativo: ";
            if (isset($country['name']['nativeName'])) {
                // Itera sobre las claves dentro de 'nativeName' para mostrar los nombres nativos disponibles
                foreach ($country['name']['nativeName'] as $language => $names) {
                    echo $names['common'] . " (en " . $language . ")<br>";
                }
            } else {
                echo "Nombre nativo no disponible <br>";
            }

            echo "TLD: ";
            if (isset($country['tld'])) {
                echo implode(", ", $country['tld']) . "<br>";
            } else {
                echo "TLD no disponible <br>";
            }
            echo "<hr>";
        }
    }

    // Conexión a API externa
    public function user()
    {
        // Realizar la solicitud HTTP para obtener los datos del usuario
        $response = Http::get('https://reqres.in/api/users/5');

        // Verificar si la solicitud fue exitosa
        if ($response->successful()) {
            // Decodificar la respuesta JSON
            $userData = $response->json();

            // Acceder a los datos del usuario y mostrarlos
            $userId = $userData['data']['id'];
            $email = $userData['data']['email'];
            $firstName = $userData['data']['first_name'];
            $lastName = $userData['data']['last_name'];
            $avatarUrl = $userData['data']['avatar'];

            // Mostrar los datos del usuario
            echo "ID: $userId <br>";
            echo "Email: $email <br>";
            echo "Nombre: $firstName <br>";
            echo "Apellido: $lastName <br>";
            echo "Avatar: <img src='$avatarUrl' alt='Avatar'> <br>";
        } else {
            echo "Error al obtener los datos del usuario";
        }

    }

}
