<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function stages()
    {
        return $this->belongsToMany(Stage::class, 'institution_stage');
    }
}
