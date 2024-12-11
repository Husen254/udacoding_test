<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    // Menampilkan data staff
    public function index()
    {
        $staff = Staff::all();
        return view('staff.index', compact('staff'));
    }

    // Form tambah data staff
    public function create()
    {
        return view('staff.create');
    }

    // Menyimpan data staff
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_library' => 'required|unique:staff',
            'email' => 'required|email|unique:staff',
            'password' => 'required|min:8',
            'phone' => 'required',
            'level' => 'required',
            'alamat' => 'required',
        ]);

        Staff::create([
            'name' => $request->name,
            'id_library' => $request->id_library,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'level' => $request->level,
            'alamat' => $request->alamat,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('staff.index')->with('success', 'Data staff berhasil ditambahkan.');
    }

    // Edit dan Update Data
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'id_library' => 'required|unique:staff,id_library,' . $id,
            'email' => 'required|email|unique:staff,email,' . $id,
            'phone' => 'required',
            'level' => 'required',
            'alamat' => 'required',
        ]);

        $staff->update($request->all());

        return redirect()->route('staff.index')->with('success', 'Data staff berhasil diupdate.');
    }

    // Hapus Data
    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();

        return redirect()->route('staff.index')->with('success', 'Data staff berhasil dihapus.');
    }
}

