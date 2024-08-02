<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use Illuminate\Http\Request;

class PlatController extends Controller
{

    public function index()
    {

        $plats = Plat::all();
        return view('plats.index', [
            'plats' => $plats
        ]);
    }


}
