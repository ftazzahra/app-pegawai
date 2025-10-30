@extends('master')

@section('title', 'Tambah Jabatan')

@section('content')
<div class="container mt-0">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white mb-5">
            <h5 class="mb-0">Form Input Jabatan</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('positions.store') }}" method="POST">
                @csrf

                <div class="row g-3">
                    <!-- Kolom Kiri -->
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="nama_jabatan" class="form-label">Nama Jabatan:</label>
                            <input type="text" 
                                   id="nama_jabatan" 
                                   name="nama_jabatan" 
                                   class="form-control @error('nama_jabatan') is-invalid @enderror" 
                                   value="{{ old('nama_jabatan') }}" 
                                   placeholder="Masukkan nama jabatan" 
                                   required>
                            @error('nama_jabatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gaji_pokok" class="form-label">Gaji Pokok:</label>
                            <input type="number" 
                                   id="gaji_pokok" 
                                   name="gaji_pokok" 
                                   class="form-control @error('gaji_pokok') is-invalid @enderror" 
                                   value="{{ old('gaji_pokok') }}" 
                                   placeholder="Masukkan gaji pokok" 
                                   required>
                            @error('gaji_pokok')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Kolom Kanan (Kosong agar layout konsisten) -->
                    <div class="col-md-6">
                        <!-- Bisa ditambahkan field tambahan jika diperlukan -->
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-success px-4">Simpan</button>
                    <a href="{{ route('positions.index') }}" class="btn btn-secondary px-4">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
