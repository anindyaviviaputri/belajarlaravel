<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class attendanceController extends Controller
{
    public function showHome() {
        $data_attendances = Attendance::all(); // Mengambil data dari database
        return view('home', compact('data_attendances'));
    }
    
    // Metode untuk menyimpan data baru
    public function store(Request $request)
    {
        Attendance::create([
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'time_in' => $request->input('time_in'),
            'description' => $request->input('description')
        ]);

        return back();
    }

    // Metode untuk mengedit data
    public function edit($id)
    {
    $attendance = Attendance::findOrFail($id);
    return view('attendances.edit', compact('attendance'));
    }

    // Metode untuk memperbarui data yang di-edit
    public function update(Request $request, $id)
    {
    // Validasi data yang diinput (opsional)
    $request->validate([
        'name' => 'required|string|max:255',
        'date' => 'required|date',
        'time_in' => 'required',
        'description' => 'nullable|string',
    ]);

    // Cari data attendance berdasarkan ID
    $attendance = Attendance::findOrFail($id);

    // Update data attendance
    $attendance->update([
        'name' => $request->input('name'),
        'date' => $request->input('date'),
        'time_in' => $request->input('time_in'),
        'description' => $request->input('description')
    ]);

    // Simpan notifikasi ke session
    return redirect()->route('home')->with('success', 'Attendance successfully updated!');
    }

    // Metode untuk menghapus data
    public function destroy($id)
    {
    $attendance = Attendance::findOrFail($id);
    $attendance->delete();

    // Simpan notifikasi ke session
    return redirect()->route('home')->with('success', 'Attendance successfully deleted!');
    }

}
