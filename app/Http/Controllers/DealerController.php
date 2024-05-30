<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use Illuminate\Http\Request;

class DealerController extends Controller
{
    public function index()
    {
        $dealers = Dealer::all();
        return view('dealers.index',['dealers' => $dealers]);
    }
}
