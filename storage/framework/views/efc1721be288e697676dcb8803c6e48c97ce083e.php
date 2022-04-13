
<?php $__env->startSection('meta'); ?> <?php echo $__env->make('layout.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('title', $user->name); ?>

<?php $__env->startSection('content'); ?>
    <div class="container container-content">
        <div class="profile-section">
            <div class="row">
                <div class="col-lg-3 col-sm-12 profile-image text-center">
                    <img src="<?php echo e(asset('storage/' . $user->logo)); ?>" alt="Rumah Batik Probolinggo" srcset="" class="w-100">
                </div>
                <div class="col-lg-6">
                    <div class="pd-left-15 pd-right-15">
                        <h1 class="shop-name mg-bottom-15"><?php echo e($user->name); ?></h1>
                        <div>
                            <hr class="separator">
                        </div>
                        <?php
                            $types = $user->typeNames();
                        ?>
                        <?php $__empty_1 = true; $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class=" mg-bottom-0 badge shop-type text-capitalize"><?php echo e($type); ?></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <?php endif; ?>
                        <div>
                            <hr class="separator">
                        </div>
                        <p class="shop-owner mg-top-30"><?php echo e($user->owner); ?></p>
                        <p><a class="shop-phone" href="tel:082210786904"><?php echo e($user->phone); ?></a></p>
                        <div class="shop-address mg-top-30"><?php echo $user->address; ?></div>
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
                        <?php $__currentLoopData = $user_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <label class="form-check"><span><?php echo e($type->name); ?></span>
                                    <input class="form-check-input" type="checkbox" name="type"
                                        value="<?php echo e($type->name); ?>" />
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="shop-element left">
                <ul class="js-filter hidden-xs hidden-sm">
                    <li class="filter">
                        <a><i class="zoa-icon-filter"></i>Filter Produk Pengrajin</a>
                        <ul class="dropdown-menu pd-top-15 pd-left-30 pd-right-30">
                            <?php $__currentLoopData = $user_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <label class="form-check"><span><?php echo e($type->name); ?></span>
                                        <input class="form-check-input" type="checkbox" name="type"
                                            value="<?php echo e($type->name); ?>" />
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="product-collection-grid product-grid bd-bottom pd-top-15">
            <?php $__currentLoopData = $user_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div data-type="<?php echo e($type->name); ?>" class="type-card">
                    <div class="row engoc-row-equal mg-bottom-30">
                        <div class="col-md-12 mg-bottom-30 mg-top-30">
                            <div class="title_custom text-center">
                                <h1><?php echo e($type->name); ?></h1>
                            </div>
                        </div>
                        <?php $__currentLoopData = $type->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xs-12 col-md-3 product-item">
                                <div class="product-img">
                                    <a
                                        href="<?php echo e(route('product.web.detail', ['id' => $product->id, 'name' => Str::slug($product->name)])); ?>"><img
                                            src="<?php echo e(asset('storage/' . $product->productImages[0]->image)); ?>"
                                            alt="<?php echo e($product->name); ?>" class="img-responsive" />
                                    </a>
                                </div>
                                <div class="product-info text-center">
                                    <div class="link_toko">
                                        <a class="text-uppercase"><?php echo e($product->user->name); ?></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="<?php echo e(route('product.web.detail', ['id' => $product->id, 'name' => Str::slug($product->name)])); ?>"
                                            class="text-capitalize"><?php echo e($product->name); ?></a>
                                    </h3>
                                    <div class="product-price">
                                        <span>Rp<?php echo e($product->sell_price_format); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-12">
                            <div class="text-center">
                                <a href="<?php echo e(route('pengrajin.all.product', ['user_id' => app('request')->route('id')])); ?>?type_id=<?php echo e($type->id); ?>"
                                    class="btn-loadmore">Lihat Semua Produk
                                    &nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right right"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php if($key + 1 != count($user_types)): ?>
                        <div class="container mg-bottom-30">
                            <div class="row">
                                <div class="col-md-12">
                                    <hr class="separator">
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\lara\barang-ebes\resources\views/pengrajin_detail.blade.php ENDPATH**/ ?>