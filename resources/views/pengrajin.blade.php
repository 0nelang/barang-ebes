@extends('layout.app')
@section('meta') @include('layout.meta') @endsection

@section('title', 'Pengrajin')

@section('content')
    <div class="container" style="padding-bottom: 100px">
        <div class="row">
            <div class="col-md-12 mg-bottom-30 mg-top-30">
                <div class="title_custom text-center">
                    <h1>Pengrajin</h1>
                </div>
            </div>
            <div class="col-md-12">
                <div class="filter-collection-left hidden-lg hidden-md">
                    <a class="btn"><i class="zoa-icon-filter"></i> Filter berdasar Jenis
                        Usaha</a>
                </div>
                <div class="col-xs-12 hidden-md hidden-lg col-left collection-sidebar" id="filter-sidebar">
                    <div class="close-sidebar-collection hidden-lg hidden-md">
                        <span>Filter</span><i class="icon_close ion-close"></i>
                    </div>
                    <div class="widget-filter filter-cate no-pd-top">
                        <ul>
                            @foreach ($types as $type)
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
                <div class="shop-top">
                    <div class="shop-element left">
                        <ul class="js-filter hidden-xs hidden-sm">
                            <li class="filter">
                                <a href=""><i class="zoa-icon-filter"></i>Filter berdasar Jenis
                                    Usaha</a>
                                <div class="widget-filter filter-cate">
                                    <ul class="dropdown-menu pd-left-30 pd-top-30">
                                        @foreach ($types as $type)
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
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @foreach ($users as $user)
                <div class="col-md-3 col-xs-12 mg-bottom-30 pengrajin-card"
                    data-type="{{ implode(',', $user->typeNames()->toArray()) }}">
                    <div class="card_pengrajin text-center">
                        <a href="{{ route('pengrajin.detail', ['id' => $user->id, 'name' => Str::slug($user->name)]) }}"><img
                                src="{{ asset('storage/' . $user->logo) }}" alt="Rumah Batik Probolinggo" /></a>
                        <div class="title_pengrajin">
                            <a
                                href="{{ route('pengrajin.detail', ['id' => $user->id, 'name' => Str::slug($user->name)]) }}">{{ $user->name }}</a>
                        </div>
                    </div>
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

            var $filteredResults = $('.pengrajin-card');

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

            $('.pengrajin-card').hide().filter($filteredResults).show();
        }

        $filterCheckboxes.on('change', filterFunc);
    </script>
@endsection
