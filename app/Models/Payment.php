<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $fillable = [
        'student_id', 
        'spp_fee_id', 
        'amount', 
        'payment_date',
        'payment_method', 
        'receipt_number', 
        'status', 
        'admin_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function sppFee()
    {
        return $this->belongsTo(SppFee::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

}
