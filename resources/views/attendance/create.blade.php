@extends('master')

@section('title', 'Tambah Absensi')

@section('content')
<div class="container mt-0">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white mb-5">
            <h5 class="mb-0">Form Input Absensi</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('attendance.store') }}" method="POST">
                @csrf

                <div class="row g-3">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="karyawan_id" class="form-label">Nama Karyawan:</label>
                            <select id="karyawan_id" 
                                    name="karyawan_id" 
                                    class="form-select @error('karyawan_id') is-invalid @enderror" 
                                    required>
                                <option value="">-- Pilih Nama Karyawan --</option>
                                @foreach($employees as $emp)
                                    <option value="{{ $emp->id }}" {{ old('karyawan_id') == $emp->id ? 'selected' : '' }}>
                                        {{ $emp->nama_lengkap }}
                                    </option>
                                @endforeach
                            </select>
                            @error('karyawan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal:</label>
                            <input type="date" 
                                   id="tanggal" 
                                   name="tanggal" 
                                   class="form-control @error('tanggal') is-invalid @enderror" 
                                   value="{{ old('tanggal') }}" 
                                   required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="waktu_masuk" class="form-label">Waktu Masuk:</label>
                            <input type="time" 
                                   id="waktu_masuk" 
                                   name="waktu_masuk" 
                                   class="form-control @error('waktu_masuk') is-invalid @enderror" 
                                   value="{{ old('waktu_masuk') }}" 
                                   required>
                            @error('waktu_masuk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="waktu_keluar" class="form-label">Waktu Keluar:</label>
                            <input type="time" 
                                   id="waktu_keluar" 
                                   name="waktu_keluar" 
                                   class="form-control @error('waktu_keluar') is-invalid @enderror" 
                                   value="{{ old('waktu_keluar') }}" 
                                   required>
                            @error('waktu_keluar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status_absensi" class="form-label">Status Absensi:</label>
                            <select id="status_absensi" 
                                    name="status_absensi" 
                                    class="form-select @error('status_absensi') is-invalid @enderror" 
                                    required>
                                <option value="">-- Pilih Status --</option>
                                <option value="hadir" {{ old('status_absensi') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                <option value="izin" {{ old('status_absensi') == 'izin' ? 'selected' : '' }}>Izin</option>
                                <option value="sakit" {{ old('status_absensi') == 'sakit' ? 'selected' : '' }}>Sakit</option>
                                <option value="alpha" {{ old('status_absensi') == 'alpha' ? 'selected' : '' }}>Alpha</option>
                            </select>
                            @error('status_absensi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-success px-4">Simpan</button>
                    <a href="{{ route('attendance.index') }}" class="btn btn-secondary px-4">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
