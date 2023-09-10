<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SampahController extends Controller
{
    //
    public function hitung(Request $request)
    {
        try {
            $request->validate([
                'id' => ['required'],
                'jumlah' => ['required', 'numeric', 'min:1']
            ]);

            $data = Sampah::find($request['id']);

            $total = $data['harga'] * $request['jumlah'];

            return view('/total', ['datas' => $total]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function showTotal()
    {
        return view('/total');
    }
}
