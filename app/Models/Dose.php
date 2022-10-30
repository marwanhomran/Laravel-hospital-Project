<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dose extends Model
{
    use HasFactory;

    protected $fillable = ['dose','unit','dose_time','medicine_id','patient_id'];


    public function patient()
    {
        //hasOne hasMany belongTo belongsToMany
        return $this->belongsTo(Patient::class);
    }


    public function medicine()
    {
        //hasOne hasMany belongTo belongsToMany
        return $this->belongsTo(Medicine::class);
    }
}
