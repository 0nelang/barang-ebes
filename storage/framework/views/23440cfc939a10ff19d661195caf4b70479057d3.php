
<?php $__env->startSection('meta'); ?>
    <meta name="description" content="<?php echo e($detail->seo_description); ?>">
    <meta name="keyword" content="<?php echo e($detail->seo_keyword); ?>">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="description" content="<?php echo e($detail->seo_description); ?>">
    <meta itemprop="image" content="<?php echo e(asset('storage/' . $detail->image)); ?>">

    <!-- Facebook Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:description" content="<?php echo e($detail->seo_description); ?>">
    <meta property="og:image" content="<?php echo e(asset('storage/' . $detail->image)); ?>">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="<?php echo e($detail->seo_description); ?>">
    <meta name="twitter:image" content="<?php echo e(asset('storage/' . $detail->image)); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', $detail->title); ?>

<?php $__env->startSection('content'); ?>
    <div class="container" style="padding-bottom: 100px">
        <div class="row article_head">
            <div class="col-md-12">
                <h1><?php echo e($detail->title); ?></h1>
                <span class="article_date"><i class="fa fa-calendar"></i>
                    &nbsp;<?php echo e(\Carbon\Carbon::parse($detail->created_at)->translatedFormat('d F Y')); ?></span>
            </div>
            <div class="col-md-12">
                <img src="<?php echo e(asset('storage/' . $detail->image)); ?>" alt="Rumah Batik Probolinggo" class="article_detail_img" />
            </div>
        </div>
        <div class="row mg-top-30 article_body">
            <div class="col-md-12">
                <div class="article_body_text">
                    <?php echo $detail->text; ?>

                </div>
            </div>
        </div>
    </div>
    <?php if(count($artikel) != 0): ?>
        <div class="container mg-bottom-30">
            <div class="row">
                <div class="col-md-12 mg-bottom-30 mg-top-30">
                    <div class="title_custom text-center">
                        <h1>Artikel Lainnya</h1>
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
                    <div class="text-center mg-top-30">
                        <a href="/artikel" class="btn-loadmore">Lihat Semua Artikel
                            &nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\lara\barang-ebes\resources\views/artikel_detail.blade.php ENDPATH**/ ?>