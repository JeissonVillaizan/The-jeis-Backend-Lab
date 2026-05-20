<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'month_key',
        'visits',
    ];
}
