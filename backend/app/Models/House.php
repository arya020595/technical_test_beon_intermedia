<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'occupant_id', 'is_inhabited', 'is_rented'];

    public function occupant()
    {
        return $this->belongsTo(Occupant::class);
    }
}
