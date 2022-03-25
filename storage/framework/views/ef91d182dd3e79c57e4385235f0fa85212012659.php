<?php
$users = App\User::orderBy('name', 'asc')->get();
$setting = App\Setting::first();
$format_number = explode('08', $setting->phone);
$format_number = '628' . $format_number[1];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta itemprop="name" content="<?php echo $__env->yieldContent('title'); ?> - <?php echo e($setting->name); ?>">
    <meta property="og:title" content="<?php echo $__env->yieldContent('title'); ?> - <?php echo e($setting->name); ?>">
    <meta name="twitter:title" content="<?php echo $__env->yieldContent('title'); ?> - <?php echo e($setting->name); ?>">
    <meta property="og:url" content="<?php echo e(Request::url()); ?>">


    <?php echo $__env->yieldContent('meta'); ?>
    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e($setting->name); ?></title>
    <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/png">
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/slick-theme.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/styles.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/mfb.min.css')); ?>">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <?php echo $__env->yieldContent('css'); ?>
    <script>
        const base_url = "<?php echo e(url('')); ?>";
        const token = "<?php echo e(csrf_token()); ?>";
    </script>
</head>

<body>
    <!-- floating menu -->
    
    <ul id="menu" class="mfb-component--br mfb-zoomin hidden-md hidden-lg" data-mfb-toggle="click">
        <li class="mfb-component__wrap">
            <a href="#" onclick="return false" data-mfb-label="Beli Produk"
                class="mfb-component__button--main btn-cart">
                <img src="<?php echo e(asset('img/shopping-cart.svg')); ?>" alt="Rumah Batik Probolinggo" srcset="" />
            </a>
            <ul class="mfb-component__list">
                <li>
                    <a href="<?php echo e($setting->shopee); ?>" data-mfb-label="Shopee"
                        class="mfb-component__button--child shopee">
                        <i class="icon-icons8-shopee mfb-component__child-icon"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e($setting->tokopedia); ?>" data-mfb-label="Tokopedia"
                        class="mfb-component__button--child toped">
                        <img src="<?php echo e(asset('img/tokopedia.png')); ?>" alt="Rumah Batik Probolinggo">
                    </a>
                </li>
                <li>
                    <a href="https://wa.me/<?php echo e($format_number); ?>" data-mfb-label="Whatsapp"
                        class="mfb-component__button--child wa">
                        <i class="fa fa-whatsapp mfb-component__child-icon"></i>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- push menu-->
    <div class="pushmenu menu-home5">
        <div class="menu-push">
            <span class="close-left js-close"><i class="ion-ios-close-empty f-40"></i></span>
            <div class="clearfix"></div>
            <form role="search" method="get" id="searchform" class="searchform" action="<?php echo e(route('search')); ?>">
                <div>
                    <label class="screen-reader-text" for="q"></label>
                    <input class="basicAutoComplete" type="text" placeholder="Contoh: Kemeja"
                        onfocus="this.placeholder=``" onblur="this.placeholder=`Contoh: Kemeja`" id="q"
                        autocomplete="off" name="search">
                    <input type="hidden" name="type" value="product">
                    <button type="submit" id="searchsubmit"><i class="ion-ios-search-strong"></i></button>
                </div>
            </form>
            <ul class="nav-home5 js-menubar">
                <li class="level1 dropdown">
                    <a href="/kain-batik">Kain Batik</a>
                    <span class="icon-sub-menu"></span>
                    <div class="menu-level1 js-open-menu">
                        <ul class="level1">
                            <?php
                                $kain_batik_categories = App\Category::where('type_id', 1)->get();
                            ?>
                            <?php $__currentLoopData = $kain_batik_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kain_batik_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $subcategories = App\Subcategory::where('category_id', $kain_batik_category->id)->get();
                                ?>
                                <li class="level2">
                                    <a
                                        href="<?php echo e(route('batik.category', ['category' => Str::slug($kain_batik_category->name)])); ?>"><?php echo e($kain_batik_category->name); ?></a>
                                    <ul class="menu-level-2">
                                        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="level3"><a
                                                    href="<?php echo e(route('product.all', ['type' => 'kain-batik', 'category' => Str::slug($kain_batik_category->name)])); ?>?subkategori=<?php echo e(Str::slug($subcategory->name)); ?>"
                                                    title=""><?php echo e($subcategory->name); ?></a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </li>
                <li class="level1 dropdown">
                    <a href="/busana">Busana</a>
                    <span class="icon-sub-menu"></span>
                    <div class="menu-level1 js-open-menu">
                        <ul class="level1">
                            <?php
                                $busana_categories = App\Category::where('type_id', 2)->get();
                            ?>
                            <?php $__currentLoopData = $busana_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $busana_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $subcategories = App\Subcategory::where('category_id', $busana_category->id)->get();
                                ?>
                                <li class="level2">
                                    <a
                                        href="<?php echo e(route('product.all', ['type' => 'busana', 'category' => Str::slug($busana_category->name)])); ?>"><?php echo e($busana_category->name); ?></a>
                                    <ul class="menu-level-2">
                                        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="level3"><a
                                                    href="<?php echo e(route('product.all', ['type' => 'busana', 'category' => Str::slug($busana_category->name)])); ?>?subkategori=<?php echo e(Str::slug($subcategory->name)); ?>"
                                                    title=""><?php echo e($subcategory->name); ?></a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </li>
                <li class="level1 dropdown">
                    <a href="/aksesoris">Aksesoris</a>
                    <span class="icon-sub-menu"></span>
                    <div class="menu-level1 js-open-menu">
                        <ul class="level1">
                            <li class="level2">
                                <ul class="menu-level-2">
                                    <?php
                                        $aksesoris_categories = App\Category::where('type_id', 3)->get();
                                    ?>
                                    <?php $__currentLoopData = $aksesoris_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aksesoris_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="level3"><a
                                                href="<?php echo e(route('product.all', ['type' => 'aksesoris', 'category' => Str::slug($aksesoris_category->name)])); ?>"
                                                title=""><?php echo e($aksesoris_category->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="level1 dropdown">
                    <a href="/dekorasi">Dekorasi</a>
                    <span class="icon-sub-menu"></span>
                    <div class="menu-level1 js-open-menu">
                        <ul class="level1">
                            <li class="level2">
                                <ul class="menu-level-2">
                                    <?php
                                        $dekorasi_categories = App\Category::where('type_id', 4)->get();
                                    ?>
                                    <?php $__currentLoopData = $dekorasi_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dekorasi_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="level3"><a
                                                href="<?php echo e(route('product.all', ['type' => 'dekorasi', 'category' => Str::slug($dekorasi_category->name)])); ?>"
                                                title=""><?php echo e($dekorasi_category->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="level1"><a href="bahan-batik">Bahan Batik</a></li>
                <li class="level1 dropdown">
                    <a href="<?php echo e(route('pengrajin')); ?>">Pengrajin</a>
                    <span class="icon-sub-menu"></span>
                    <div class="menu-level1 js-open-menu">
                        <ul class="level1">
                            <li class="level2">
                                <ul class="menu-level-2">
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="level3"><a
                                                href="<?php echo e(route('pengrajin.detail', ['id' => $user->id, 'name' => Str::slug($user->name)])); ?>"
                                                title=""><?php echo e($user->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </li>
                <li class="level1"><a href="/katalog">Katalog</a></li>
                <li class="level1"><a href="/coffee">Kopi</a></li>
                <li class="level1"><a href="/artikel">Artikel</a></li>
            </ul>

        </div>
    </div>
    <!-- end push menu-->
    <div class="wrappage">
        <header id="header" class="header-v2">
            <div id="hello" class="header-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <a href="/">
                                    <img src="<?php echo e(asset('storage/' . $setting->image)); ?>" alt="Logo Rumah Batik"
                                        style="width: 200px;">
                                </a>
                            </center>
                        </div>
                    </div>

                </div>
                <div class="container-fluid">
                    <div class="row flex align-items-center justify-content-between mg-top-30 list_menu" style="background: #1f5195">
                        <div class="col-md-4 col-xs-4 col-sm-4 col2 hidden-lg hidden-md">
                            <div class="topbar-right">
                                <div class="element">
                                    <a href="#" class="icon-pushmenu js-push-menu">
                                        <svg width="26" height="16" version="1.1" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 66 41" style="enable-background:new 0 0 66 41;"
                                            xml:space="preserve">
                                            <style type="text/css">
                                                .st0 {
                                                    fill: none;
                                                    stroke: #000000;
                                                    stroke-width: 3;
                                                    stroke-linecap: round;
                                                    stroke-miterlimit: 10;
                                                }

                                            </style>
                                            <g>
                                                <line class="st0" x1="1.5" y1="1.5" x2="64.5" y2="1.5" />
                                                <line class="st0" x1="1.5" y1="20.5" x2="64.5" y2="20.5" />
                                                <line class="st0" x1="1.5" y1="39.5" x2="64.5" y2="39.5" />
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <ul class="nav navbar-nav js-menubar hidden-xs hidden-sm">
                            <li class="level1 dropdown">
                                <a href="/kain-batik" title="">Jaket</a>
                                <span class="plus js-plus-icon"></span>
                                <div class="menu-level-1 dropdown-menu style5">
                                    <ul class="level1">
                                        <?php
                                            $kain_batik_categories = App\Category::where('type_id', 1)->get();
                                        ?>
                                        <?php $__currentLoopData = $kain_batik_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kain_batik_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $subcategories = App\Subcategory::where('category_id', $kain_batik_category->id)->get();
                                            ?>
                                            <li class="level2 col-6">
                                                <a
                                                    href="<?php echo e(route('batik.category', ['category' => Str::slug($kain_batik_category->name)])); ?>"><?php echo e($kain_batik_category->name); ?></a>
                                                <ul class="menu-level-2">
                                                    <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="level3"><a
                                                                href="<?php echo e(route('product.all', ['type' => 'kain-batik', 'category' => Str::slug($kain_batik_category->name)])); ?>?subkategori=<?php echo e(Str::slug($subcategory->name)); ?>"
                                                                title=""><?php echo e($subcategory->name); ?></a>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </li>
                            <li class="level1 dropdown">
                                <a href="/busana" title="">Parka</a>
                                <span class="plus js-plus-icon"></span>
                                <div class="menu-level-1 dropdown-menu style5">
                                    <ul class="level1">
                                        <?php
                                            $busana_categories = App\Category::where('type_id', 2)->get();
                                        ?>
                                        <?php $__currentLoopData = $busana_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $busana_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $subcategories = App\Subcategory::where('category_id', $busana_category->id)->get();
                                            ?>
                                            <li class="level2 col-6">
                                                <a
                                                    href="<?php echo e(route('product.all', ['type' => 'busana', 'category' => Str::slug($busana_category->name)])); ?>"><?php echo e($busana_category->name); ?></a>
                                                <ul class="menu-level-2">
                                                    <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="level3"><a
                                                                href="<?php echo e(route('product.all', ['type' => 'busana', 'category' => Str::slug($busana_category->name)])); ?>?subkategori=<?php echo e(Str::slug($subcategory->name)); ?>"
                                                                title=""><?php echo e($subcategory->name); ?></a>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </li>
                            <li class="level1 dropdown">
                                <a href="/aksesoris" title="">Vest</a>
                                <span class="plus js-plus-icon"></span>
                                <div class="menu-level-1 dropdown-menu style5">
                                    <ul class="level1">
                                        <li class="level2 col-6">
                                            <ul class="menu-level-2">
                                                <?php
                                                    $aksesoris_categories = App\Category::where('type_id', 3)->get();
                                                ?>
                                                <?php $__currentLoopData = $aksesoris_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aksesoris_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="level3"><a
                                                            href="<?php echo e(route('product.all', ['type' => 'aksesoris', 'category' => Str::slug($aksesoris_category->name)])); ?>"
                                                            title=""><?php echo e($aksesoris_category->name); ?></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </li>
                            
                            <li class="level1">
                                <a href="/coffee">Cara Order</a>
                            </li>
                            <li class="level1">
                                <a href="/artikel" title="">Faq</a>
                            </li>
                            <li class="level1">
                                <a href="/tentang" title="">About us</a>
                            </li>
                            <li class="level1">
                                <a onclick="setAutoComplete(); return false;" href="#" class="btn-cari search-popover"
                                    data-container="body" data-toggle="popover" data-placement="bottom"
                                    data-content='<form method="GET" action="<?php echo e(route('search')); ?>"><div class="input-group"><input type="text" class="form-control basicAutoComplete" placeholder="Contoh: Kemeja" onfocus="this.placeholder=``" onblur="this.placeholder=`Contoh: Kemeja`" name="search" autocomplete="off"><span class="input-group-btn"><button class="btn btn-search-in" type="submit"><i class="fa fa-search"></i></button></span></div></form>'
                                    data-html="true"><i class="fa fa-search"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- /header -->
        <!-- content -->
        <?php echo $__env->yieldContent('content'); ?>

        <!-- Footer -->
        <footer class="v1 bd-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-f">
                        <div class="row">
                                
                                
                            <div class="col-md-4 col-xs-6 col-f">
                                <h4>Media Sosial</h4>

                                <a href="<?php echo e($setting->facebook_link); ?>" class="sosmed" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="<?php echo e($setting->instagram_link); ?>" class="sosmed" target="_blank">
                                    <i class="fa fa-instagram"></i>
                                </a>
                                <a href="<?php echo e($setting->youtube); ?>" class="sosmed" target="_blank">
                                    <i class="fa fa-youtube-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </footer>
        <!-- End Footer -->
    </div>
    <a href="#" class="zoa-btn scroll_top"><i class="ion-ios-arrow-up"></i></a>
    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/countdown.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('js/mfb.min.js')); ?>"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo e(asset('js/typeahead.js')); ?>"></script>
    </script>
    <script>
        $(document).ready(function(params) {
            setAutoComplete();
        })

        function setAutoComplete() {
            setTimeout(() => {
                var elements = $('.basicAutoComplete');
                $.each(elements, function(index, e) {
                    $(e).typeahead({
                        source: function(query, result) {
                            $.ajax({
                                url: "<?php echo e(route('autocomplete')); ?>",
                                data: 'search=' + query,
                                dataType: "json",
                                type: "GET",
                                success: function(data) {
                                    result($.map(data, function(item) {
                                        return item;
                                    }));
                                }
                            });
                        }
                    });
                })
            }, 1000);
        }
    </script>
    <?php echo $__env->yieldContent('script'); ?>
</body>

</html>
<?php /**PATH E:\Laravel\rumah-batik\resources\views/layout/app.blade.php ENDPATH**/ ?>