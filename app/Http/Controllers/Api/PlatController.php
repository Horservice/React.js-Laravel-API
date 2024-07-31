<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlatRequest;
use App\Http\Resources\PlatResource;
use App\Models\Plat;
use Illuminate\Http\Request;

class PlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // GET /api/plats

    public function index()
    {
        $plat = PlatResource::collection(Plat::all());

        $response = array(
            'success' => true,
            'message' => 'List all Plat',
            'data' => $plat
        );

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    // POST /api/plats
    public function store(PlatRequest $request)
    {

        $plat = Plat::create($request->validated());
        $response = array(
            'success' => true,
            'message' => 'Plat store successfully',
            'data' => $plat
        );

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     */
    // GET /api/plats/{id}
    public function show(Plat $plat)
    {
        $response = array(
            'success' => true,
            'message' => 'List show Plat',
            'data' => new PlatResource($plat)
        );
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    // PUT /api/plats/{id}
    public function update(PlatRequest $request, Plat $plat)
    {

        $plat->update($request->validated());

        $response = array(
            'success' => true,
            'message' => 'Plat update successfully',
            'data' => new PlatResource($plat)
        );
        return response()->json($response, 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    // DELETE /api/plats/{id}
    public function destroy(Plat $plat)
    {

        $plat->delete();
        $response = array(
            'success' => true,
            'message' => 'Plat deleted successfully',
            'data' => $plat
        );
        return response()->json($response, 200);
    }
}
