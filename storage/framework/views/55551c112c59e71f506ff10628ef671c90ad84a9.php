<?php $__env->startSection('meta'); ?> <?php echo $__env->make('layout.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Dekorasi'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="slide v3">
            <div class="swiper-container" id="swiper_home">
                <div class="swiper-wrapper disabled">
                    <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide slide-home">
                            <div class="slider-with-caption">
                                <img src="<?php echo e(asset('storage/' . $banner->image)); ?>" alt="Rumah Batik Probolinggo">
                                <!-- <div class="slider-with-image-caption">
                                                                    <h1 class="slider-with-image-content">Canting</h1>
                                                                </div> -->
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
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
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <label class="form-check"><span><?php echo e($user->name); ?></span>
                                <input class="form-check-input" type="checkbox" onclick="getProduct(null)" name="user"
                                    value="<?php echo e($user->id); ?>" />
                                <span class="checkmark"></span>
                            </label>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <label class="form-check"><span><?php echo e($user->name); ?></span>
                                                <input class="form-check-input" type="checkbox" onclick="getProduct(null)"
                                                    name="user" value="<?php echo e($user->id); ?>" />
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <?php if(($key + 1) % 5 == 0): ?>
                                </ul>
                            </div>
                            <div class="col-md-15 col-lg-15 widget-filter filter-cate">
                                <ul>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <div class="col-xs-12 col-md-12">
                <center>
                    <div id="pagination"></div>
                </center>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/dekorasi.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1035615/public_html/resources/views/dekorasi.blade.php ENDPATH**/ ?>