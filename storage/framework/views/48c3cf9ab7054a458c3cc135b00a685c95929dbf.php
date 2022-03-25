<?php
$setting = App\Setting::first();
?>

<?php $__env->startSection('meta'); ?> <?php echo $__env->make('layout.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Tentang'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container container-content">
        <div class="zoa-about text-center">
            <div class="about-banner">
                <div class="">
                    <img src="<?php echo e(asset('storage/' . $about->image)); ?>" class="img-responsive fullw"
                        alt="Tentang Rumah Batik" />
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="about-content bd-bottom">
            <div class="row">
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="about-info">
                        <?php echo $about->text; ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="about-bottom bd-bottom">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 about-element">
                    <div class="social-media">
                        <a href="<?php echo e($setting->instagram_link); ?>">
                            <i class="fa fa-instagram"></i> <?php echo e($setting->instagram); ?>

                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 about-element">
                    <div class="social-media">
                        <a href="<?php echo e($setting->facebook_link); ?>">
                            <i class="fa fa-facebook"></i> <?php echo e($setting->facebook); ?>

                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 about-element">
                    <div class="social-media">
                        <a href="mailto:<?php echo e($setting->email); ?>">
                            <i class="fa fa-envelope"></i> <?php echo e($setting->email); ?>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\rumah-batik\resources\views/about.blade.php ENDPATH**/ ?>