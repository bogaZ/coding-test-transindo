@extends('layouts.main')

@section('container')
    <form action="/hitung" method="POST">
        <div style="height: 50px"></div>
        <div class="d-flex justify-content-center align-items-center" style="min-height: 90vh">
            <div style="min-width: 60%">
                <h4 style="color: rgb(75, 75, 75)">Website penghitung harga sampah</h4>
                <p style="color: rgb(158, 158, 158)">Hitung berapa harga sampah berdasarkan jenisnya</p>
                <br>
                <div class="p-4 rounded-4" style="background: rgb(247, 255, 246)">
                    <h1>Mulai mengitung!</h1>

                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Jenis Sampah</label>
                            <select name="id" class="form-select" aria-label="Default select example">
                                @foreach ($datas as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputPassword1" class="form-label">Jumlah dalam <strong>Kg</strong></label>
                            <input name="jumlah" type="number" class="form-control" placeholder="Masukkan jumlah dalam Kg"
                                required>
                        </div>
                        <div class="">
                            <label for="exampleInputPassword1" class="form-label"></label>
                            <div class="d-grid gap-2">
                                <button class="btn btn-lg btn-success">Hitung</button>
                            </div>
                        </div>
                    </div>
                </div>


    </form>

    </div>
    </div>
@endsection
