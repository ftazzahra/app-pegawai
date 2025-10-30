@extends('master')

@section('title', 'Detail Departemen')
@section('page-title', 'Detail Data Departemen')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-header py-3" style="background-color: #696cff;">
                    <h5 class="mb-0 text-white fw-bold">Detail Departemen</h5>
                </div>

                <div class="card-body mt-5">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr>
                                    <th class="bg-light" style="width: 30%">Nama Departemen</th>
                                    <td>{{ $departments->nama_departemen }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="text-end mt-4">
                        <a href="{{ route('departments.index') }}" class="btn btn-secondary px-4">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
