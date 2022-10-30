<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function patient()
    {
        //hasOne hasMany belongTo belongsToMany
        return $this->belongsTo(Patient::class);
    }

    public function bill()
    {
        //hasOne hasMany belongTo belongsToMany
        return $this->hasMany(Bill::class);
    }


    public function employee()
    {
        //hasOne hasMany belongTo belongsToMany
        return $this->belongsTo(Employee::class);
    }


}
