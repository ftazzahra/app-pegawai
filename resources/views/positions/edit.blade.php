@extends('master')

@section('title', 'Edit Jabatan')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm mx-auto">
        <div class="card-header text-white mb-5" style="background-color: #ff9800;">
            <h5 class="mb-0">Edit Data Jabatan</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('positions.update', $positions->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <label class="form-label">Nama Jabatan:</label>
                        <input type="text" 
                               name="nama_jabatan" 
                               value="{{ old('nama_jabatan', $positions->nama_jabatan) }}" 
                               class="form-control @error('nama_jabatan') is-invalid @enderror" 
                               required>
                        @error('nama_jabatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Gaji Pokok:</label>
                        <input type="number" 
                               name="gaji_pokok" 
                               value="{{ old('gaji_pokok', $positions->gaji_pokok) }}" 
                               class="form-control @error('gaji_pokok') is-invalid @enderror" 
                               required>
                        @error('gaji_pokok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Kolom kanan bisa kosong untuk konsistensi layout -->
                    <div class="col-md-6">
                        <!-- Tambahan field opsional -->
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-warning text-white px-4">Update</button>
                    <a href="{{ route('positions.index') }}" class="btn btn-secondary px-4">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
