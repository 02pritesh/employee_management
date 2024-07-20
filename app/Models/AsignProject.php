<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignProject extends Model
{
    use HasFactory;
    protected $table = "asign_projects";
    protected $primarykey = "id";

    protected $fillable = [
        'project_id',
        'employee_id'
    ] ;

    // public function employees()
    // {
    //     return $this->belongsToMany(User::class, 'employee_project', 'project_id', 'employee_id');
    // }

    

}
