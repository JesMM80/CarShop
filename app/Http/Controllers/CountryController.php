<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::with('provinces')->paginate(5);
        return view('countries.index',['countries' => $countries]);
    }
}
