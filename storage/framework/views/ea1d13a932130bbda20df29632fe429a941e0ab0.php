
<?php $__env->startSection('meta'); ?> <?php echo $__env->make('layout.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/faq.css')); ?>">
<style>

    body {
        font-family: "Helvetica", sans-serif;
        font-size: 14px;
        line-height: 1.428571429;
        color: #222222;
        background-color: #f9f9f9;
    }
    .panel-heading .panel-title a {
        /* font-family: "Eina", sans-serif; */
        margin-top: 0;
        margin-bottom: 0;
        font-size: 16px;
        color: #07100b;
    }

</style>
<?php $__env->stopSection(); ?>

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
                
            </div>
        </div>
        <div class="mg-top-30 mg-bottom-30">
            <div class="text-center">
                <a href="/artikel" class="btn-loadmore">Lihat Semua Artikel &nbsp;&nbsp;&nbsp;<i
                        class="fa fa-angle-right right"></i></a>
            </div>
        </div>

        <div class="container">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                href="#collapseOne">
                                Collapsible Group Item #1
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                            squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                            single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                            beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                            lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
                            probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                href="#collapseTwo">
                                Collapsible Group Item #2
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                            squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                            single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                            beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                            lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
                            probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- end container -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\rumah-ebes\resources\views/index.blade.php ENDPATH**/ ?>