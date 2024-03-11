<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OccupantHouse extends Model
{
    use HasFactory;

    protected $fillable = ['occupant_id', 'house_id', 'start_date', 'end_date'];

    public function occupant()
    {
        return $this->belongsTo(Occupant::class);
    }

    public function house()
    {
        return $this->belongsTo(House::class);
    }
}
