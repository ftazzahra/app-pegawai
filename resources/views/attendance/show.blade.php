@extends('master')

@section('title', 'Detail Absensi')
@section('page-title', 'Detail Data Absensi')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-header py-3" style="background-color: #696cff;">
                    <h5 class="mb-0 text-white fw-bold">Detail Absensi</h5>
                </div>

                <div class="card-body mt-4">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr>
                                    <th class="bg-light" style="width: 30%">Nama Karyawan</th>
                                    <td>{{ $attendance->employees->nama_lengkap ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Tanggal</th>
                                    <td>{{ \Carbon\Carbon::parse($attendance->tanggal)->translatedFormat('d F Y') }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Waktu Masuk</th>
                                    <td>{{ $attendance->waktu_masuk ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Waktu Keluar</th>
                                    <td>{{ $attendance->waktu_keluar ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Status Absensi</th>
                                    <td>
                                        @if($attendance->status_absensi == 'Hadir')
                                            <span class="badge bg-success">Hadir</span>
                                        @elseif($attendance->status_absensi == 'Izin')
                                            <span class="badge bg-warning text-dark">Izin</span>
                                        @elseif($attendance->status_absensi == 'Sakit')
                                            <span class="badge bg-info text-dark">Sakit</span>
                                        @else
                                            <span class="badge bg-danger">Alfa</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="text-end mt-4">
                        <a href="{{ route('attendance.index') }}" class="btn btn-secondary px-4">Kembali</a>
                        <a href="{{ route('attendance.edit', $attendance->id) }}" class="btn btn-primary px-4">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
