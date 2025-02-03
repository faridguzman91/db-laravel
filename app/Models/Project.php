<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'year', 'image', 'category', 'materials', 'project_url'];

    protected $casts = [
        'image' => 'string',
        'materials' => 'array'
    ];

    public function exhibitions()
    {
        return $this->hasMany(Exhibition::class);
    }
}
