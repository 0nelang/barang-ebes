@extends('layout.admin')

@section('title', 'Admin Dashboard')

@section('page', 'Data Master > Pengrajin > Edit')

@section('content')
    <div class="col-lg-12 col-12 layout-spacing">
        <h3 calss="mb-2">Edit Pengrajin</h3>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="name">Nama Toko</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                                    placeholder="Nama Toko" required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="owner">Pemilik</label>
                                <input type="text" class="form-control" id="owner" name="owner" value="{{ $user->owner }}"
                                    placeholder="Nama Pemilik" required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="phone">Telepon</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}"
                                    placeholder="Nomor Whatsapp" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-4">
                                <label for="address">Alamat</label>
                                <textarea class="form-control summernote" id="address" rows="3" name="address"
                                    required="">{{ $user->address }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4 mt-3">
                                <label for="logo">Upload Logo</label>
                                <img src="{{ asset('storage/' . $user->logo) }}" width="100%" class="mb-3" id="preview">
                                <input type="file" class="form-control-file" onchange="loadFile(event, 0)" id="logo"
                                    name="logo">
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

        $('.summernote').summernote({
            height: 300,
            tabDisable: true,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
    </script>
@endsection
