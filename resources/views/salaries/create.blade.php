@extends('master')

@section('title', 'Tambah Gaji')

@section('content')
<div class="container mt-0">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white mb-5">
            <h5 class="mb-0">Form Input Gaji</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('salaries.store') }}" method="POST">
                @csrf

                <div class="row g-3">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Karyawan:</label>
                            <select name="karyawan_id" 
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
                            <label class="form-label">Bulan:</label>
                            <input type="month" 
                                   name="bulan" 
                                   class="form-control @error('bulan') is-invalid @enderror" 
                                   value="{{ old('bulan') }}" 
                                   required>
                            @error('bulan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gaji Pokok:</label>
                            <input type="number" 
                                   name="gaji_pokok" 
                                   id="gaji_pokok"
                                   class="form-control @error('gaji_pokok') is-invalid @enderror" 
                                   value="{{ old('gaji_pokok') }}" 
                                   required>
                            @error('gaji_pokok')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Tunjangan:</label>
                            <input type="number" 
                                   name="tunjangan" 
                                   id="tunjangan"
                                   class="form-control @error('tunjangan') is-invalid @enderror" 
                                   value="{{ old('tunjangan') }}" 
                                   required>
                            @error('tunjangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Potongan:</label>
                            <input type="number" 
                                   name="potongan" 
                                   id="potongan"
                                   class="form-control @error('potongan') is-invalid @enderror" 
                                   value="{{ old('potongan') }}" 
                                   required>
                            @error('potongan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Total Gaji:</label>
                            <input type="number" 
                                   name="total_gaji" 
                                   id="total_gaji"
                                   class="form-control @error('total_gaji') is-invalid @enderror" 
                                   value="{{ old('total_gaji') }}" 
                                   readonly>
                            @error('total_gaji')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-success px-4">Simpan</button>
                    <a href="{{ route('salaries.index') }}" class="btn btn-secondary px-4">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- 🔹 Script perhitungan otomatis total gaji --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const gajiPokok = document.getElementById('gaji_pokok');
    const tunjangan = document.getElementById('tunjangan');
    const potongan = document.getElementById('potongan');
    const totalGaji = document.getElementById('total_gaji');

    function hitungTotal() {
        const pokok = parseFloat(gajiPokok.value) || 0;
        const tunj = parseFloat(tunjangan.value) || 0;
        const pot = parseFloat(potongan.value) || 0;
        totalGaji.value = pokok + tunj - pot;
    }

    gajiPokok.addEventListener('input', hitungTotal);
    tunjangan.addEventListener('input', hitungTotal);
    potongan.addEventListener('input', hitungTotal);
});
</script>
@endsection
