<?php $__env->startSection('meta'); ?> <?php echo $__env->make('layout.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Incoming Page'); ?>

<?php $__env->startSection('content'); ?>
    <!-- content -->
    <input type="hidden" id="type_id" name="type_id" value="1">
    <input type="hidden" id="category_id" name="category_id" value="1">
    <input type="hidden" id="subcategory_id" name="subcategory_id" value="1">
    <div class="container container-content">
        <div class="row mg-top-30">
            <div class="col-md-12">
                <center>
                    <ul class="breadcrumb">
                        <li class="text-capitalize"><a href="">Kopi</a></li>
                        
                        
                        
                    </ul>
                </center>
            </div>
        </div>
    </div>
    <div class="container container-content">
        <div class="product-collection-grid product-grid bd-bottom">
            <div class="row engoc-row-equal" id="row-data">
                <div class="col-xs-12 col-md-3 product-item">
                    <div class="product-img">
                        <a href="#"><img src="<?php echo e(asset('img/kopi/1.png')); ?>" alt="Kopi Robusta Roast Bean - 100.000/Kg"
                                class="img-responsive"></a>
                    </div>
                    <div class="product-info text-center">
                        <div class="link_toko">
                            <a href="#" class="text-uppercase">Kopi Robusta Roast Bean</a>
                        </div>
                        <h3 class="product-title">
                            <a href="#">100.000/Kg</a>
                        </h3>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 product-item">
                    <div class="product-img">
                        <a href="#"><img src="<?php echo e(asset('img/kopi/2.png')); ?>" alt="Kopi Arabica Roast Bean - 150.000/Kg"
                                class="img-responsive"></a>
                    </div>
                    <div class="product-info text-center">
                        <div class="link_toko">
                            <a href="#" class="text-uppercase">Kopi Arabica Roast Bean</a>
                        </div>
                        <h3 class="product-title">
                            <a href="#">150.000/Kg</a>
                        </h3>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 product-item">
                    <div class="product-img">
                        <a href="#"><img src="<?php echo e(asset('img/kopi/3.png')); ?>" alt="Kopi Robusta Bubuk - 17.000/100gr"
                                class="img-responsive"></a>
                    </div>
                    <div class="product-info text-center">
                        <div class="link_toko">
                            <a href="#" class="text-uppercase">Kopi Robusta Bubuk</a>
                        </div>
                        <h3 class="product-title">
                            <a href="#">17.000/100gr</a>
                        </h3>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 product-item">
                    <div class="product-img">
                        <a href="#"><img src="<?php echo e(asset('img/kopi/1.png')); ?>" alt="Kopi Arabica Bubuk - 27.000/100gr"
                                class="img-responsive"></a>
                    </div>
                    <div class="product-info text-center">
                        <div class="link_toko">
                            <a href="#" class="text-uppercase">Kopi Arabica Bubuk</a>
                        </div>
                        <h3 class="product-title">
                            <a href="#">27.000/100gr</a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1035615/public_html/resources/views/coffee.blade.php ENDPATH**/ ?>