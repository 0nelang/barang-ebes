@extends('layout.app')
@section('meta') @include('layout.meta') @endsection

@section('title', 'Kain Batik')

@section('content')
    <div class="container container-content">
        <div class="row mg-top-30">
            <div class="col-md-12">
                <center>
                    <ul class="breadcrumb">
                        <li><a href="/kain-batik">Kain Batik</a></li>
                        <li class="active" class="text-capitalize">{{ $category->name }}</li>
                    </ul>
                </center>
            </div>
        </div>
    </div>
    <div class="product-collection-grid product-grid bd-bottom pd-top-15">
        @foreach ($subcategories as $key => $subcategory)
            <div class="container mg-bottom-30">
                <div class="row">
                    <div class="col-md-12 mg-bottom-30 mg-top-30">
                        <div class="title_custom text-center">
                            <h1>{{ $subcategory->name }}</h1>
                        </div>
                    </div>
                    @foreach ($subcategory->products as $product)
                        <div class="col-xs-12 col-md-3 product-item">
                            <div class="product-img">
                                <a
                                    href="{{ route('product.web.detail', ['id' => $product->id, 'name' => Str::slug($product->name)]) }}"><img
                                        src="{{ asset('storage/' . $product->productImages[0]->image) }}"
                                        alt="{{ $product->name }}" class="img-responsive" />
                                </a>
                            </div>
                            <div class="product-info text-center">
                                <div class="link_toko">
                                    <a href="{{ route('pengrajin.detail', ['id' => $product->user->id, 'name' => Str::slug($product->user->name)]) }}"
                                        class="text-uppercase">{{ $product->user->name }}</a>
                                </div>
                                <h3 class="product-title">
                                    <a href="{{ route('product.web.detail', ['id' => $product->id, 'name' => Str::slug($product->name)]) }}"
                                        class="text-capitalize">{{ $product->name }}</a>
                                </h3>
                                <div class="product-price">
                                    <span>Rp{{ $product->sell_price_format }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    <a href="{{ route('product.all', ['type' => 'kain-batik', 'category' => Str::slug($category->name)]) }}?subkategori={{ Str::slug($subcategory->name) }}"
                        class="btn-loadmore">Lihat Semua Produk
                        &nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right right"></i></a>
                </div>
            </div>
            @if ($key + 1 != count($subcategories))
                <div class="container mg-bottom-30">
                    <div class="row">
                        <div class="col-md-12">
                            <hr class="separator">
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/busana.js') }}"></script>
@endsection
