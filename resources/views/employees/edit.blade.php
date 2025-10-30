@extends('master')

@section('title', 'Edit Pegawai')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm mx-auto">
        <div class="card-header text-white mb-5" style="background-color: #ff9800;">
            <h5 class="mb-0">Edit Data Pegawai</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap:</label>
                        <input type="text" name="nama_lengkap" 
                               value="{{ old('nama_lengkap', $employee->nama_lengkap) }}" 
                               class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tanggal Masuk:</label>
                        <input type="date" name="tanggal_masuk" 
                               value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}" 
                               class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email:</label>
                        <input type="email" name="email" 
                               value="{{ old('email', $employee->email) }}" 
                               class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Departemen:</label>
                        <select name="departemen_id" class="form-select" required>
                            <option value="">-- Pilih Departemen --</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}" 
                                    {{ old('departemen_id', $employee->departemen_id) == $dept->id ? 'selected' : '' }}>
                                    {{ $dept->nama_departemen }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nomor Telepon:</label>
                        <input type="text" name="nomor_telepon" 
                               value="{{ old('nomor_telepon', $employee->nomor_telepon) }}" 
                               class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jabatan:</label>
                        <select name="jabatan_id" class="form-select" required>
                            <option value="">-- Pilih Jabatan --</option>
                            @foreach($positions as $pos)
                                <option value="{{ $pos->id }}" 
                                    {{ old('jabatan_id', $employee->jabatan_id) == $pos->id ? 'selected' : '' }}>
                                    {{ $pos->nama_jabatan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tanggal Lahir:</label>
                        <input type="date" name="tanggal_lahir" 
                               value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}" 
                               class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status:</label>
                        <select name="status" class="form-select">
                            <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>
                                Aktif
                            </option>
                            <option value="tidak aktif" {{ old('status', $employee->status) == 'tidak aktif' ? 'selected' : '' }}>
                                Tidak Aktif
                            </option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Alamat:</label>
                        <textarea name="alamat" rows="3" class="form-control">{{ old('alamat', $employee->alamat) }}</textarea>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-warning text-white px-4">Update</button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary px-4">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
