<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['first_name','last_name','salary','hire_date','specialization','description','department_id'];

    public function visit()
    {
        //hasOne hasMany belongTo belongsToMany
        return $this->hasMany(Visit::class);
    }
}
