<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DashboardController extends Controller
{
    // Show Dashboard
    public function show()
    {
        return view('dashboard')->with([
            'datas' => Sampah::all()
        ]);
    }

    // Store Sampah
    public function storeSampah(Request $request)
    {
        try {
            $checkData = $request->validate([
                'name' => ['required', 'unique:sampahs,name'],
                'description' => ['required'],
                'harga' => ['required', 'numeric', 'min:500']
            ]);
            Sampah::create($checkData);
            return redirect('dashboard')->with('success', 'Data berhasil ditambahkan');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    // Delete data sampah
    public function destroy($id)
    {
        $data = Sampah::find($id);

        $nameSampah = $data['name'];

        $data->delete();

        return redirect('dashboard')->with('success', 'Sampah ' . $nameSampah . ' berhasil dihapus!');
    }

    // Update data sampah
    public function edit(Request $request, $id)
    {
        try {
            $data = Sampah::find($id);

            if ($data['name'] != $request['name']) {
                $request->validate([
                    'name' => ['required', 'unique:sampahs,name'],
                ]);
            }

            $newData = $request->validate([
                'name' => ['required'],
                'description' => ['required'],
                'harga' => ['required', 'numeric', 'min:500']
            ]);

            $data->update($newData);

            return redirect('dashboard')->with('success', 'Update data jenis sampah berhasil!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}