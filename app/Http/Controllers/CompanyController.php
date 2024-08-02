<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){

        $companys = Company::all();

        return view('company.index', [
            'companys' => $companys
        ]);
    }

    public function create(){
        return view('company.create');
    }

    public function show(Company $company){

        return view('company.show', ['company' => $company]);
    }

    public function store(){

        request()->validate([
            'name' => ['required'],
            'email' => ['required'],
            'address' => ['required'],
        ]);

        $company = Company::create([
            'name' => request('name'),
            'email' => request('email'),
        ]);

        return redirect('/company')->with('message', 'Company has been created');

    }

    public function edit(Company $company){

        return view('company.edit', ['company' => $company]);


    }

    public function update(Company $company){

        request()->validate([
            'name' => ['required'],
            'email' => ['required'],
        ]);

        $company->update([
            'name' => request('name'),
            'email' => request('email'),
        ]);

        return redirect('/company')->with('message', 'Company has been updated');

    }

    public function destroy(Company $company){

        $company->delete();

        return redirect('/company')->with('success', 'Company has been deleted');
    }
}
