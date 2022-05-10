<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('page', 'Data Master > Produk > Edit'); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .custom-switch.custom-switch-md .custom-control-label {
            padding-left: 2rem;
            padding-bottom: 1.5rem;
        }

        .custom-switch.custom-switch-md .custom-control-label::before {
            height: 1.5rem;
            width: calc(2rem + 0.75rem);
            border-radius: 3rem;
        }

        .custom-switch.custom-switch-md .custom-control-label::after {
            width: calc(1.5rem - 4px);
            height: calc(1.5rem - 4px);
            border-radius: calc(2rem - (1.5rem / 2));
        }

        .custom-switch.custom-switch-md .custom-control-input:checked~.custom-control-label::after {
            transform: translateX(calc(1.5rem - 0.25rem));
        }

    </style>
    <div class="col-lg-12 col-12 layout-spacing">
        <h3 calss="mb-2">Edit Produk</h3>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="<?php echo e(route('product.update', ['product' => $product->id])); ?>" method="POST"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="user_id">Brand</label>
                                <select name="user_id" id="user_id" class="form-control select2" required>
                                    <option value="">Pilih Brand</option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>"
                                            <?php if($user->id == $product->user_id): ?> selected <?php endif; ?>><?php echo e($user->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="type_id">Pilih Jenis</label>
                                <select name="type_id" id="type_id" class="form-control select2" required
                                    onchange="getCategory()">
                                    <option value="">Pilih Jenis</option>
                                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($type->id); ?>"
                                            <?php if($type->id == $product->type_id): ?> selected <?php endif; ?>><?php echo e($type->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="kondisi">Pilih Kondisi</label>
                                <select name="kondisi" id="kondisi" class="form-control select2" required>
                                    <option value="">Pilih Kondisi</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>"
                                            <?php if($category->id == $product->kondisi): ?> selected <?php endif; ?>><?php echo e($category->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-5">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                        <th class="col-7    ">
                                            <div class="form-group">
                                                <label for="category_id">Kategori</label>
                                                <select id="category_id" class="form-control select2" onchange="getCode()"
                                                    name="category" disabled>
                                                    <option value="">Pilih Kategori</option>
                                                    <option value="atas"
                                                        <?php echo e($product->category == 'atas' ? 'selected' : ''); ?>>Atas
                                                    </option>
                                                    <option value="bawah"
                                                        <?php echo e($product->category == 'bawah' ? 'selected' : ''); ?>>Bawah
                                                    </option>
                                                </select>
                                            </div>
                                        </th>
                                        </th>
                                        <th class="col">
                                            <div class="form-group" style="padding-bottom: 1.5rem !important">
                                                <label for="code">Code</label>
                                                <input type="text" id="fakecode" name="code" value="<?php echo e($product->code); ?>"
                                                    class="form-control select2" disabled>
                                            </div>
                                        </th>
                                        
                                    </tr>
                                </thead>
                                <tbody id="data-detail">
                                    <?php $__currentLoopData = $product_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="detail<?php echo e($product_detail->id); ?>">
                                            <td><?php echo e($product_detail->category->name); ?></td>
                                            <td><?php echo e($product_detail->subcategory ? $product_detail->subcategory->name : ''); ?>

                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger"
                                                    onclick="deleteDetail(<?php echo e($product_detail->id); ?>)">-</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="name">Nama Produk</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Produk"
                                    required="" value="<?php echo e($product->name); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="price">Harga</label>
                                <input type="number" class="form-control" id="price" name="price"
                                    placeholder="Harga Produk" required="" value="<?php echo e($product->price); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="disc">Diskon</label>
                                <input type="number" class="form-control" id="disc" name="disc" placeholder="Diskon (%)"
                                    value="<?php echo e($product->disc); ?>" onblur="getSellPrice()">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="price">Harga Jual</label>
                                <input type="text" class="form-control" id="sell_price" name="sell_price" required=""
                                    readonly value="<?php echo e(number_format($product->sell_price)); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-control custom-switch custom-switch-md" style="margin-top: 2.5rem !important;">
                                <input type="checkbox" name="sold" class="custom-control-input" id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">Sold Out</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-4">
                                <label for="exampleFormControlTextarea1">Deskripsi</label>
                                <textarea class="form-control summernote" id="exampleFormControlTextarea1" rows="3" name="description"
                                    required=""><?php echo e($product->description); ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="disc">Tag</label>
                                <select name="tags[]" id="tags" class="form-control select2-tags" multiple>
                                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($tag); ?>"
                                            <?php if($product->tags): ?> <?php if(in_array(strtolower($tag), $product->tags)): ?>
                                                selected <?php endif; ?>
                                            <?php endif; ?>
                                            ><?php echo e($tag); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="shopee">Link Shopee</label>
                                <input type="text" class="form-control" id="shopee" name="shopee"
                                    placeholder="Kosongkan jika tidak ada" value="<?php echo e($product->shopee); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="tokopedia">Link Tokopedia</label>
                                <input type="text" class="form-control" id="tokopedia" name="tokopedia"
                                    placeholder="Kosongkan jika tidak ada" value="<?php echo e($product->tokopedia); ?>">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            
                            <div class="input-field">
                                <label class="active">Photos</label>
                                <div class="input-images-1" style="padding-top: .5rem;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <a class="btn btn-danger mt-3" href="<?php echo e(route('product.index')); ?>"><i
                                    class="flaticon-cancel-12"></i> Back</a>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/product.js')); ?>"></script>
    <script type="text/javascript">
        // $('.input-images-1').imageUploader();

        let preloaded = [
            <?php $__currentLoopData = $product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                {id: <?php echo e($product_image->id); ?>, src: '<?php echo e(asset("storage/" . $product_image->image)); ?>'},
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ];

        $('.input-images-1').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'photos',
            preloadedInputName: 'old'
        });
        
        var loadFile = function(event, no) {
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };

        $('.summernote').summernote({
            toolbar: [
                ['table', ['table']],
            ],
            height: 300,
            tabDisable: true
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\rumah-ebes\resources\views/product/edit.blade.php ENDPATH**/ ?>