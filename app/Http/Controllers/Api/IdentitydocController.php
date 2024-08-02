<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\IdentitydocRequest;
use App\Http\Resources\IdentitydocResource;
use App\Models\Identitydoc;

class IdentitydocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // GET /api/identitydocs
    public function index()
    {
        $identitydocs = IdentitydocResource::collection(Identitydoc::all());

        $reponse = array(
            'success' => true,
            'message' => 'Identitydoc retrieved successfully',
            'data' => $identitydocs
        );

        return response()->json($reponse, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    // POST /api/identitydocs
    public function store(IdentitydocRequest $request)
    {

        $validated = $request->validated();

        $cartIdExist = Identitydoc::where('cartId', $validated['cartId'])->exists();

        if ($cartIdExist) {
            return response()->json([
                'success' => false,
                'message' => 'Cart ID already exists. Please use a different Cart ID.',
            ], 400);

        }

        $identitydoc = Identitydoc::create($validated);

        $reponse = array(
            'success' => true,
            'message' => 'Identitydoc saved successfully',
            'data' => $identitydoc,
        );

        return response()->json($reponse, 200);

    }

    /**
     * Display the specified resource.
     */
    // GET /api/identitydocs/{id}
    public function show(Identitydoc $identitydoc)
    {
        $reponse = array(
            'success' => true,
            'message' => 'Identitydoc retrieved successfully',
            'data' => new IdentitydocResource($identitydoc)
        );
        return response()->json($reponse, 200);

    }

    /**
     * Update the specified resource in storage.
     */
    // PUT /api/identitydocs/{id}
    public function update(IdentitydocRequest $request, Identitydoc $identitydoc)
    {

        $validated = $request->validated();

        $cartIdExist = Identitydoc::where('cartId', $validated['cartId'])->exists();

        if ($cartIdExist) {
            return response()->json([
                'success' => false,
                'message' => 'Cart ID already exists. Please use a different Cart ID.',
            ], 400);

        }

        $identitydoc->update($validated);
        $reponse = array(
            'success' => true,
            'message' => 'Identitydoc updated successfully',
            'data' => new IdentitydocResource($identitydoc)
        );

        return response()->json($reponse, 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    // DELETE /api/identitydocs/{id}
    public function destroy(Identitydoc $identitydoc)
    {
        $identitydoc->delete();
        $reponse = array(
            'success' => true,
            'message' => 'Identitydoc deleted successfully',
            'data' => $identitydoc
        );
        return response()->json($reponse, 200);
    }
}
