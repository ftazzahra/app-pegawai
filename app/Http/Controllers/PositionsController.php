<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Positions;

class PositionsController extends Controller
{
    public function index()
    {
        $positions = Positions::latest()->paginate(5);
        return view('positions.index', compact('positions'));
    }

    public function create()
    {
        return view('positions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'nama_jabatan' => 'required|string|max:255',
        'gaji_pokok' => 'required|numeric|min:0',
        ]);

        Positions::create($request->all());
        return redirect()->route('positions.index');
    }

    public function show(string $id)
    {
        $positions = Positions::find($id);    
        return view('positions.show', compact('positions'));
    }

    public function edit(string $id)
    {
        $positions = Positions::find($id);
        return view('positions.edit',compact('positions'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
        'nama_jabatan' => 'required|string|max:255',
        'gaji_pokok' => 'required|numeric|min:0',
        ]);

        $positions = Positions::findOrFail($id);

        $positions->update($request->only([
            'nama_jabatan', 'gaji_pokok',
        ]));

        return redirect()->route('positions.index');
    }


    public function destroy(string $id)
    {
        $positions = Positions::find($id);

        $positions->delete();
        return redirect()->route('positions.index');
    }
}
