<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'year', 'images', 'project_url'];

    protected $casts = [
        'images' => 'array'
    ];

    public function exhibitions()
    {
        return $this->hasMany(Exhibition::class);
    }
}
