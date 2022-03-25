<?php $__env->startSection('meta'); ?> <?php echo $__env->make('layout.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <!-- If we need navigation buttons -->


        <div class="slide v3">
            <div class="swiper-container" id="swiper_home">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide slide-home">
                            <img src="<?php echo e(asset('storage/' . $banner->image)); ?>" alt="Rumah Batik Probolinggo">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <!-- End content -->
    <div class="product-collection-grid product-grid pd-top-15">
        <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="container mg-bottom-30">
                <div class="row">
                    <div class="col-md-12 mg-bottom-30 mg-top-30">
                        <div class="title_custom text-center">
                            <h1 class="text-uppercase"><?php echo e($type->name); ?></h1>
                        </div>
                    </div>
                    <?php $__currentLoopData = $type->homeProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xs-12 col-md-3 product-item">
                            <div class="product-img">
                                <a
                                    href="<?php echo e(route('product.web.detail', ['id' => $product->product->id, 'name' => Str::slug($product->product->name)])); ?>"><img
                                        src="<?php echo e(asset('storage/' . $product->product->productImages[0]->image)); ?>"
                                        alt="<?php echo e($product->product->name); ?>" class="img-responsive" />
                                </a>
                            </div>
                            <div class="product-info text-center">
                                <div class="link_toko">
                                    <a href="<?php echo e(route('pengrajin.detail', ['id' => $product->product->user->id, 'name' => Str::slug($product->product->user->name)])); ?>"
                                        class="text-uppercase"><?php echo e($product->product->user->name); ?></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="<?php echo e(route('product.web.detail', ['id' => $product->product->id, 'name' => Str::slug($product->product->name)])); ?>"
                                        class="text-capitalize"><?php echo e($product->product->name); ?></a>
                                </h3>
                                <div class="product-price">
                                    <span>Rp<?php echo e($product->product->sell_price_format); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="text-center">
                    <a href="/<?php echo e(Str::slug($type->name)); ?>" class="btn-loadmore">Lihat Semua Produk
                        &nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right right"></i></a>
                </div>
            </div>
            <?php if($key + 1 != count($types)): ?>
                <div class="container mg-bottom-30">
                    <div class="row">
                        <div class="col-md-12">
                            <hr class="separator">
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="product-collection-grid product-grid pd-top-15" style="background-color: #F9F9F9;">
        <div class="container mg-bottom-30">
            <div class="row">
                <div class="col-md-12 mg-bottom-30 mg-top-30">
                    <div class="title_custom text-center">
                        <h1 style="color: #1a3352;">Artikel</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 col-xs-12">
                        <div class="card_article">
                            <img src="<?php echo e(asset('storage/' . $a->image)); ?>" alt="Rumah Batik Probolinggo" />
                            <div class="card_article_body">
                                <h4 class="text-uppercase">
                                    <a href="/artikel/<?php echo e($a->slug); ?>"><?php echo e($a->title); ?></a>
                                </h4>

                                <p>
                                    <?php echo substr(strip_tags($a->text), 0, 100); ?>...
                                </p>
                                <div class="article_more">
                                    <a href="/artikel/<?php echo e($a->slug); ?>">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="mg-top-30 mg-bottom-30">
            <div class="text-center">
                <a href="/artikel" class="btn-loadmore">Lihat Semua Artikel &nbsp;&nbsp;&nbsp;<i
                        class="fa fa-angle-right right"></i></a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/rumah-batik/resources/views/index.blade.php ENDPATH**/ ?>