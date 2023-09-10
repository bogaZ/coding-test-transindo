@extends('layouts.main')

@section('container')
    <div style="height: 50px"></div>
    <form action="/hitung" method="POST">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 90vh">
            <div style="padding: 20px; width: 100vh">
                @if ($errors->has('id'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first('id') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif ($errors->has('jumlah'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first('jumlah') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h4 style="color: rgb(75, 75, 75)">Website penghitung harga sampah</h4>
                <p style="color: rgb(158, 158, 158)">Hitung berapa harga sampah berdasarkan jenisnya</p>
                <br>
                <div class="p-4 rounded-4" style="background: rgb(211, 255, 206)">
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
                            <label for="exampleInputPassword1" class="form-label">Jumlah dalam
                                <strong>Kg</strong></label>
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
@endsection
