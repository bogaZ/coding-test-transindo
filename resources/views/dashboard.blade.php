@extends('layouts.main')

@section('container')
    <div class="container p-4">
        <div style="height: 50px"></div>
        <div style="margin-top: 30px" class="col-6">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('name'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('name') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif ($errors->has('description'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('description') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif ($errors->has('harga'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('harga') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif ($errors->has('link_foto'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('link_foto') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success">Tambah
            Jenis Sampah</button>
        <table class="table mt-4 table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ ucwords($data->name) }}</td>
                        <td>
                            {{ $data->description }}
                        </td>

                        <td class="text-nowrap text-truncate" style="max-width: 200px;">
                            <strong>{{ 'Rp. ' . number_format($data->harga, 0, ',', '.') }}</strong>
                        </td>
                        <td>
                            <img width="100px" src="{{ asset('storage/photos/' . $data->link_foto) }}"
                                alt="{{ $data->name }}">
                        </td>
                        <td>
                            <div class="d-flex">
                                <button style="margin-right: 15px" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $data->id }}" class="btn btn-warning">Edit</button>
                                <form action="/delete-sampah/{{ $data->id }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                    <!-- Modal Data Sampah -->
                    <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Jenis Sampah</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="/update-sampah/{{ $data->id }}" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama jenis sampah</label>
                                            <input name="name" value="{{ $data->name }}" type="text"
                                                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Masukkan nama jenis sampah" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="floatingTextarea2" class="form-label">Deskripsi</label>
                                            <textarea name="description" class="form-control" placeholder="Masukkan Deskripsi" id="floatingTextarea2" required>{{ $data->description }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword" class="form-label">Harga /
                                                <strong>Kg</strong></label>
                                            <input name="harga" type="number" value="{{ $data->harga }}"
                                                class="form-control" id="exampleInputPassword"
                                                placeholder="Masukkan harga jenis sampah">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Pilih Foto</label>
                                            <input name="link_foto" class="form-control" type="file" id="formFile">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jenis Sampah</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/store-sampah" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama jenis sampah</label>
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Masukkan nama jenis sampah" required>
                        </div>
                        <div class="mb-3">
                            <label for="floatingTextarea2" class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control" placeholder="Masukkan Deskripsi" id="floatingTextarea2" required>{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword" class="form-label">Harga / <strong>Kg</strong></label>
                            <input name="harga" type="number" value="{{ old('harga') }}" class="form-control"
                                id="exampleInputPassword" placeholder="Masukkan harga jenis sampah">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Pilih Foto</label>
                            <input name="link_foto" class="form-control" type="file" id="formFile">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
