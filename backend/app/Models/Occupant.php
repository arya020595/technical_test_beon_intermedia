<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image_ktp_url', 'occupant_status', 'phone_number', 'is_married'];
}
