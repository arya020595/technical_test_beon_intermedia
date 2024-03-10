<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DuesType extends Model
{
    use HasFactory;

    protected $fillable = ['dues_description', 'dues_amount'];
}
