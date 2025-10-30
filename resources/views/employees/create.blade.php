@extends('master')

@section('title', 'Tambah Pegawai')

@section('content')
<div class="container mt-0">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white mb-5">
            <h5 class="mb-0">Form Input Pegawai</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('employees.store') }}" method="POST">
                @csrf

                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap:</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="nomor_telepon" class="form-label">Nomor Telepon:</label>
                            <input type="text" id="nomor_telepon" name="nomor_telepon" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat:</label>
                            <textarea id="alamat" name="alamat" class="form-control" rows="3"></textarea>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal_masuk" class="form-label">Tanggal Masuk:</label>
                            <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="departemen_id" class="form-label">Departemen:</label>
                            <select id="departemen_id" name="departemen_id" class="form-select" required>
                                <option value="">-- Pilih Departemen --</option>
                                @foreach($departments as $dept)
                                    <option value="{{ $dept->id }}">{{ $dept->nama_departemen }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="jabatan_id" class="form-label">Jabatan:</label>
                            <select id="jabatan_id" name="jabatan_id" class="form-select" required>
                                <option value="">-- Pilih Jabatan --</option>
                                @foreach($positions as $pos)
                                    <option value="{{ $pos->id }}">{{ $pos->nama_jabatan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label">Status:</label>
                            <select id="status" name="status" class="form-select">
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Nonaktif</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4">Simpan</button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary px-4">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
