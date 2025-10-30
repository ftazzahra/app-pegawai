@extends('master')

@section('title', 'Detail Gaji')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm mx-auto">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Detail Data Gaji</h5>
        </div>

        <div class="card-body mt-5">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 200px;">Nama Karyawan</th>
                    <td>{{ $salaries->employee->nama_lengkap ?? 'Tidak Diketahui' }}</td>
                </tr>
                <tr>
                    <th>Bulan</th>
                    <td>{{ $salaries->bulan }}</td>
                </tr>
                <tr>
                    <th>Gaji Pokok</th>
                    <td>Rp {{ number_format($salaries->gaji_pokok, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Tunjangan</th>
                    <td>Rp {{ number_format($salaries->tunjangan, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Potongan</th>
                    <td>Rp {{ number_format($salaries->potongan, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Total Gaji</th>
                    <td><strong>Rp {{ number_format($salaries->total_gaji, 0, ',', '.') }}</strong></td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('salaries.index') }}" class="btn btn-secondary">← Kembali ke Daftar Gaji</a>
            </div>
        </div>
    </div>
</div>
@endsection
