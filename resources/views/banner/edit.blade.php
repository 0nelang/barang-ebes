@extends('layout.admin')

@section('title', 'Admin Dashboard')

@section('page', 'Data Master > Banner > Edit')

@section('content')
    <div class="col-lg-12 col-12 layout-spacing">
        <h2 calss="mb-2">Edit Banner</h2>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name='_method' value="PUT">
                    <div class="form-group mb-4 mt-3">
                        <label for="exampleFormControlFile1">Upload Gambar</label>
                        <img src="{{ asset('storage/' . $banner->image) }}" width="100%" class="mb-3" id="preview">
                        <input type="file" class="form-control-file" onchange="loadFile(event, 0)"
                            id="exampleFormControlFile1" name="image">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput">Kategori</label>
                        <select class="form-control" id="formGroupExampleInput" name="type_id">
                            <option value="" {{ $banner->type_id == '' ? 'selected' : '' }}>Halaman Home</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ $banner->type_id == $type->id ? 'selected' : '' }}>
                                    Halaman {{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput">Nama Banner</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="name"
                            placeholder="Nama Banner" value="{{ $banner->name }}" required="">
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleFormControlTextarea1">Caption</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="caption"
                            required="">{{ $banner->caption }}</textarea>
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
