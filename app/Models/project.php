<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    public $table="projects";
    protected $primaryKey='project_id';
    protected $fillable=['project_file'];
}
