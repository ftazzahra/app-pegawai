@extends('master')

@section('title', 'Detail Jabatan')
@section('page-title', 'Detail Data Jabatan')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-header py-3" style="background-color: #696cff;">
                    <h5 class="mb-0 text-white fw-bold">Detail Jabatan</h5>
                </div>

                <div class="card-body mt-4">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr>
                                    <th class="bg-light" style="width: 30%">Nama Jabatan</th>
                                    <td>{{ $positions->nama_jabatan }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Gaji Pokok</th>
                                    <td>Rp {{ number_format($positions->gaji_pokok, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="text-end mt-4">
                        <a href="{{ route('positions.index') }}" class="btn btn-secondary px-4">Kembali</a>
                        <a href="{{ route('positions.edit', $positions->id) }}" class="btn btn-primary px-4">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
