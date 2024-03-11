<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DuesType;
use App\Services\DuesTypeService;
use App\Http\Requests\CreateDuesTypePostRequest;

class DuesTypeController extends Controller
{
    protected $duesTypeService;

    public function __construct(DuesTypeService $duesTypeService)
    {
        $this->duesTypeService = $duesTypeService;
    }

    public function index()
    {
        $duestype = $this->duesTypeService->getAllDuesTypes();
        return response()->json(['data' => $duestype], 200);
    }

    public function show(DuesType $duestype)
    {
        return response()->json(['data' => $duestype], 200);
    }

    public function store(CreateDuesTypePostRequest $request)
    {
        $data = $request->validated();

        $duestype = $this->duesTypeService->createDuesType($data);

        return response()->json(['data' => $duestype], 201);
    }

    public function update(CreateDuesTypePostRequest $request, DuesType $duestype)
    {
        $data = $request->validated();

        $duestype = $this->duesTypeService->updateDuesType($duestype, $data);

        return response()->json(['data' => $duestype], 200);
    }

    public function destroy(DuesType $duestype)
    {
        $this->duesTypeService->deleteDuesType($duestype);
        return response()->json(['message' => 'DuesType deleted successfully'], 200);
    }
}
