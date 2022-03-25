@extends('layout.app')
@section('meta') @include('layout.meta') @endsection

@section('title', $user->name)

@section('content')
    <input type="hidden" id="type_id" value="{{ Request::get('type_id') }}">
    <input type="hidden" id="user_id" value="{{ app('request')->route('user_id') }}">
    <div class="container container-content">
        <div class="profile-section">
            <div class="row">
                <div class="col-lg-3 col-sm-12 profile-image text-center">
                    <img src="{{ asset('storage/' . $user->logo) }}" alt="Rumah Batik Probolinggo" srcset="" class="w-100">
                </div>
                <div class="col-lg-6">
                    <div class="pd-left-15 pd-right-15">
                        <h1 class="shop-name mg-bottom-15 text-capitalize">{{ $user->name }} > {{ $type->name }}</h1>

                        <div>
                            <hr class="separator">
                        </div>
                        @php
                            $user_types = $user->typeNames();
                        @endphp
                        @forelse ($user_types as $user_type)
                            <div class=" mg-bottom-0 badge shop-type text-capitalize">{{ $user_type }}</div>
                        @empty

                        @endforelse
                        <div>
                            <hr class="separator">
                        </div>

                        <p class="shop-owner">{{ $user->owner }}</p>
                        <p><a class="shop-phone" href="tel:082210786904">{{ $user->phone }}</a></p>
                        <div class="shop-address mg-top-30">{!! $user->address !!}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop-top mg-top-30">
            <div class="filter-collection-left hidden-lg hidden-md">
                <a class="btn"><i class="zoa-icon-filter"></i> Filter berdasar Kategori</a>
            </div>
            <div class="col-xs-12 hidden-md hidden-lg col-left collection-sidebar" id="filter-sidebar">
                <div class="close-sidebar-collection hidden-lg hidden-md">
                    <span>Filter</span><i class="icon_close ion-close"></i>
                </div>
                <div class="widget-filter filter-cate no-pd-top">
                    <ul>
                        @if ($type->id == 1 || $type->id == 2)
                            @foreach ($categories as $category)
                                <div class="col-md-15 col-lg-15 widget-filter filter-cate">
                                    @if ($category->is_choice == 1)
                                        <label class="form-check"><span>{{ $category->name }}</span>
                                            <input class="form-check-input" type="checkbox" name="category"
                                                value="{{ $category->id }}" onclick="getProduct(null)" />
                                            <span class="checkmark"></span>
                                        </label>
                                    @else
                                        <p class="text-uppercase">{{ $category->name }}</p>
                                    @endif
                                    <ul>
                                        @foreach ($category->subcategories as $subcategory)
                                            <li>
                                                <label class="form-check"><span>{{ $subcategory->name }}</span>
                                                    <input class="form-check-input" type="checkbox"
                                                        name="category{{ $category->id }}"
                                                        value="{{ $subcategory->id }}" onclick="getProduct(null)" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-15 col-lg-15 widget-filter filter-cate">
                                <ul>
                                    @foreach ($categories as $category)
                                        <li>
                                            <label class="form-check"><span>{{ $category->name }}</span>
                                                <input class="form-check-input" type="checkbox" name="category"
                                                    value="{{ $category->id }}" onclick="getProduct(null)" />
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="shop-element left">
                <ul class="js-filter">
                    <li class="filter filter-static hidden-xs hidden-sm">
                        <a><i class="zoa-icon-filter"></i>Filter berdasar Kategori</a>
                        <ul class="dropdown-menu fullw">
                            @if ($type->id == 1 || $type->id == 2)
                                @foreach ($categories as $category)
                                    <div class="col-md-15 col-lg-15 widget-filter filter-cate">
                                        @if ($category->is_choice == 1)
                                            <label class="form-check"><span>{{ $category->name }}</span>
                                                <input class="form-check-input" type="checkbox" name="category"
                                                    value="{{ $category->id }}" onclick="getProduct(null)" />
                                                <span class="checkmark"></span>
                                            </label>
                                        @else
                                            <p class="text-uppercase">{{ $category->name }}</p>
                                        @endif
                                        <ul>
                                            @foreach ($category->subcategories as $subcategory)
                                                <li>
                                                    <label class="form-check"><span>{{ $subcategory->name }}</span>
                                                        <input class="form-check-input" type="checkbox"
                                                            name="category{{ $category->id }}"
                                                            value="{{ $subcategory->id }}" onclick="getProduct(null)" />
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-15 col-lg-15 widget-filter filter-cate">
                                    <ul>
                                        @foreach ($categories as $category)
                                            <li>
                                                <label class="form-check"><span>{{ $category->name }}</span>
                                                    <input class="form-check-input" type="checkbox" name="category"
                                                        value="{{ $category->id }}" onclick="getProduct(null)" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="product-collection-grid product-grid bd-bottom pd-top-15">
            <div class="row engoc-row-equal" id="row-data">
            </div>
            <div class="col-xs-12 col-md-12">
                <center>
                    <div id="pagination"></div>
                </center>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/pengrajin_product.js') }}"></script>
@endsection
