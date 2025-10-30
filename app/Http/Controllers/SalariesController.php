<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salaries;
use App\Models\Employee;

class SalariesController extends Controller
{
    public function index()
    {
        $salaries = Salaries::with('employee')->latest()->paginate(5);
        $employees = Employee::all();
        return view('salaries.index', compact('salaries', 'employees'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan'       => 'required|string|max:20',
            'gaji_pokok'  => 'required|numeric|min:0',
            'tunjangan'   => 'nullable|numeric|min:0',
            'potongan'    => 'nullable|numeric|min:0',
        ]);

        $gajiPokok = $request->gaji_pokok ?? 0;
        $tunjangan = $request->tunjangan ?? 0;
        $potongan  = $request->potongan ?? 0;
        $totalGaji = $gajiPokok + $tunjangan - $potongan;

        Salaries::create([
            'karyawan_id' => $request->karyawan_id,
            'bulan'       => $request->bulan,
            'gaji_pokok'  => $gajiPokok,
            'tunjangan'   => $tunjangan,
            'potongan'    => $potongan,
            'total_gaji'  => $totalGaji,
        ]);

        return redirect()
            ->route('salaries.index')
            ->with('success', 'Data gaji berhasil disimpan.');
    }



    public function show(string $id)
    {
        $salaries = Salaries::find($id);    
        return view('salaries.show', compact('salaries'));
    }

    public function edit(string $id)
    {
        $salaries = Salaries::find($id);
        $employees = Employee::all();
        return view('salaries.edit',compact('salaries', 'employees'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
        'karyawan_id'    => 'required|exists:employees,id',
        'bulan' => 'required|string|max:20',
        'gaji_pokok' => 'required|numeric|min:0',
        'tunjangan' => 'required|numeric|min:0',
        'potongan' => 'required|numeric|min:0',
        'total_gaji' => 'required|numeric|min:0',
        ]);

        $salaries = Salaries::findOrFail($id);
        $salaries->update($request->all());

        return redirect()->route('salaries.index');
    }


    public function destroy(string $id)
    {
        $salaries = salaries::find($id);

        $salaries->delete();
        return redirect()->route('salaries.index');
    }
}
