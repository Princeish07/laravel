<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project_budget extends Model
{
    use HasFactory;
    public $table="project_budgets";


    public function project()
    {
        return $this->belongsTo(project::class);
    }



}
