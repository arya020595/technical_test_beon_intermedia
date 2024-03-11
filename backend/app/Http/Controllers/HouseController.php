<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Services\HouseService;
use App\Http\Requests\CreateHousePostRequest;

class HouseController extends Controller
{
    protected $houseService;

    public function __construct(HouseService $houseService)
    {
        $this->houseService = $houseService;
    }

    public function index()
    {
        $houses = $this->houseService->getAllHouses();
        return response()->json(['data' => $houses], 200);
    }

    public function show(House $house)
    {
        return response()->json(['data' => $house], 200);
    }

    public function store(CreateHousePostRequest $request)
    {
        $data = $request->validated();

        $house = $this->houseService->createHouse($data);

        return response()->json(['data' => $house], 201);
    }

    public function update(CreateHousePostRequest $request, House $house)
    {
        $data = $request->validated();

        $house = $this->houseService->updateHouse($house, $data);

        return response()->json(['data' => $house], 200);
    }

    public function destroy(House $house)
    {
        $this->houseService->deleteHouse($house);
        return response()->json(['message' => 'House deleted successfully'], 200);
    }
}
