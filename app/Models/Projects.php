<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $fillable = ['exhibition_id', 'name', 'image', 'project_url'];

    public function exhibition() {
        return $this->belongsTo(Exhibitions::class);
    }
}
