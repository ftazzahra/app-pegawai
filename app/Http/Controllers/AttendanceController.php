<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;

class AttendanceController extends Controller
{
    /**
     * Tampilkan daftar absensi.
     */
    public function index()
    {
        $attendance = Attendance::with('employees')->latest()->paginate(5);
        $employees = Employee::all();
        return view('attendance.index', compact('attendance', 'employees'));
    }

    /**
     * Form untuk tambah absensi.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('attendance.create', compact('employees'));
    }

    /**
     * Simpan data absensi baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id'    => 'required|exists:employees,id',
            'tanggal'        => 'required|date',
            'waktu_masuk'    => 'required|date_format:H:i',
            'waktu_keluar'   => 'required|date_format:H:i|after:waktu_masuk',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ]);

        Attendance::create($request->all());

        return redirect()
            ->route('attendance.index')
            ->with('success', 'Data absensi berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail absensi tertentu.
     */
    public function show($id)
    {
        $attendance = Attendance::with('employees')->findOrFail($id);
        return view('attendance.show', compact('attendance'));
    }

    /**
     * Form edit data absensi.
     */
    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees = Employee::all();
        return view('attendance.edit', compact('attendance', 'employees'));
    }

    /**
     * Update data absensi.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'karyawan_id'    => 'required|exists:employees,id',
        'tanggal'        => 'required|date',
        'waktu_masuk'    => 'required|date_format:H:i',
        'waktu_keluar'   => 'required|date_format:H:i|after:waktu_masuk',
        'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
    ]);

    $attendance = Attendance::findOrFail($id);

    $attendance->karyawan_id    = $request->karyawan_id;
    $attendance->tanggal        = $request->tanggal;
    $attendance->waktu_masuk    = $request->waktu_masuk;
    $attendance->waktu_keluar   = $request->waktu_keluar;
    $attendance->status_absensi = $request->status_absensi;

    $attendance->save();

    return redirect()
        ->route('attendance.index')
        ->with('success', 'Data absensi berhasil diperbarui.');
    }

    /**
     * Hapus data absensi.
     */
    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()
            ->route('attendance.index')
            ->with('success', 'Data absensi berhasil dihapus.');
    }
}
