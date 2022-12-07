<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function department()
    {
        //hasOne hasMany belongTo belongsToMany
        return $this->belongsTo(Department::class);
    }

    public function visit()
    {
        //hasOne hasMany belongTo belongsToMany
        return $this->hasMany(Visit::class);
    }

}
