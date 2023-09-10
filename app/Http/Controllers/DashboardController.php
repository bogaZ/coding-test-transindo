<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
                'harga' => ['required', 'numeric', 'min:500'],
                'link_foto' => ['required', 'image']
            ]);
            $photoPath = $request->file('link_foto')->store('public/photos');

            $checkData['link_foto'] = $photoPath;

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

            if ($request['link_foto']) {
                $request->validate([
                    'link_foto' => ['required', 'image']
                ]);

                Storage::delete($data->link_foto);

                $photoPath = $request->file('link_foto')->store('public/photos');

                $newData['link_foto'] = $photoPath;
            }

            $data->update($newData);

            return redirect('dashboard')->with('success', 'Update data jenis sampah berhasil!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
