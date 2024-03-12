<?php

namespace App\Services;

use App\Models\House;
use App\Services\OccupantHouseService;

class HouseService
{
    private $occupantHouseService;

    public function __construct(OccupantHouseService $occupantHouseService)
    {
        $this->occupantHouseService = $occupantHouseService;
    }

    public function getAllHouses()
    {
        return House::with('occupant')->get();
    }

    public function createHouse($data)
    {
        // Set default values for start_date and end_date if not provided in the payload
        $startDate = $data['start_date'] ?? now();
        $endDate = $data['end_date'] ?? null;

        // Create the house record
        $house = House::create($data);

        // Create the corresponding record in OccupantHouse
        $this->occupantHouseService->createOccupantHouse([
            'house_id' => $house->id,
            'occupant_id' => $house->occupant_id,
            'start_date' => $startDate,
            'end_date' => $endDate,
        ]);

        return $house;
    }

    public function updateHouse(House $house, $data)
    {
        $house->update($data);

        // Check if the new data is different from the existing data
        if ($this->isDataDifferent($house, $data)) {
            // Update the house record
            $house->update($data);

            // Create the corresponding record in OccupantHouse
            $this->occupantHouseService->createOccupantHouse([
                'house_id' => $house->id,
                'occupant_id' => $house->occupant_id,
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
            ]);
        }

        return $house;
    }

    public function deleteHouse(House $house)
    {
        // Delete corresponding record in OccupantHouse
        $this->occupantHouseService->deleteOccupantHouse($house->occupantHouse);

        $house->delete();
    }

    private function isDataDifferent(House $house, $data)
    {
        // Check if any of the fields in $data is different from the existing data in $house
        return !(
            $house->start_date === $data['start_date'] &&
            $house->end_date === $data['end_date']
        );
    }
}
