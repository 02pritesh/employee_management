<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demo extends Model
{
    use HasFactory, SoftDeletes ;
    protected $table = 'notification';
    protected $primarykey = 'id';

}
