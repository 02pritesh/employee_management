<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    use HasFactory;
    protected $table = "project_details";
    protected $primarykey = "id";
    // Project.php (Model)
public function modules() {
    return $this->hasMany(ProjectModule::class, 'project_id');
}

}
