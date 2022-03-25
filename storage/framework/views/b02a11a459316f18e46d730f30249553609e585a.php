<?php $__env->startSection('meta'); ?> <?php echo $__env->make('layout.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('title', $user->name); ?>

<?php $__env->startSection('content'); ?>
    <input type="hidden" id="type_id" value="<?php echo e(Request::get('type_id')); ?>">
    <input type="hidden" id="user_id" value="<?php echo e(app('request')->route('user_id')); ?>">
    <div class="container container-content">
        <div class="profile-section">
            <div class="row">
                <div class="col-lg-3 col-sm-12 profile-image text-center">
                    <img src="<?php echo e(asset('storage/' . $user->logo)); ?>" alt="Rumah Batik Probolinggo" srcset="" class="w-100">
                </div>
                <div class="col-lg-6">
                    <div class="pd-left-15 pd-right-15">
                        <h1 class="shop-name mg-bottom-15 text-capitalize"><?php echo e($user->name); ?> > <?php echo e($type->name); ?></h1>

                        <div>
                            <hr class="separator">
                        </div>
                        <?php
                            $user_types = $user->typeNames();
                        ?>
                        <?php $__empty_1 = true; $__currentLoopData = $user_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class=" mg-bottom-0 badge shop-type text-capitalize"><?php echo e($user_type); ?></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <?php endif; ?>
                        <div>
                            <hr class="separator">
                        </div>

                        <p class="shop-owner"><?php echo e($user->owner); ?></p>
                        <p><a class="shop-phone" href="tel:082210786904"><?php echo e($user->phone); ?></a></p>
                        <div class="shop-address mg-top-30"><?php echo $user->address; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop-top mg-top-30">
            <div class="filter-collection-left hidden-lg hidden-md">
                <a class="btn"><i class="zoa-icon-filter"></i> Filter berdasar Kategori</a>
            </div>
            <div class="col-xs-12 hidden-md hidden-lg col-left collection-sidebar" id="filter-sidebar">
                <div class="close-sidebar-collection hidden-lg hidden-md">
                    <span>Filter</span><i class="icon_close ion-close"></i>
                </div>
                <div class="widget-filter filter-cate no-pd-top">
                    <ul>
                        <?php if($type->id == 1 || $type->id == 2): ?>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-15 col-lg-15 widget-filter filter-cate">
                                    <?php if($category->is_choice == 1): ?>
                                        <label class="form-check"><span><?php echo e($category->name); ?></span>
                                            <input class="form-check-input" type="checkbox" name="category"
                                                value="<?php echo e($category->id); ?>" onclick="getProduct(null)" />
                                            <span class="checkmark"></span>
                                        </label>
                                    <?php else: ?>
                                        <p class="text-uppercase"><?php echo e($category->name); ?></p>
                                    <?php endif; ?>
                                    <ul>
                                        <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <label class="form-check"><span><?php echo e($subcategory->name); ?></span>
                                                    <input class="form-check-input" type="checkbox"
                                                        name="category<?php echo e($category->id); ?>"
                                                        value="<?php echo e($subcategory->id); ?>" onclick="getProduct(null)" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="col-md-15 col-lg-15 widget-filter filter-cate">
                                <ul>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <label class="form-check"><span><?php echo e($category->name); ?></span>
                                                <input class="form-check-input" type="checkbox" name="category"
                                                    value="<?php echo e($category->id); ?>" onclick="getProduct(null)" />
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="shop-element left">
                <ul class="js-filter">
                    <li class="filter filter-static hidden-xs hidden-sm">
                        <a><i class="zoa-icon-filter"></i>Filter berdasar Kategori</a>
                        <ul class="dropdown-menu fullw">
                            <?php if($type->id == 1 || $type->id == 2): ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-15 col-lg-15 widget-filter filter-cate">
                                        <?php if($category->is_choice == 1): ?>
                                            <label class="form-check"><span><?php echo e($category->name); ?></span>
                                                <input class="form-check-input" type="checkbox" name="category"
                                                    value="<?php echo e($category->id); ?>" onclick="getProduct(null)" />
                                                <span class="checkmark"></span>
                                            </label>
                                        <?php else: ?>
                                            <p class="text-uppercase"><?php echo e($category->name); ?></p>
                                        <?php endif; ?>
                                        <ul>
                                            <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <label class="form-check"><span><?php echo e($subcategory->name); ?></span>
                                                        <input class="form-check-input" type="checkbox"
                                                            name="category<?php echo e($category->id); ?>"
                                                            value="<?php echo e($subcategory->id); ?>" onclick="getProduct(null)" />
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <div class="col-md-15 col-lg-15 widget-filter filter-cate">
                                    <ul>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <label class="form-check"><span><?php echo e($category->name); ?></span>
                                                    <input class="form-check-input" type="checkbox" name="category"
                                                        value="<?php echo e($category->id); ?>" onclick="getProduct(null)" />
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="product-collection-grid product-grid bd-bottom pd-top-15">
            <div class="row engoc-row-equal" id="row-data">
            </div>
            <div class="col-xs-12 col-md-12">
                <center>
                    <div id="pagination"></div>
                </center>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/pengrajin_product.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1035615/public_html/resources/views/pengrajin_product.blade.php ENDPATH**/ ?>