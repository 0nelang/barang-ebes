<?php $__env->startSection('meta'); ?> <?php echo $__env->make('layout.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Artikel'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container" style="padding-bottom: 100px">
        <div class="row">
            <div class="col-md-12 mg-bottom-30 mg-top-30">
                <div class="title_custom text-center">
                    <h1>Artikel</h1>
                </div>
            </div>

            <div class="col-md-12">
                <?php $__currentLoopData = $artikel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

            <div class="col-md-12">
                <div class="text-center">
                    <?php echo $artikel->links(); ?>

                </div>
            </div>
            <!-- <div class="col-xs-12 col-md-12">
                <center>
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" tabindex="-1"><i class="fa fa-angle-left"></i></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link"><i class="fa fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </center>
            </div> -->

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app'
, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1035615/public_html/resources/views/artikel.blade.php ENDPATH**/ ?>