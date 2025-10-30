<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentsController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->paginate(5);
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'nama_departemen' => 'required|string|max:255',
        ]);

        Department::create($request->all());
        return redirect()->route('departments.index');
    }

    public function show(string $id)
    {
        $departments = Department::find($id);    
        return view('departments.show', compact('departments'));
    }

    public function edit(string $id)
    {
        $departments = Department::find($id);
        return view('departments.edit',compact('departments'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:255',         
        ]);

        $departments = Department::findOrFail($id);

        $departments->update($request->only([
            'nama_departemen',
        ]));

        return redirect()->route('departments.index');
    }


    public function destroy(string $id)
    {
        $departments = Department::find($id);

        $departments->delete();
        return redirect()->route('departments.index');
    }
}
