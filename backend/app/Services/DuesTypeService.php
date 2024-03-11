<?php

namespace App\Services;

use App\Models\DuesType;

class DuesTypeService
{
    public function getAllDuesTypes()
    {
        return DuesType::all();
    }

    public function createDuesType($data)
    {
        return DuesType::create($data);
    }

    public function updateDuesType(DuesType $duesType, $data)
    {
        $duesType->update($data);
        return $duesType;
    }

    public function deleteDuesType(DuesType $duesType)
    {
        $duesType->delete();
    }
}
