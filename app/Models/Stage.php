<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function institutions()
    {
        return $this->belongsToMany(Institution::class, 'institution_stage');
    }
}
