@extends('master')

@section('title', 'Daftar Absensi')
@section('page-title', 'Daftar Absensi')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Absensi</h5>
        <a href="{{ route('attendance.create') }}" class="btn btn-primary">
            <i class="bi bi-plus"></i> Tambah Absensi
        </a>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Nama Karyawan</th>
                    <th>Tanggal</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Keluar</th>
                    <th>Status Absensi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendance as $att)
                <tr>
                    <td>{{ $att->employees->nama_lengkap ?? '-' }}</td>
                    <td>{{ $att->tanggal }}</td>
                    <td>{{ $att->waktu_masuk }}</td>
                    <td>{{ $att->waktu_keluar }}</td>
                    <td>
                        @if($att->status_absensi == 'Hadir')
                            <span class="badge bg-success">{{ $att->status_absensi }}</span>
                        @else
                            <span class="badge bg-danger">{{ $att->status_absensi }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('attendance.show', $att->id) }}" class="btn btn-sm btn-info">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('attendance.edit', $att->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('attendance.destroy', $att->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
