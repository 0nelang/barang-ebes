@extends('layout.app')
@section('meta') @include('layout.meta') @endsection

@section('title', 'Home')

@section('content')
    <div class="container">
        <!-- If we need navigation buttons -->


        <div class="slide v3">
            <div class="swiper-container" id="swiper_home">
                <div class="swiper-wrapper">
                    @foreach ($banners as $banner)
                        <div class="swiper-slide slide-home">
                            <img src="{{ asset('storage/' . $banner->image) }}" alt="Rumah Batik Probolinggo">
                        </div>
                    @endforeach
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <!-- End content -->
    <div class="product-collection-grid product-grid pd-top-15">
        @foreach ($types as $key => $type)
            <div class="container mg-bottom-30">
                <div class="row">
                    <div class="col-md-12 mg-bottom-30 mg-top-30">
                        <div class="title_custom text-center">
                            <h1 class="text-uppercase">{{ $type->name }}</h1>
                        </div>
                    </div>
                    @foreach ($type->homeProducts as $product)
                        <div class="col-xs-12 col-md-3 product-item">
                            <div class="product-img">
                                <a
                                    href="{{ route('product.web.detail', ['id' => $product->product->id, 'name' => Str::slug($product->product->name)]) }}"><img
                                        src="{{ asset('storage/' . $product->product->productImages[0]->image) }}"
                                        alt="{{ $product->product->name }}" class="img-responsive" />
                                </a>
                            </div>
                            <div class="product-info text-center">
                                <div class="link_toko">
                                    <a href="{{ route('pengrajin.detail', ['id' => $product->product->user->id, 'name' => Str::slug($product->product->user->name)]) }}"
                                        class="text-uppercase">{{ $product->product->user->name }}</a>
                                </div>
                                <h3 class="product-title">
                                    <a href="{{ route('product.web.detail', ['id' => $product->product->id, 'name' => Str::slug($product->product->name)]) }}"
                                        class="text-capitalize">{{ $product->product->name }}</a>
                                </h3>
                                <div class="product-price">
                                    <span>Rp{{ $product->product->sell_price_format }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    <a href="/{{ Str::slug($type->name) }}" class="btn-loadmore">Lihat Semua Produk
                        &nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right right"></i></a>
                </div>
            </div>
            @if ($key + 1 != count($types))
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
    <div class="product-collection-grid product-grid pd-top-15" style="background-color: #F9F9F9;">
        <div class="container mg-bottom-30">
            <div class="row">
                <div class="col-md-12 mg-bottom-30 mg-top-30">
                    <div class="title_custom text-center">
                        <h1 style="color: #1a3352;">Artikel</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($articles as $a)
                    <div class="col-md-4 col-xs-12">
                        <div class="card_article">
                            <img src="{{ asset('storage/' . $a->image) }}" alt="Rumah Batik Probolinggo" />
                            <div class="card_article_body">
                                <h4 class="text-uppercase">
                                    <a href="/artikel/{{ $a->slug }}">{{ $a->title }}</a>
                                </h4>

                                <p>
                                    {!! substr(strip_tags($a->text), 0, 100) !!}...
                                </p>
                                <div class="article_more">
                                    <a href="/artikel/{{ $a->slug }}">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mg-top-30 mg-bottom-30">
            <div class="text-center">
                <a href="/artikel" class="btn-loadmore">Lihat Semua Artikel &nbsp;&nbsp;&nbsp;<i
                        class="fa fa-angle-right right"></i></a>
            </div>
        </div>
    </div>
@endsection
