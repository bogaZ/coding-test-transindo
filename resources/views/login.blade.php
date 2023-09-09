@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh">
        <div>
            @if (session('error'))
                <div style="width: 50px"></div>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="p-4 rounded-4" style="background: rgb(247, 255, 246)">
                <h1>Login Admin</h1>
                <form action="/checklogin" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input name="email" value="{{ old('email') }}" type="email" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn btn-success">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
