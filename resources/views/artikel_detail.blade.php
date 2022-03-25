@extends('layout.app')
@section('meta')
    <meta name="description" content="{{ $detail->seo_description }}">
    <meta name="keyword" content="{{ $detail->seo_keyword }}">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="description" content="{{ $detail->seo_description }}">
    <meta itemprop="image" content="{{ asset('storage/' . $detail->image) }}">

    <!-- Facebook Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:description" content="{{ $detail->seo_description }}">
    <meta property="og:image" content="{{ asset('storage/' . $detail->image) }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="{{ $detail->seo_description }}">
    <meta name="twitter:image" content="{{ asset('storage/' . $detail->image) }}">
@endsection

@section('title', $detail->title)

@section('content')
    <div class="container" style="padding-bottom: 100px">
        <div class="row article_head">
            <div class="col-md-12">
                <h1>{{ $detail->title }}</h1>
                <span class="article_date"><i class="fa fa-calendar"></i>
                    &nbsp;{{ \Carbon\Carbon::parse($detail->created_at)->translatedFormat('d F Y') }}</span>
            </div>
            <div class="col-md-12">
                <img src="{{ asset('storage/' . $detail->image) }}" alt="Rumah Batik Probolinggo" class="article_detail_img" />
            </div>
        </div>
        <div class="row mg-top-30 article_body">
            <div class="col-md-12">
                <div class="article_body_text">
                    {!! $detail->text !!}
                </div>
            </div>
        </div>
    </div>
    @if (count($artikel) != 0)
        <div class="container mg-bottom-30">
            <div class="row">
                <div class="col-md-12 mg-bottom-30 mg-top-30">
                    <div class="title_custom text-center">
                        <h1>Artikel Lainnya</h1>
                    </div>
                </div>

                <div class="col-md-12">
                    @foreach ($artikel as $a)
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

                <div class="col-md-12">
                    <div class="text-center mg-top-30">
                        <a href="/artikel" class="btn-loadmore">Lihat Semua Artikel
                            &nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
