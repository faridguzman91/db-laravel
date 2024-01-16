<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibitions extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'name', 'image', 'project_url'];

    public function projects()
    {
        return $this->hasMany(Projects::class);
    }
}
