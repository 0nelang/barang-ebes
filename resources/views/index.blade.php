@extends('layout.app')
@section('meta') @include('layout.meta') @endsection

@section('title', 'Home')

@section('css')
<link rel="stylesheet" href="{{ asset('css/faq.css') }}">
<style>

    body {
        font-family: "Helvetica", sans-serif;
        font-size: 14px;
        line-height: 1.428571429;
        color: #222222;
        background-color: #f9f9f9;
    }
    .panel-heading .panel-title a {
        /* font-family: "Eina", sans-serif; */
        margin-top: 0;
        margin-bottom: 0;
        font-size: 16px;
        color: #07100b;
    }

</style>
@endsection

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

        <div class="container ">
            @foreach ($faq as $index => $fa)
            <div class="panel-group" id="faqAccordion">
                <div class="panel panel-default ">
                    <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question{{ $index }}">
                         <h4 class="panel-title">
                            <a href="#{{ $index }}" class="ing">Q: {{ $fa->pertanyaan }}</a>
                      </h4>
        
                    </div>
                    <div id="question{{ $index }}" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body">
                             <h5><span class="label label-primary">Jawaban</span></h5>
        
                            <p>{{ $fa->jawaban }}</p>
                        </div>
                    </div>
                </div>  
            </div>
            @endforeach
            <!--/panel-group-->
        </div>
        {{-- <div class="container">
            <div class="panel-group" id="accordion">
                <div class="panel pan   el-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                href="#collapseOne">
                                Collapsible Group Item #1
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                            squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                            single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                            beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                            lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
                            probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                href="#collapseTwo">
                                Collapsible Group Item #2
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                            squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                            single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                            beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                            lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
                            probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

    
    <!-- end container -->
@endsection

{{-- @section('css')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection --}}