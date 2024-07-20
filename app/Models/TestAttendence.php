<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestAttendence extends Model
{
    use HasFactory;

    protected $table = 'test_month_attendence';
    protected $fillable = [
        'date',
        'attendence_status',
        'incentive',
        'percentage'
    ];
    public $timestamps = false;
}
