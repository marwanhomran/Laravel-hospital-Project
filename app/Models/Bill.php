<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = ['print_date', 'pay_date', 'amount','visit_id', 'status'];



    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }

}
