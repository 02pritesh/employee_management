<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestSalary extends Model
{
    use HasFactory;
    protected $table = 'test_month_salary';
    protected $fillable = [
        'month_salary',
        'user_id',
        'monthly_incentive',

    ];
    public $timestamps = false;

}
