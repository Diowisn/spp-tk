<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SppFee extends Model
{

    protected $fillable = ['
        class_id', 
        'amount', 
        'month', 
        'year'
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
