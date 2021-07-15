<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    public $table="projects";
    
    public function project_budgets()
    {
        return $this->hasOne(project_budget::class);
        // note: we can also include comment model like: 'App\Models\Comment'
    }
}
