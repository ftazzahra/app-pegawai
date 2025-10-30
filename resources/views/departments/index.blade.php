@extends('master')

@section('title', 'Daftar Departemen')
@section('page-title', 'Daftar Departemen')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Data Departemen</h5>
    <a href="{{ route('departments.create') }}" class="btn btn-primary">
      <i class="bi bi-plus"></i> Tambah Departemen
    </a>
  </div>

  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead class="table-light">
        <tr>
          <th>Nama Departemen</th>
          <th class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($departments as $department)
        <tr>
          <td>{{ $department->nama_departemen }}</td>
          <td class="text-center">
            <a href="{{ route('departments.show', $department->id) }}" class="btn btn-sm btn-info">
              <i class="bi bi-eye"></i>
            </a>
            <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-sm btn-warning">
              <i class="bi bi-pencil"></i>
            </a>
            <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="d-inline">
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
