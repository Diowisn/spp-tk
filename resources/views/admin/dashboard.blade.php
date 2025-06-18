@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Dashboard Admin</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Siswa</h5>
                    <p class="card-text">{{ \App\Models\Student::count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Pembayaran Bulan Ini</h5>
                    <p class="card-text">{{ \App\Models\Payment::whereMonth('payment_date', now()->month)->count() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection