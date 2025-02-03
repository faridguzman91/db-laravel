<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'year', 'image', 'project_url'];

    protected $casts = [
        'image' => 'string'
    ];

    public function exhibitions()
    {
        return $this->hasMany(Exhibition::class);
    }
}
