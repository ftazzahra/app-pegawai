@extends('master')

@section('title', 'Edit Departemen')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm mx-auto" style="max-width: 1000px;">
        <div class="card-header text-white mb-5" style="background-color: #ff9800;">
            <h5 class="mb-0">Edit Data Departemen</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('departments.update', $departments->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Nama Departemen:</label>
                        <input type="text" name="nama_departemen" 
                               value="{{ old('nama_departemen', $departments->nama_departemen) }}" 
                               class="form-control @error('nama_departemen') is-invalid @enderror" 
                               required>
                        @error('nama_departemen')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-warning text-white px-4">Update</button>
                    <a href="{{ route('departments.index') }}" class="btn btn-secondary px-4">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
