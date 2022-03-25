@extends('layout.app')
@section('meta') @include('layout.meta') @endsection

@if ($subcategory)
    @section('title', ucwords($subcategory->name))
@else
    @section('title', ucwords($category->name))
@endif

@section('content')
    <input type="hidden" id="type_id" name="type_id" value="{{ $type->id }}">
    <input type="hidden" id="category_id" name="category_id" value="{{ $category->id }}">
    <input type="hidden" id="subcategory_id" name="subcategory_id" value="{{ $subcategory ? $subcategory->id : '' }}">

    <div class="container container-content">
        <div class="row mg-top-30">
            <div class="col-md-12">
                <center>
                    <ul class="breadcrumb">
                        <li class="text-capitalize"><a href="/{{ Str::slug($type->name) }}">{{ $type->name }}</a></li>
                        @if ($subcategory)
                            @if ($type->id == 1)
                                <li class="text-capitalize"><a
                                        href="/{{ Str::slug($type->name) }}/{{ Str::slug($category->name) }}">{{ $category->name }}</a>
                                </li>
                            @else
                                <li class="text-capitalize"><a
                                        href="/produk/{{ Str::slug($type->name) }}/{{ Str::slug($category->name) }}">{{ $category->name }}</a>
                                </li>

                            @endif
                            <li class="active text-capitalize">{{ $subcategory->name }}</li>
                        @else
                            <li class="active text-capitalize">{{ $category->name }}
                            </li>
                        @endif
                    </ul>
                </center>
            </div>
        </div>
    </div>
    <div class="container container-content">
        <div class="filter-collection-left hidden-lg hidden-md">
            <a class="btn"><i class="zoa-icon-filter"></i> Filter berdasar Pengrajin</a>
        </div>
        <div class="col-xs-12 hidden-md hidden-lg col-left collection-sidebar" id="filter-sidebar">
            <div class="close-sidebar-collection hidden-lg hidden-md">
                <span>Filter</span><i class="icon_close ion-close"></i>
            </div>
            <div class="widget-filter filter-cate no-pd-top">
                <ul>
                    @foreach ($users as $user)
                        <li>
                            <label class="form-check"><span>{{ $user->name }}</span>
                                <input class="form-check-input" type="checkbox" onclick="getProduct(null)" name="user"
                                    value="{{ $user->id }}" />
                                <span class="checkmark"></span>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="shop-top">
            <div class="shop-element left">
                <ul class="js-filter">
                    <li class="filter filter-static hidden-xs hidden-sm">
                        <a href="" onClick="return false;"><i class="zoa-icon-filter"></i>Filter berdasar Pengrajin</a>
                        <div class="dropdown-menu fullw">
                            <div class="col-md-15 col-lg-15 widget-filter filter-cate">
                                <ul>
                                    @foreach ($users as $key => $user)
                                        <li>
                                            <label class="form-check"><span>{{ $user->name }}</span>
                                                <input class="form-check-input" type="checkbox" onclick="getProduct(null)"
                                                    name="user" value="{{ $user->id }}" />
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        @if (($key + 1) % 5 == 0)
                                </ul>
                            </div>
                            <div class="col-md-15 col-lg-15 widget-filter filter-cate">
                                <ul>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="filter">
                        <a onClick="return false;" href=""><i class="zoa-icon-sort"></i>Urutkan Produk
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="" onclick="event.preventDefault();setPriceOrder('price desc')">Harga, Tertinggi ke
                                    Terendah</a>
                            </li>
                            <li>
                                <a href="" onclick="event.preventDefault();setPriceOrder('price asc')">Harga, Terendah ke
                                    Tertinggi</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="product-collection-grid product-grid bd-bottom">
            <div class="row engoc-row-equal" id="row-data">

            </div>
            <div class="mg-bottom-30">
                <center>
                    <div id="pagination"></div>
                </center>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/product_web.js') }}"></script>
@endsection
