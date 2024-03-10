<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateOccupantPostRequest;
use App\Http\Requests\UpdateOccupantPutRequest;
use App\Services\OccupantService;
use App\Models\Occupant;

class OccupantController extends Controller
{
    protected $occupantService;

    public function __construct(OccupantService $occupantService)
    {
        $this->occupantService = $occupantService;
    }

    public function index()
    {
        $occupants = $this->occupantService->getAllOccupants();
        return response()->json(['data' => $occupants], 200);
    }

    public function show(Occupant $occupant)
    {
        return response()->json(['data' => $occupant], 200);
    }

    public function store(CreateOccupantPostRequest $request)
    {
        $data = $request->validated();
        $occupant = $this->occupantService->createOccupant($data);
        return response()->json(['data' => $occupant], 201);
    }

    public function update(UpdateOccupantPutRequest $request, Occupant $occupant)
    {
        $data = $request->validated();
        $occupant = $this->occupantService->updateOccupant($occupant, $data);
        return response()->json(['data' => $occupant], 200);
    }

    public function destroy(Occupant $occupant)
    {
        $this->occupantService->deleteOccupant($occupant);
        return response()->json(['message' => 'Occupant deleted successfully'], 200);
    }
}
