<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Student;
use App\Models\SppFee;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['student', 'sppFee'])->get();
        return view('admin.payments.index', compact('payments'));
    }

    public function create()
    {
        $students = Student::all();
        $sppFees = SppFee::all();
        return view('admin.payments.create', compact('students', 'sppFees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'spp_fee_id' => 'required|exists:spp_fees,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_method' => 'required|in:tunai,transfer',
            'receipt_number' => 'required|unique:payments',
        ]);

        Payment::create([
            'student_id' => $request->student_id,
            'spp_fee_id' => $request->spp_fee_id,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'payment_method' => $request->payment_method,
            'receipt_number' => $request->receipt_number,
            'status' => 'paid',
            'admin_id' => auth()->id(),
        ]);

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil dicatat!');
    }

    public function receipt($id)
    {
        $payment = Payment::with(['student', 'sppFee'])->findOrFail($id);
        $pdf = \PDF::loadView('admin.payments.receipt', compact('payment'));
        return $pdf->download('kwitansi-'.$payment->receipt_number.'.pdf');
    }
}