@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Catat Pembayaran SPP</h2>
    <form action="{{ route('admin.payments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="student_id">Siswa</label>
            <select name="student_id" id="student_id" class="form-control" required>
                @foreach($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }} ({{ $student->class->name }})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="spp_fee_id">SPP Bulan</label>
            <select name="spp_fee_id" id="spp_fee_id" class="form-control" required>
                @foreach($sppFees as $fee)
                <option value="{{ $fee->id }}">{{ $fee->month }} {{ $fee->year }} - Rp {{ number_format($fee->amount) }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Jumlah Dibayar</label>
            <input type="number" name="amount" id="amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="payment_date">Tanggal Pembayaran</label>
            <input type="date" name="payment_date" id="payment_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="payment_method">Metode Pembayaran</label>
            <select name="payment_method" id="payment_method" class="form-control" required>
                <option value="tunai">Tunai</option>
                <option value="transfer">Transfer</option>
            </select>
        </div>
        <div class="form-group">
            <label for="receipt_number">Nomor Kwitansi</label>
            <input type="text" name="receipt_number" id="receipt_number" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection