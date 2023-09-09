<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;

class SampahController extends Controller
{
    //
    public function hitung(Request $request)
    {
        $checkData = $request->validate([
            'id' => ['required'],
            'jumlah' => ['required', 'numeric', 'min:1']
        ]);

        $data = Sampah::find($request['id']);

        $total = $data['harga'] * $request['jumlah'];

        return view('/total')->with([
            'datas' => $total
        ]);
    }

    public function showTotal()
    {
        return view('/total');
    }
}
