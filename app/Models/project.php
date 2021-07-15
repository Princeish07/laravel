<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function project_budgets()
    {
        return $this->hasOne(ProjectBudget::class);
        // note: we can also include comment model like: 'App\Models\Comment'
    }
}
