@extends('layout.admin')

@section('title', 'Admin Dashboard')

@section('page', 'Data Master > Produk Home')

@section('content')
    <div class="col-lg-12">
        <h3 calss="mb-2">Daftar Produk Home</h3>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive mb-4">
                    <table class="table style-3 table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Kategori Usaha</th>
                                <th>Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @dd($home_products) --}}
                            @forelse($home_products as $b)
                                <tr>
                                    <td>{{ $b->type->name }}</td>
                                    <td>
                                        <input type="hidden" id="home_product_id{{ $b->id }}"
                                            value="{{ $b->id }}">
                                        <select id="product_id{{ $b->id }}" class="form-control"
                                            onchange="doUpdate({{ $b->id }})">
                                            @foreach ($b->type->products as $product)
                                                <option value="{{ $product->id }}" @if ($product->id == $b->product_id) selected @endif>
                                                    {{ $product->user->name }} - {{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.table').dataTable({
            'ordering': false,
        });

        function doUpdate(id) {
            var homeProductId = $("#home_product_id" + id).val();
            var productId = $("#product_id" + id).val();

            var result = confirm("Apakah anda yakin akan mengubah data ini?");
            if (result) {
                $.ajax({
                    url: base_url + '/home-product/' + homeProductId,
                    method: 'POST',
                    data: {
                        _token: token,
                        product_id: productId,
                        _method: 'PUT',
                    },
                    dataType: 'json',
                    success: function(resp) {
                        alert("Berhasil mengubah data");
                    }
                });
            }
        }
    </script>
@endsection
