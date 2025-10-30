@extends('master')

@section('title', 'Daftar Gaji')
@section('page-title', 'Daftar Gaji')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Gaji</h5>
        <a href="{{ route('salaries.create') }}" class="btn btn-primary">
            <i class="bi bi-plus"></i> Tambah Gaji
        </a>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Nama Karyawan</th>
                    <th>Gaji Pokok</th>
                    <th>Tunjangan</th>
                    <th>Potongan</th>
                    <th>Total Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salaries as $salary)
                <tr>
                    <td>{{ $salary->employee->nama_lengkap ?? '-' }}</td>
                    <td>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('salaries.show', $salary->id) }}" class="btn btn-sm btn-info">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" class="d-inline">
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
