@extends('master')

@section('title', 'Detail Pegawai')
@section('page-title', 'Detail Data Pegawai')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-header py-3" style="background-color: #696cff;">
                    <h5 class="mb-0 text-white fw-bold">Detail Pegawai</h5>
                </div>

                <div class="card-body mt-5">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr>
                                    <th class="bg-light" style="width: 30%">Nama Lengkap</th>
                                    <td>{{ $employee->nama_lengkap }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Email</th>
                                    <td>{{ $employee->email }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Nomor Telepon</th>
                                    <td>{{ $employee->nomor_telepon }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Tanggal Lahir</th>
                                    <td>{{ $employee->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Alamat</th>
                                    <td>{{ $employee->alamat }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Tanggal Masuk</th>
                                    <td>{{ $employee->tanggal_masuk }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Departemen</th>
                                    <td>{{ $employee->departments->nama_departemen ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Jabatan</th>
                                    <td>{{ $employee->positions->nama_jabatan ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Status</th>
                                    <td>
                                        @if($employee->status == 'aktif')
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="text-end mt-4">
                        <a href="{{ route('employees.index') }}" class="btn btn-secondary px-4">Kembali</a>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary px-4">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
