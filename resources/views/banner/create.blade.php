@extends('layout.admin')

@section('title', 'Admin Dashboard')

@section('page', 'Data Master > Banner > Tambah')

@section('content')
    <div class="col-lg-12 col-12 layout-spacing">
        <h3 calss="mb-2">Tambah Banner</h3>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4 mt-3">
                        <label for="exampleFormControlFile1">Upload Gambar</label>
                        <img src="" width="100%" class="mb-3" id="preview" required="">
                        <input type="file" class="form-control-file" onchange="loadFile(event, 0)"
                            id="exampleFormControlFile1" name="image" required="">
                    </div>
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput">Kategori</label>
                        <select class="form-control" id="formGroupExampleInput" name="type_id">
                            <option value="">Halaman Home</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">Halaman {{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput">Nama Banner</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="name"
                            placeholder="Nama Banner" required="">
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleFormControlTextarea1">Caption</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="caption"
                            required=""></textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <a class="btn btn-danger mt-3" href="{{ route('banner.index') }}"><i
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
