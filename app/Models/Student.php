<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = [
        'name', 
        'class_id', 
        'parent_id', 
        'birth_date', 
        'address'
    ];

    public function parent()
    {
        return $this->belongsTo(Parent::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
