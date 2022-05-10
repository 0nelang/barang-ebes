

<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('page', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="post">
                <div class="post-details">
                    <div class="post-content pt-2">
                        <h2 class="title mb-3"><a href="#">Selamat Datang, <?php echo e(Auth::user()->name); ?></a></h2>
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card stat-widget">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Produk</h5>
                                        <h2><?php echo e($total); ?></h2>
                                        <p>TOTAL</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card stat-widget">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Produk Ready</h5>
                                        <h2><?php echo e($total - $terjual); ?></h2>
                                        <p>TOTAL</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card stat-widget">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Produk Sold</h5>
                                        <h2><?php echo e($terjual); ?></h2>
                                        <p>TOTAL</p>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\rumah-ebes\resources\views/dashboard/index.blade.php ENDPATH**/ ?>