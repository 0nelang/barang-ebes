@extends('layout.app')
@section('meta') @include('layout.meta') @endsection

@section('title', $user->name)

@section('content')
    <div class="container container-content">
        <div class="profile-section">
            <div class="row">
                <div class="col-lg-3 col-sm-12 profile-image text-center">
                    <img src="{{ asset('storage/' . $user->logo) }}" alt="Rumah Batik Probolinggo" srcset="" class="w-100">
                </div>
                <div class="col-lg-6">
                    <div class="pd-left-15 pd-right-15">
                        <h1 class="shop-name mg-bottom-15">{{ $user->name }}</h1>
                        <div>
                            <hr class="separator">
                        </div>
                        @php
                            $types = $user->typeNames();
                        @endphp
                        @forelse ($types as $type)
                            <div class=" mg-bottom-0 badge shop-type text-capitalize">{{ $type }}</div>
                        @empty

                        @endforelse
                        <div>
                            <hr class="separator">
                        </div>
                        <p class="shop-owner mg-top-30">{{ $user->owner }}</p>
                        <p><a class="shop-phone" href="tel:082210786904">{{ $user->phone }}</a></p>
                        <div class="shop-address mg-top-30">{!! $user->address !!}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop-top mg-top-30">
            <div class="filter-collection-left hidden-lg hidden-md">
                <a class="btn"><i class="zoa-icon-filter"></i> Filter Produk Pengrajin</a>
            </div>
            <div class="col-xs-12 hidden-md hidden-lg col-left collection-sidebar" id="filter-sidebar">
                <div class="close-sidebar-collection hidden-lg hidden-md">
                    <span>Filter</span><i class="icon_close ion-close"></i>
                </div>
                <div class="widget-filter filter-cate no-pd-top">
                    <ul>
                        @foreach ($user_types as $type)
                            <li>
                                <label class="form-check"><span>{{ $type->name }}</span>
                                    <input class="form-check-input" type="checkbox" name="type"
                                        value="{{ $type->name }}" />
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="shop-element left">
                <ul class="js-filter hidden-xs hidden-sm">
                    <li class="filter">
                        <a><i class="zoa-icon-filter"></i>Filter Produk Pengrajin</a>
                        <ul class="dropdown-menu pd-top-15 pd-left-30 pd-right-30">
                            @foreach ($user_types as $type)
                                <li>
                                    <label class="form-check"><span>{{ $type->name }}</span>
                                        <input class="form-check-input" type="checkbox" name="type"
                                            value="{{ $type->name }}" />
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="product-collection-grid product-grid bd-bottom pd-top-15">
            @foreach ($user_types as $key => $type)
                <div data-type="{{ $type->name }}" class="type-card">
                    <div class="row engoc-row-equal mg-bottom-30">
                        <div class="col-md-12 mg-bottom-30 mg-top-30">
                            <div class="title_custom text-center">
                                <h1>{{ $type->name }}</h1>
                            </div>
                        </div>
                        @foreach ($type->products as $product)
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
                                        <a class="text-uppercase">{{ $product->user->name }}</a>
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
                        <div class="col-md-12">
                            <div class="text-center">
                                <a href="{{ route('pengrajin.all.product', ['user_id' => app('request')->route('id')]) }}?type_id={{ $type->id }}"
                                    class="btn-loadmore">Lihat Semua Produk
                                    &nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right right"></i></a>
                            </div>
                        </div>
                    </div>
                    @if ($key + 1 != count($user_types))
                        <div class="container mg-bottom-30">
                            <div class="row">
                                <div class="col-md-12">
                                    <hr class="separator">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    <script>
        var $filterCheckboxes = $('input[type="checkbox"]');
        var filterFunc = function() {
            var selectedFilters = {};
            $filterCheckboxes.filter(':checked').each(function() {
                if (!selectedFilters.hasOwnProperty(this.name)) {
                    selectedFilters[this.name] = [];
                }
                selectedFilters[this.name].push(this.value);
            });

            var $filteredResults = $('.type-card');

            $.each(selectedFilters, function(name, filterValues) {
                $filteredResults = $filteredResults.filter(function() {

                    var matched = false,
                        currentFilterValues = $(this).data('type').split(',');
                    $.each(currentFilterValues, function(_, currentFilterValue) {
                        if ($.inArray(currentFilterValue, filterValues) != -1) {
                            matched = true;
                            return false;
                        }
                    });
                    return matched;

                });
            });

            $('.type-card').hide().filter($filteredResults).show();
        }

        $filterCheckboxes.on('change', filterFunc);
    </script>
@endsection
