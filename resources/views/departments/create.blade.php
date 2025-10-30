@extends('master')

@section('title', 'Tambah Departemen')

@section('content')
<div class="container mt-0">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white mb-5">
            <h5 class="mb-0">Form Tambah Departemen</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('departments.store') }}" method="POST">
                @csrf

                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="nama_departemen" class="form-label">Nama Departemen:</label>
                            <input 
                                type="text" 
                                id="nama_departemen" 
                                name="nama_departemen" 
                                class="form-control @error('nama_departemen') is-invalid @enderror" 
                                value="{{ old('nama_departemen') }}" 
                                placeholder="Masukkan nama departemen" 
                                required
                            >
                            @error('nama_departemen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4">Simpan</button>
                    <a href="{{ route('departments.index') }}" class="btn btn-secondary px-4">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
