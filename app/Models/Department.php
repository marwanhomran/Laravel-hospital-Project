<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['department_name', 'description'];


    public function employee()
    {
        //hasOne hasMany belongTo belongsToMany
        return $this->hasMany(Employee::class);
    }

    public function room()
    {
        //hasOne hasMany belongTo belongsToMany
        return $this->hasMany(Room::class);
    }
}
