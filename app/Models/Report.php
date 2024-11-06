<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'machine_id',
        'repair_date',
        'issue_reported',
        'issues_fixed',
        'parts_replaced',
        'resolution_status',
        'engineer_id'
    ];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    public function engineer()
    {
        return $this->belongsTo(Engineer::class);
    }
}

