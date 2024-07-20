<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectModule extends Model
{
    use HasFactory;
    protected $table = "module";
    protected $primarykey = "id";

    protected $fillable = [
        'module_description',
        'module',
        'module_installment	',

    ] ;
// ProjectModule.php (Model)
public function project() {
    return $this->belongsTo(ProjectDetail::class, 'project_id');
}

    // public function employees()
    // {
    //     return $this->belongsToMany(User::class, 'employee_project', 'project_id', 'employee_id');
    // }

    

}
