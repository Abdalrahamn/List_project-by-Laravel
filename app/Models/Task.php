<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'body', 'project_id', 'done'
    ];
    use HasFactory;

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
