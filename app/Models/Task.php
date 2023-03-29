<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

     public function project()
    {
        return $this->belongsTo(Project::class);
    }

      protected $fillable = [
        'name', 
        'image',   
        'status_id',
        'project_id',     
    ];

}
