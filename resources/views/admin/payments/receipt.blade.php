<!DOCTYPE html>
<html>
<head>
    <title>Kwitansi Pembayaran SPP</title>
</head>
<body>
    <h2 style="text-align: center">KWITANSI PEMBAYARAN SPP</h2>
    <hr>
    <p>No. Kwitansi: <strong>{{ $payment->receipt_number }}</strong></p>
    <p>Tanggal: {{ $payment->payment_date->format('d/m/Y') }}</p>
    <p>Telah diterima dari: <strong>{{ $payment->student->parent->user->name }}</strong></p>
    <p>Untuk pembayaran SPP: <strong>{{ $payment->sppFee->month }} {{ $payment->sppFee->year }}</strong></p>
    <p>Nama Siswa: <strong>{{ $payment->student->name }}</strong></p>
    <p>Kelas: <strong>{{ $payment->student->class->name }}</strong></p>
    <p>Jumlah: <strong>Rp {{ number_format($payment->amount) }}</strong></p>
    <br><br>
    <p style="float: right">Admin,</p>
</body>
</html>