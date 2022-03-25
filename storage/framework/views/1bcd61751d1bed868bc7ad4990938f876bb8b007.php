<?php
$setting = App\Setting::first();
?>

<?php $__env->startSection('meta'); ?>
    <meta name="description" content="<?php echo e(strip_tags($product->description)); ?>">
    <meta name="keyword" content="<?php echo e(implode(',', $product->tags ?? [])); ?>">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="description" content="<?php echo e(strip_tags($product->description)); ?>">
    <meta itemprop="image" content="<?php echo e(asset('storage/' . $product->productImages[0]->image)); ?>">

    <!-- Facebook Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:description" content="<?php echo e(strip_tags($product->description)); ?>">
    <meta property="og:image" content="<?php echo e(asset('storage/' . $product->productImages[0]->image)); ?>">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="<?php echo e(strip_tags($product->description)); ?>">
    <meta name="twitter:image" content="<?php echo e(asset('storage/' . $product->productImages[0]->image)); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', $product->name); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('lightgallery/lightgallery.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('lightgallery/lg-fb-comment-box.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('lightgallery/lg-transitions.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container container-content">
        <ul class="breadcrumb v2">
            <li><a href="/">Home</a></li>
            <li><a href="/<?php echo e(Str::slug($product->type->name)); ?>" class="text-uppercase"><?php echo e($product->type->name); ?></a>
            </li>
            <li class="active text-uppercase"><?php echo e($product->name); ?></li>
        </ul>
    </div>
    <div class="container container-content">
        <div class="single-product-detail">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="flex product-img-slide">
                        <div class="product-images">
                            <div class="main-img js-product-slider">
                                <?php $__currentLoopData = $product->productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="zoom">
                                        <center>
                                            <img src="<?php echo e(asset('storage/' . $image->image)); ?>"
                                                alt="<?php echo e($product->name); ?>" />
                                        </center>
                                    </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                        <div class="multiple-img-list-ver2 js-click-product slick-vertical">
                            <?php $__currentLoopData = $product->productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="product-col">
                                    <div class="img <?php echo e($key == 0 ? 'active' : ''); ?>">
                                        <img src="<?php echo e(asset('storage/' . $image->image)); ?>" alt="<?php echo e($product->name); ?>"
                                            class="img-responsive" />
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="single-product-info product-info product-grid-v2">
                        <h3 class="product-title"><a href="#"><?php echo e($product->name); ?></a>
                            <?php if($product->disc != 0): ?>
                                <div class="badge badge-primary"><span>-<?php echo e($product->disc); ?>%</span></div>
                            <?php endif; ?>
                        </h3>
                        <div class="link_toko">
                            <a href="<?php echo e(route('pengrajin.detail', ['id' => $product->user->id, 'name' => Str::slug($product->user->name)])); ?>"
                                class="text-uppercase"><?php echo e($product->user->name); ?></a>
                        </div>
                        <div class="product-price">
                            <?php if($product->disc): ?>
                                <span class="old thin">Rp<?php echo e(number_format($product->price)); ?></span>
                            <?php endif; ?>
                            <span>Rp<?php echo e($product->sell_price_format); ?></span>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <hr class="separator">
                            </div>
                        </div>
                        <div class="short-desc mg-top-15">
                            <div class="product-desc">
                                <?php echo $product->description; ?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <hr class="separator">
                            </div>
                        </div>
                        <div class="single-product-button-group mg-top-15">
                            <p>Beli Produk Melalui:</p>
                            <div class="flex align-items-center element-button button-orders">
                                <a target="_blank" href="https://<?php echo e($product->wa_link); ?>"
                                    class="zoa-btn zoa-addcart btn-order-wa">
                                    <i class="fa fa-whatsapp"></i>Whatsapp
                                </a>
                                <?php if($product->shopee): ?>
                                    <a target="_blank" href="<?php echo e($product->shopee); ?>"
                                        class="zoa-btn zoa-addcart btn-order-shopee">
                                        <img src="<?php echo e(asset('img/shopee.png')); ?>" alt="Rumah Batik Probolinggo" style="width: 16px" />Shopee
                                    </a>
                                <?php endif; ?>
                                <?php if($product->tokopedia): ?>
                                    <a target="_blank" href="<?php echo e($product->tokopedia); ?>"
                                        class="zoa-btn zoa-addcart btn-order-toped">
                                        <img src="<?php echo e(asset('img/tokopedia-black.png')); ?>" alt="Rumah Batik Probolinggo" style="width: 16px" />
                                        Tokopedia
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- End Footer -->
        <!-- EndContent -->
    </div>
    <?php if(count($others) > 0): ?>
        <div class="container container-content">
            <div class="row">
                <div class="col-md-12">
                    <hr class="separator">
                </div>
            </div>
            <div class="product-related">
                <h3 class="related-title text-center">PRODUK LAIN PENGRAJIN</h3>
                <div class="row">
                    <?php $__currentLoopData = $others; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xs-12 col-md-3 product-item">
                            <div class="product-img">
                                <a
                                    href="<?php echo e(route('product.web.detail', ['id' => $other->id, 'name' => Str::slug($other->name)])); ?>"><img
                                        src="<?php echo e(asset('storage/' . $other->productImages[0]->image)); ?>"
                                        alt="<?php echo e($other->name); ?>" class="img-responsive" /></a>
                            </div>
                            <div class="product-info text-center">
                                <div class="link_toko">
                                    <a href="<?php echo e(route('pengrajin.detail', ['id' => $other->user->id, 'name' => Str::slug($other->user->name)])); ?>"
                                        class="text-uppercase"><?php echo e($other->user->name); ?></a>
                                </div>
                                <h3 class="product-title">
                                    <a
                                        href="<?php echo e(route('product.web.detail', ['id' => $other->id, 'name' => Str::slug($other->name)])); ?>"><?php echo e($other->name); ?></a>
                                </h3>
                                <div class="product-price">
                                    <span>Rp<?php echo e(number_format($other->price)); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="mg-bottom-30">
                    <div class="text-center">
                        <a href="<?php echo e(route('pengrajin.detail', ['id' => $user->id, 'name' => Str::slug($user->name)])); ?>"
                            class="btn-loadmore">Lihat Semua Produk &nbsp;&nbsp;&nbsp;<i
                                class="fa fa-angle-right right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    
    <script src="<?php echo e(asset('js/jquery.zoom.js')); ?>"></script>
    
    
    
    
    
    
    
    
    
    
    
    
    <script>
        $(document).ready(function() {
            var images = $('.zoom');
            $.each(images, function(index, e) {
                $(e).zoom({
                    on: 'click'
                });
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\rumah-batik\resources\views/product_detail.blade.php ENDPATH**/ ?>