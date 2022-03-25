@extends('layout.admin')

@section('title', 'Admin Dashboard')

@section('page', 'Dashboard')

@section('content')
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="post">
                <div class="post-details">
                    <div class="post-content pt-2">
                        <h2 class="title mb-3"><a href="#">Selamat Datang, {{ Auth::user()->name }}</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
