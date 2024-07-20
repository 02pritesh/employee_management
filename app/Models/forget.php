<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forget extends Model
{
    use HasFactory;
    protected $table = 'attandense';
    protected $primarykey = 'id';
    public $timestamps = false;

     protected $casts = [
        'email_verified_at' => 'datetime',
        // 'status'=> Usertype::present
    ];
 


    

  
}
