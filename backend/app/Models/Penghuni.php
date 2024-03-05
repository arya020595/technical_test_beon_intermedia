<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'image_ktp_url', 'status_penghuni', 'nomor_telepon', 'status_menikah'];
}
