<?php
$setting = App\Setting::first();
?>
<meta name="description" content="<?php echo e($setting->description); ?>">
<meta name="keyword" content="<?php echo e($setting->seo_keyword); ?>">

<!-- Google / Search Engine Tags -->
<meta itemprop="description" content="<?php echo e($setting->description); ?>">
<meta itemprop="image" content="<?php echo e(asset('storage/' . $setting->image)); ?>">

<!-- Facebook Meta Tags -->
<meta property="og:type" content="website">
<meta property="og:description" content="<?php echo e($setting->description); ?>">
<meta property="og:image" content="<?php echo e(asset('storage/' . $setting->image)); ?>">

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:description" content="<?php echo e($setting->description); ?>">
<meta name="twitter:image" content="<?php echo e(asset('storage/' . $setting->image)); ?>">
<?php /**PATH E:\Laravel\rumah-batik\resources\views/layout/meta.blade.php ENDPATH**/ ?>