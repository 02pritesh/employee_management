<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPaymentModule extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "project_payment_modules";
}
