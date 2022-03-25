@extends('layout.admin')

@section('title', 'Admin Dashboard')

@section('page', 'Profile')

@section('content')
    <div class="col-lg-12 col-12 layout-spacing">
        <h3 calss="mb-2">Profile</h3>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="{{ route('profile.update', ['user' => Auth::user()->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ Auth::user()->name }}" placeholder="Nama" required="">
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="col-md-4">
                            <div class="form-group mb-4 mt-3">
                                <label for="logo">Upload Logo</label>
                                <img src="{{ asset('storage/' . Auth::user()->logo) }}" width="100%" class="mb-3"
                                    id="preview">
                                <input type="file" class="form-control-file" onchange="loadFile(event, 0)" id="logo"
                                    name="logo">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="address">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ Auth::user()->username }}" placeholder="Username Pengrajin" required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="address">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password Pengrajin">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <a class="btn btn-danger mt-3" href="{{ route('user.index') }}"><i
                                    class="flaticon-cancel-12"></i> Back</a>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        var loadFile = function(event, no) {
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
