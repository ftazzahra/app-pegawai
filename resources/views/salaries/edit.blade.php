@extends('master')

@section('title', 'Edit Gaji')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm mx-auto">
        <div class="card-header text-white mb-5" style="background-color: #007bff;">
            <h5 class="mb-0">Edit Data Gaji</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('salaries.update', $salaries->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <label class="form-label">Nama Karyawan:</label>
                        <select name="karyawan_id" id="karyawan_id" class="form-select" required>
                            <option value="">-- Pilih Nama Karyawan --</option>
                            @foreach($employees as $emp)
                                <option value="{{ $emp->id }}" {{ $emp->id == $salaries->karyawan_id ? 'selected' : '' }}>
                                    {{ $emp->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>

                        <label class="form-label mt-3">Bulan:</label>
                        <input type="month" id="bulan" name="bulan" 
                               class="form-control" 
                               value="{{ old('bulan', $salaries->bulan) }}" required>

                        <label class="form-label mt-3">Gaji Pokok:</label>
                        <input type="number" id="gaji_pokok" name="gaji_pokok" 
                               class="form-control" 
                               value="{{ old('gaji_pokok', $salaries->gaji_pokok) }}" min="0" required>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <label class="form-label">Tunjangan:</label>
                        <input type="number" id="tunjangan" name="tunjangan" 
                               class="form-control" 
                               value="{{ old('tunjangan', $salaries->tunjangan) }}" min="0" required>

                        <label class="form-label mt-3">Potongan:</label>
                        <input type="number" id="potongan" name="potongan" 
                               class="form-control" 
                               value="{{ old('potongan', $salaries->potongan) }}" min="0" required>

                        <label class="form-label mt-3">Total Gaji:</label>
                        <input type="number" id="total_gaji" name="total_gaji" 
                               class="form-control" 
                               value="{{ old('total_gaji', $salaries->total_gaji) }}" min="0" readonly>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary px-4">Update</button>
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

    // Hitung ulang setiap kali input berubah
    gajiPokok.addEventListener('input', hitungTotal);
    tunjangan.addEventListener('input', hitungTotal);
    potongan.addEventListener('input', hitungTotal);

    // Hitung saat halaman pertama kali dimuat
    hitungTotal();
});
</script>
@endsection
