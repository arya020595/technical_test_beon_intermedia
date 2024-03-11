<?php

namespace App\Services;

use App\Models\OccupantHouse;

class OccupantHouseService
{
    public function getAllOccupantHouses()
    {
        return OccupantHouse::all();
    }

    public function createOccupantHouse($data)
    {
        return OccupantHouse::create($data);
    }

    public function updateOccupantHouse(OccupantHouse $occupantHouse, $data)
    {
        $occupantHouse->update($data);
        return $occupantHouse;
    }

    public function deleteOccupantHouse(OccupantHouse $occupantHouse)
    {
        $occupantHouse->delete();
    }
}
