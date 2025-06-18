@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Riwayat Pembayaran SPP</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Siswa</th>
                <th>Jumlah</th>
                <th>Tanggal Bayar</th>
                <th>Status</th>
                <th>Kwitansi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->sppFee->month }} {{ $payment->sppFee->year }}</td>
                <td>{{ $payment->student->name }}</td>
                <td>Rp {{ number_format($payment->amount) }}</td>
                <td>{{ $payment->payment_date->format('d/m/Y') }}</td>
                <td>
                    <span class="badge bg-{{ $payment->status == 'paid' ? 'success' : 'danger' }}">
                        {{ $payment->status }}
                    </span>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-info">Cetak</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection