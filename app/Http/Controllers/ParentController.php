<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    
    public function payments()
    {
        $students = auth()->user()->parent->students;
        $payments = Payment::whereIn('student_id', $students->pluck('id'))
                         ->with(['student', 'sppFee'])
                         ->orderBy('payment_date', 'desc')
                         ->get();
        
        return view('parent.payments', compact('payments', 'students'));
    }
}