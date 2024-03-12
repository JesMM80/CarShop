<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){

        //Comprobamos si inició sesión, si no inició le mandamos a login, de lo contrario a pantalla principal
        if (!Auth::check()) {
            return view('auth.login');
        }else{
            return redirect()->route('user.index',['id' => auth()->user()->id ]);
        }
    }

    public function store(IndexUserRequest $request){

        if (!auth()->attempt([
            'email' => $request->email,
            'password' => $request->password],
            $request->remember
        )) {
            return back()->with('message','Incorrect email or password');
        }

        return redirect()->route('user.index',['id' => auth()->user()->id]);
    }
}
