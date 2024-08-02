<?php

namespace App\Http\Controllers;

use App\Models\Identitydoc;
use Illuminate\Http\Request;

class IdentitydocController extends Controller
{

    public function index()
    {

        $identitydocs = Identitydoc::all();

        return view('identitydoc.index', [
            'identitydocs' => $identitydocs
        ]);
    }

    public function create(){

        return view('identitydoc.create');
    }

    public function show(Identitydoc $identitydoc){

        return view('identitydoc.show', ['identitydoc' => $identitydoc]);

    }

    public function store(){

        request()->validate([
            'name' => 'required',
            'contry' => 'required',
            'cartId' => 'required',
            'dateDe'
        ]);

    }

    public function edit(){}

    public function update(){}

    public function destroy(){}

}
