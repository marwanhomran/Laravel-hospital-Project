<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dose()
    {
        //hasOne hasMany belongTo belongsToMany
        return $this->hasMany(Dose::class);
    }


    public function visit()
    {
        //hasOne hasMany belongTo belongsToMany
        return $this->hasMany(Visit::class);
    }
}
