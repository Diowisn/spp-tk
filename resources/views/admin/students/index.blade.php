@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Siswa</h2>
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Orang Tua</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->class->name }}</td>
                <td>{{ $student->parent->user->name }}</td>
                <td>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection