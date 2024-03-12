<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['occupant_id', 'house_id', 'dues_type_id', 'billing_start_date', 'billing_end_date', 'payment_date', 'payment_amount', 'payment_proof_url', 'is_paid'];

    public function occupant()
    {
        return $this->belongsTo(Occupant::class);
    }

    public function house()
    {
        return $this->belongsTo(House::class);
    }

    public function duesType()
    {
        return $this->belongsTo(DuesType::class);
    }
}
