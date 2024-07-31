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
        return response()->json([
            'success' => true,
            'message' => 'Company index successfully',
            'data' => $company
        ], 200);


    }

    // POST /api/companies
    public function store(CompanyRequest $request)
    {

        $company = Company::create($request->validated());
        //return new CompanyResource($company);
        return response()->json([
            'success' => true,
            'message' => 'Company store successfully',
            'data' => $company
        ],200 );
    }

    // GET /api/companies/{id}
    public function show(Company $company)
    {

        return response()->json([
            'success' => true,
            'message' => 'Company show successfully',
            'data' => new CompanyResource($company)
        ]);

    }

    // PUT /api/companies/{id}
    public function update(CompanyRequest $request, Company $company)
    {
        $company->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Company updated successfully',
            'data' => $company
        ]);
    }

    // DELETE /api/companies/{id}
    public function destroy(Company $company)
    {
        $company->delete();

        return response()->json([
            'success' => true,
            'message' => 'Company deleted successfully',
            'data' => $company

        ]);
    }
}
