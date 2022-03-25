@php
$setting = App\Setting::first();
@endphp
@extends('layout.app')
@section('meta')
    <meta name="description" content="{{ strip_tags($product->description) }}">
    <meta name="keyword" content="{{ implode(',', $product->tags ?? []) }}">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="description" content="{{ strip_tags($product->description) }}">
    <meta itemprop="image" content="{{ asset('storage/' . $product->productImages[0]->image) }}">

    <!-- Facebook Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:description" content="{{ strip_tags($product->description) }}">
    <meta property="og:image" content="{{ asset('storage/' . $product->productImages[0]->image) }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="{{ strip_tags($product->description) }}">
    <meta name="twitter:image" content="{{ asset('storage/' . $product->productImages[0]->image) }}">
@endsection

@section('title', $product->name)

@section('css')
    <link rel="stylesheet" href="{{ asset('lightgallery/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lightgallery/lg-fb-comment-box.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lightgallery/lg-transitions.min.css') }}">
@endsection

@section('content')
    <div class="container container-content">
        <ul class="breadcrumb v2">
            <li><a href="/">Home</a></li>
            <li><a href="/{{ Str::slug($product->type->name) }}" class="text-uppercase">{{ $product->type->name }}</a>
            </li>
            <li class="active text-uppercase">{{ $product->name }}</li>
        </ul>
    </div>
    <div class="container container-content">
        <div class="single-product-detail">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="flex product-img-slide">
                        <div class="product-images">
                            <div class="main-img js-product-slider">
                                @foreach ($product->productImages as $image)
                                    <span class="zoom">
                                        <center>
                                            <img src="{{ asset('storage/' . $image->image) }}"
                                                alt="{{ $product->name }}" />
                                        </center>
                                    </span>
                                @endforeach

                            </div>
                        </div>
                        <div class="multiple-img-list-ver2 js-click-product slick-vertical">
                            @foreach ($product->productImages as $key => $image)
                                <div class="product-col">
                                    <div class="img {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $product->name }}"
                                            class="img-responsive" />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="single-product-info product-info product-grid-v2">
                        <h3 class="product-title"><a href="#">{{ $product->name }}</a>
                            @if ($product->disc != 0)
                                <div class="badge badge-primary"><span>-{{ $product->disc }}%</span></div>
                            @endif
                        </h3>
                        <div class="link_toko">
                            <a href="{{ route('pengrajin.detail', ['id' => $product->user->id, 'name' => Str::slug($product->user->name)]) }}"
                                class="text-uppercase">{{ $product->user->name }}</a>
                        </div>
                        <div class="product-price">
                            @if ($product->disc)
                                <span class="old thin">Rp{{ number_format($product->price) }}</span>
                            @endif
                            <span>Rp{{ $product->sell_price_format }}</span>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <hr class="separator">
                            </div>
                        </div>
                        <div class="short-desc mg-top-15">
                            <div class="product-desc">
                                {!! $product->description !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <hr class="separator">
                            </div>
                        </div>
                        <div class="single-product-button-group mg-top-15">
                            <p>Beli Produk Melalui:</p>
                            <div class="flex align-items-center element-button button-orders">
                                <a target="_blank" href="https://{{ $product->wa_link }}"
                                    class="zoa-btn zoa-addcart btn-order-wa">
                                    <i class="fa fa-whatsapp"></i>Whatsapp
                                </a>
                                @if ($product->shopee)
                                    <a target="_blank" href="{{ $product->shopee }}"
                                        class="zoa-btn zoa-addcart btn-order-shopee">
                                        <img src="{{ asset('img/shopee.png') }}" alt="Rumah Batik Probolinggo" style="width: 16px" />Shopee
                                    </a>
                                @endif
                                @if ($product->tokopedia)
                                    <a target="_blank" href="{{ $product->tokopedia }}"
                                        class="zoa-btn zoa-addcart btn-order-toped">
                                        <img src="{{ asset('img/tokopedia-black.png') }}" alt="Rumah Batik Probolinggo" style="width: 16px" />
                                        Tokopedia
                                    </a>
                                @endif
                            </div>
                        </div>
                        {{-- <div class="product-tags">
                            @if ($product->tags)
                                <div class="element-tag">
                                    <label>Tags :</label>
                                    @foreach ($product->tags as $key => $tag)
                                        <a
                                            href="#">{{ $tag }}{{ $key + 1 != count($product->tags) ? ',' : '' }}</a>
                                    @endforeach
                                </div>
                            @endif
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

        <!-- End Footer -->
        <!-- EndContent -->
    </div>
    @if (count($others) > 0)
        <div class="container container-content">
            <div class="row">
                <div class="col-md-12">
                    <hr class="separator">
                </div>
            </div>
            <div class="product-related">
                <h3 class="related-title text-center">PRODUK LAIN PENGRAJIN</h3>
                <div class="row">
                    @foreach ($others as $other)
                        <div class="col-xs-12 col-md-3 product-item">
                            <div class="product-img">
                                <a
                                    href="{{ route('product.web.detail', ['id' => $other->id, 'name' => Str::slug($other->name)]) }}"><img
                                        src="{{ asset('storage/' . $other->productImages[0]->image) }}"
                                        alt="{{ $other->name }}" class="img-responsive" /></a>
                            </div>
                            <div class="product-info text-center">
                                <div class="link_toko">
                                    <a href="{{ route('pengrajin.detail', ['id' => $other->user->id, 'name' => Str::slug($other->user->name)]) }}"
                                        class="text-uppercase">{{ $other->user->name }}</a>
                                </div>
                                <h3 class="product-title">
                                    <a
                                        href="{{ route('product.web.detail', ['id' => $other->id, 'name' => Str::slug($other->name)]) }}">{{ $other->name }}</a>
                                </h3>
                                <div class="product-price">
                                    <span>Rp{{ number_format($other->price) }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mg-bottom-30">
                    <div class="text-center">
                        <a href="{{ route('pengrajin.detail', ['id' => $user->id, 'name' => Str::slug($user->name)]) }}"
                            class="btn-loadmore">Lihat Semua Produk &nbsp;&nbsp;&nbsp;<i
                                class="fa fa-angle-right right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('script')
    {{-- <script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js">
    </script> --}}
    <script src="{{ asset('js/jquery.zoom.js') }}"></script>
    {{-- <script src="{{ asset('lightgallery/picturefill.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('lightgallery/lightgallery.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('lightgallery/lg-autoplay.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('lightgallery/lg-fullscreen.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('lightgallery/lg-hash.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('lightgallery/lg-pager.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('lightgallery/lg-rotate.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('lightgallery/lg-share.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('lightgallery/lg-thumbnail.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('lightgallery/lg-video.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('lightgallery/lg-zoom.min.js') }}"></script> --}}
    {{-- <script>
        $(document).ready(function() {
            setTimeout(() => {
                lightGallery(document.getElementById('lightgallery'), {
                    selector: '.lightgallery-data'
                });
            }, 1000);
        });
        $('img')
    .wrap('<span style="display:inline-block"></span>')
    .css('display', 'block')
    .parent()
    .zoom();
    </script> --}}
    <script>
        $(document).ready(function() {
            var images = $('.zoom');
            $.each(images, function(index, e) {
                $(e).zoom({
                    on: 'click'
                });
            });
        });
    </script>

@endsection
