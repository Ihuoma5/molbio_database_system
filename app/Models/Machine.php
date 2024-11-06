<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    protected $fillable = [
        'machine_id',
        'machine_type',
        'installation_date',
        'location',
        'status',
        'maintenance_schedule',
    ];
}
