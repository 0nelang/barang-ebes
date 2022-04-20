

<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('page', 'Data Master > Produk Home'); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-lg-12">
        <h3 calss="mb-2">Daftar Produk Home</h3>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive mb-4">
                    <table class="table style-3 table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Kategori Usaha</th>
                                <th>Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php $__empty_1 = true; $__currentLoopData = $home_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($b->type->name); ?></td>
                                    <td>
                                        <input type="hidden" id="home_product_id<?php echo e($b->id); ?>"
                                            value="<?php echo e($b->id); ?>">
                                        <select id="product_id<?php echo e($b->id); ?>" class="form-control"
                                            onchange="doUpdate(<?php echo e($b->id); ?>)">
                                            <?php $__currentLoopData = $b->type->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($product->id); ?>" <?php if($product->id == $b->product_id): ?> selected <?php endif; ?>>
                                                    <?php echo e($product->user->name); ?> - <?php echo e($product->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $('.table').dataTable({
            'ordering': false,
        });

        function doUpdate(id) {
            var homeProductId = $("#home_product_id" + id).val();
            var productId = $("#product_id" + id).val();

            var result = confirm("Apakah anda yakin akan mengubah data ini?");
            if (result) {
                $.ajax({
                    url: base_url + '/home-product/' + homeProductId,
                    method: 'POST',
                    data: {
                        _token: token,
                        product_id: productId,
                        _method: 'PUT',
                    },
                    dataType: 'json',
                    success: function(resp) {
                        alert("Berhasil mengubah data");
                    }
                });
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\lara\barang-ebes\resources\views/home_product/index.blade.php ENDPATH**/ ?>