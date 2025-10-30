@extends('master')

@section('title', 'Daftar Pegawai')
@section('page-title', 'Daftar Pegawai')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Data Pegawai</h5>
    <a href="{{ route('employees.create') }}" class="btn btn-primary">
      <i class="bi bi-plus"></i> Tambah Pegawai
    </a>
  </div>

  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead class="table-light">
        <tr>
          <th>Nama</th>
          <th>Email</th>
          <th>Telepon</th>
          <th>Departemen</th>
          <th>Jabatan</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($employees as $employee)
        <tr>
          <td>{{ $employee->nama_lengkap }}</td>
          <td>{{ $employee->email }}</td>
          <td>{{ $employee->nomor_telepon }}</td>
          <td>{{ $employee->departments->nama_departemen }}</td>
          <td>{{ $employee->positions->nama_jabatan }}</td>
          <td><span class="badge bg-success">{{ $employee->status }}</span></td>
          <td>
            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-info">
              <i class="bi bi-eye"></i>
            </a>
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">
              <i class="bi bi-pencil"></i>
            </a>
            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">
                <i class="bi bi-trash"></i>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
