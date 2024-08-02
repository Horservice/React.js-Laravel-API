<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;


class CompanyController extends Controller
{

    // GET /api/companies
    public function index()
    {
        $company = CompanyResource::collection(Company::all());

        $reponse = array(
            'success' => true,
            'message' => 'Company index successfully',
            'data' => $company
        );

        return response()->json($reponse,200);

    }

    // POST /api/companies
    public function store(CompanyRequest $request)
    {

        $validated = $request->validated();

        if (Company::where('email', $validated['email'])->exists()) {
            $reponse = array(
                'success' => false,
                'message' => 'Email already exists',
            );

            return response()->json($reponse,400); //<-- changer le status

        }


        $company = Company::create($request->validated());
        $reponse = array(
        'success' => true,
        'message' => 'Company store successfully',
          'data' => $company
        );

        return response()->json($reponse,200);
    }

    // GET /api/companies/{id}
    public function show(Company $company)
    {
        $reponse = array(
            'success' => true,
            'message' => 'Company show successfully',
            'data' => new CompanyResource($company)
        );
        return response()->json($reponse,200);

    }

    // PUT /api/companies/{id}
    public function update(CompanyRequest $request, Company $company)
    {

        $validated = $request->validated();

        if (Company::where('email', $validated['email'])->exists()) {
            $reponse = array(
                'success' => false,
                'message' => 'Email already exists',
            );
            return response()->json($reponse,400); //<- changer le statue
        }

        $company->update($request->validated());

        $reponse = array(
            'success' => true,
            'message' => 'Company update successfully',
            'data' => new CompanyResource($company)
        );
        return response()->json($reponse,200);
    }

    // DELETE /api/companies/{id}
    public function destroy(Company $company)
    {
        $company->delete();
        $reponse = array(
            'success' => true,
            'message' => 'Company deleted successfully',
            'data' => $company
        );
        return response()->json($reponse,200);
    }
}
