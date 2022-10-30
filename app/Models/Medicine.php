<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dose()
    {
        //hasOne hasMany belongTo belongsToMany
        return $this->hasMany(Dose::class);
    }
}
