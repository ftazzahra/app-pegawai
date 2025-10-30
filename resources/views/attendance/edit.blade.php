@extends('master')

@section('title', 'Edit Absensi')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm mx-auto">
        <div class="card-header text-white mb-5" style="background-color: #ff9800;">
            <h5 class="mb-0">Edit Data Absensi</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Karyawan:</label>
                            <select name="karyawan_id" 
                                    class="form-select @error('karyawan_id') is-invalid @enderror" 
                                    required>
                                <option value="">-- Pilih Karyawan --</option>
                                @foreach($employees as $emp)
                                    <option value="{{ $emp->id }}" 
                                        {{ old('karyawan_id', $attendance->karyawan_id) == $emp->id ? 'selected' : '' }}>
                                        {{ $emp->nama_lengkap }}
                                    </option>
                                @endforeach
                            </select>
                            @error('karyawan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal:</label>
                            <input type="date" 
                                   name="tanggal" 
                                   class="form-control @error('tanggal') is-invalid @enderror" 
                                   value="{{ old('tanggal', $attendance->tanggal) }}" 
                                   required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Waktu Masuk:</label>
                            <input type="time" 
                                   name="waktu_masuk" 
                                   class="form-control @error('waktu_masuk') is-invalid @enderror" 
                                   value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}" 
                                   required>
                            @error('waktu_masuk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Waktu Keluar:</label>
                            <input type="time" 
                                   name="waktu_keluar" 
                                   class="form-control @error('waktu_keluar') is-invalid @enderror" 
                                   value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}" 
                                   required>
                            @error('waktu_keluar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status Absensi:</label>
                            <select name="status_absensi" 
                                    class="form-select @error('status_absensi') is-invalid @enderror" 
                                    required>
                                <option value="">-- Pilih Status --</option>
                                <option value="hadir" {{ old('status_absensi', $attendance->status_absensi) == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                <option value="izin" {{ old('status_absensi', $attendance->status_absensi) == 'izin' ? 'selected' : '' }}>Izin</option>
                                <option value="sakit" {{ old('status_absensi', $attendance->status_absensi) == 'sakit' ? 'selected' : '' }}>Sakit</option>
                                <option value="alpha" {{ old('status_absensi', $attendance->status_absensi) == 'alpha' ? 'selected' : '' }}>Alpha</option>
                            </select>
                            @error('status_absensi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-warning text-white px-4">Update</button>
                    <a href="{{ route('attendance.index') }}" class="btn btn-secondary px-4">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
