<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OccupantHouse;
use App\Services\OccupantHouseService;
use App\Http\Requests\CreateOccupantHouseRequest;

class OccupantHouseController extends Controller
{
    protected $occupantHouseService;

    public function __construct(OccupantHouseService $occupantHouseService)
    {
        $this->occupantHouseService = $occupantHouseService;
    }

    public function index()
    {
        $occupanthouses = $this->occupantHouseService->getAllOccupantHouses();
        return response()->json(['data' => $occupanthouses], 200);
    }

    public function show(OccupantHouse $occupanthouse)
    {
        return response()->json(['data' => $occupanthouse], 200);
    }

    public function store(CreateOccupantHouseRequest $request)
    {
        $data = $request->validated();

        $occupanthouse = $this->occupantHouseService->createOccupantHouse($data);

        return response()->json(['data' => $occupanthouse], 201);
    }

    public function update(CreateOccupantHouseRequest $request, OccupantHouse $occupanthouse)
    {
        $data = $request->validated();

        $occupanthouse = $this->occupantHouseService->updateOccupantHouse($occupanthouse, $data);

        return response()->json(['data' => $occupanthouse], 200);
    }

    public function destroy(OccupantHouse $occupanthouse)
    {
        $this->occupantHouseService->deleteOccupantHouse($occupanthouse);
        return response()->json(['message' => 'OccupantHouse deleted successfully'], 200);
    }
}
