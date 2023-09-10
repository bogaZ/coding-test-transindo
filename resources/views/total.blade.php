@extends('layouts.main')

@section('container')
    <div style="height: 80px"></div>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh">
        <div class="p-2" style="max-width: 800px;">
            <h4 style="color: rgb(75, 75, 75)">Berikut total harga sampah {{ $data->name . ' ' }}!</h4>
            <p style="color: rgb(158, 158, 158)">Total harga dihitung berdasarkan berat per Kilo nya</p>
            <br>
            <div class=" rounded-4" style="background-color: rgb(211, 255, 206)">
                <div class="row p-3">
                    <div class="col-md-6">
                        <img class="img-fluid" src="{{ asset('storage/photos/' . $data->link_foto) }}"
                            alt="{{ $data->names }}">
                    </div>
                    <div class="col-md-6">
                        <table class="table ">
                            <tr>
                                <td>Nama jenis sampah</td>
                                <td>:</td>
                                <td>{{ $data->name }}</td>
                            </tr>
                            <tr>
                                <td>Harga / <strong>Kg</strong></td>
                                <td>:</td>
                                <td><strong>{{ 'Rp. ' . number_format($data->harga, 0, ',', '.') }}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Jumlah dijual</td>
                                <td>:</td>
                                <td>{{ $jumlah . ' ' }} <strong>Kg</strong> </td>
                            </tr>
                            <tr>
                                <td>Total Harga</td>
                                <td>:</td>
                                <td><strong>{{ 'Rp. ' . number_format($total, 0, ',', '.') }}</strong>
                                </td>
                            </tr>
                        </table>
                        <div class="d-grid grap-2">
                            <a href="/" class="btn btn-lg btn-success">Hitung Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
