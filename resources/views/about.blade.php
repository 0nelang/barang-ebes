@php
$setting = App\Setting::first();
@endphp
@extends('layout.app')
@section('meta') @include('layout.meta') @endsection

@section('title', 'Tentang')

@section('content')
    <div class="container container-content">
        <div class="zoa-about text-center">
            <div class="about-banner">
                <div class="">
                    <img src="{{ asset('storage/' . $about->image) }}" class="img-responsive fullw"
                        alt="Tentang Rumah Batik" />
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="about-content bd-bottom">
            <div class="row">
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="about-info">
                        {!! $about->text !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="about-bottom bd-bottom">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 about-element">
                    <div class="social-media">
                        <a href="{{ $setting->instagram_link }}">
                            <i class="fa fa-instagram"></i> {{ $setting->instagram }}
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 about-element">
                    <div class="social-media">
                        <a href="{{ $setting->facebook_link }}">
                            <i class="fa fa-facebook"></i> {{ $setting->facebook }}
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 about-element">
                    <div class="social-media">
                        <a href="mailto:{{ $setting->email }}">
                            <i class="fa fa-envelope"></i> {{ $setting->email }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
