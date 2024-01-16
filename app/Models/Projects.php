<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image'];

    public function exhibitions() {
        return $this->belongsTo(Exhibitions::class);
    }
}
