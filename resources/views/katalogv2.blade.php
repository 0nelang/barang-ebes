@php
$setting = App\Setting::first();
@endphp
<!DOCTYPE html>
<html lang="en" class="no-js gs">

<head>
    <script>
        (function(H) {
            H.className = H.className.replace(/\bno-js\b/, 'js')
        })(document.documentElement)
    </script>
    <meta charset="utf-8">
    <style>
        .js #katalog {
            margin-left: -12000px;
            width: 100%;
        }

    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title id="t">Katalog - {{ $setting->name }}</title>
    <meta name="description" content="Ininama Digital Magazine">
    <meta name="author" content="Team Ethics">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layout.meta')
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('e-catalog/css/wow_book.css') }} " type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('e-catalog/css/ethics.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('e-catalog/css/icon.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('e-catalog/css/animate.css') }} ">
    <link rel="stylesheet" media="screen" type="text/css" href="{{ asset('e-catalog/css/style.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('e-catalog/css/semantic.min.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('e-catalog/css/font-awesome.min.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('e-catalog/css/toastr.min.css') }} ">

    <style>
        #fbTopBar {
            display: none !important;
        }

    </style>
</head>

<body style="overflow: hidden">
    <iframe style="width:100%;height:100%" src="https://online.fliphtml5.com/nxajr/xyfg/" seamless="seamless"
        scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true"></iframe>
    {{-- <div class="container-fluid" style="height: 100vh">
        <div id="book-container" style="height: 100%; display:flex">
            <div id="main" style="margin: auto">
                <div id="katalog" class="buku">
                    @for ($i = 1; $i <= 98; $i++)
                        <div id="p{{ $i }}">
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="container" style="position: absolute; width:100%; bottom:0; left:0; z-index:100">
            <div class="row mg-bottom-10 mg-top-15">
                <div class="col-md-12 text-center">
                    <a target="_blank" href="{{ asset('e-catalog/katalog.pdf') }}" class="btn btn-primary">Download
                        Katalog</a>
                    <button class="btn btn-primary cov">
                        <i class="fa fa-angle-double-left"></i>
                    </button>
                    <button class="btn btn-primary prev">
                        <i class="fa fa-angle-left"></i>
                    </button>
                    <button class="btn btn-primary next">
                        <i class="fa fa-angle-right"></i>
                    </button>
                    <button class="btn btn-primary btn-zoomin">
                        <i class="fa fa-plus-circle"></i>
                    </button>
                    <button class="btn btn-primary btn-zoomout">
                        <i class="fa fa-minus-circle"></i>
                    </button>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Grab Google CDN's jQuery. fall back to local if necessary -->

    <!-- scripts concatenated and minified via ant build script-->
    {{-- <script type="text/javascript" src="{{ asset('e-catalog/js/jquery-3.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('e-catalog/js/jquery.hotkeys.js') }}"></script>
    <script type="text/javascript" src="{{ asset('e-catalog/js/hotkeys.js') }}"></script>
    <script type="text/javascript" src="{{ asset('e-catalog/js/clipboard.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('e-catalog/js/ethics.js') }}"></script>
    <script type="text/javascript" src="{{ asset('e-catalog/js/semantic.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('e-catalog/js/toastr.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('e-catalog/js/stats.js') }}"></script>
    <script type="text/javascript" src="{{ asset('e-catalog/js/wow_book.min.js') }}"></script> --}}
</body>

</html>
