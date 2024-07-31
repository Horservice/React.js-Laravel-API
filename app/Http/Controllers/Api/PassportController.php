<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PassportRequest;
use App\Http\Resources\PassportResource;
use App\Models\Passport;

class PassportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // GET /api/passports
    public function index()
    {
        $passports = PassportResource::collection(Passport::all());

        $reponse = array(
            'success' => true,
            'message' => 'Passport retrieved successfully',
            'data' => $passports
        );

        return response()->json($reponse, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    // POST /api/passports
    public function store(PassportRequest $request)
    {
        $passport = Passport::create($request->validated());
        $reponse = array(
            'success' => true,
            'message' => 'Passport saved successfully',
            'data' => $passport,
        );

        return response()->json($reponse, 200);
    }

    /**
     * Display the specified resource.
     */
    // GET /api/passports/{id}
    public function show(Passport $passport)
    {
        $reponse = array(
            'success' => true,
            'message' => 'Passport retrieved successfully',
            'data' => new PassportResource($passport)
        );
        return response()->json($reponse, 200);

    }

    /**
     * Update the specified resource in storage.
     */
    // PUT /api/passports/{id}
    public function update(PassportRequest $request, Passport $passport)
    {
        $passport->update($request->validated());
        $reponse = array(
            'success' => true,
            'message' => 'Passport updated successfully',
            'data' => new PassportResource($passport)
        );
        return response()->json($reponse, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    // DELETE /api/passports/{id}
    public function destroy(Passport $passport)
    {
        $passport->delete();
        $reponse = array(
            'success' => true,
            'message' => 'Passport deleted successfully',
            'data' => $passport
        );
        return response()->json($reponse, 200);
    }
}
