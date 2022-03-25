<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('page', 'Data Master > Produk > Tambah'); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-12 layout-spacing">
        <h3 calss="mb-2">Tambah Produk</h3>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="<?php echo e(route('product.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="user_id">Pengrajin</label>
                                <select name="user_id" id="user_id" class="form-control select2" required>
                                    <option value="">Pilih Pengrajin</option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="type_id">Jenis Usaha</label>
                                <select name="type_id" id="type_id" class="form-control select2" required
                                    onchange="getCategory()">
                                    <option value="">Pilih Jenis Usaha</option>
                                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-5">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-group">
                                                <label for="category_id">Kategori</label>
                                                <select id="category_id" class="form-control select2"
                                                    onchange="getSubcategory()">
                                                    <option value="">Pilih Kategori</option>
                                                </select>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="form-group">
                                                <label for="subcategory_id">Subkategori</label>
                                                <select id="subcategory_id" class="form-control select2">
                                                    <option value="">Pilih Subkategori</option>
                                                </select>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="form-group mb-5">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="addProductDetail()">+</button>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="data-detail">

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="name">Nama Produk</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Produk"
                                    required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="price">Harga</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="Harga Produk"
                                    required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="disc">Diskon</label>
                                <input type="number" class="form-control" id="disc" name="disc" placeholder="Diskon (%)"
                                    value="0" onblur="getSellPrice()">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="price">Harga Jual</label>
                                <input type="number" class="form-control" id="sell_price" name="sell_price" value="0"
                                    required="" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-4">
                                <label for="exampleFormControlTextarea1">Deskripsi</label>
                                <textarea class="form-control summernote" id="exampleFormControlTextarea1" rows="3"
                                    name="description" required=""></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="disc">Tag</label>
                                <select name="tags[]" id="tags" class="form-control select2-tags" multiple>
                                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($tag); ?>"><?php echo e($tag); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="shopee">Link Shopee</label>
                                <input type="text" class="form-control" id="shopee" name="shopee"
                                    placeholder="Kosongkan jika tidak ada">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="tokopedia">Link Tokopedia</label>
                                <input type="text" class="form-control" id="tokopedia" name="tokopedia"
                                    placeholder="Kosongkan jika tidak ada">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4 mt-3">
                                <label for="exampleFormControlFile1">Upload Gambar</label>
                                <img src="" width="100%" class="mb-3" id="preview" required="">
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="images[]"
                                    required="" multiple max="5">
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

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1035615/public_html/resources/views/product/create.blade.php ENDPATH**/ ?>