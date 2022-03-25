<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('page', 'Data Master > Banner > Tambah'); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-12 layout-spacing">
        <h3 calss="mb-2">Tambah Banner</h3>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="<?php echo e(route('banner.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-4 mt-3">
                        <label for="exampleFormControlFile1">Upload Gambar</label>
                        <img src="" width="100%" class="mb-3" id="preview" required="">
                        <input type="file" class="form-control-file" onchange="loadFile(event, 0)"
                            id="exampleFormControlFile1" name="image" required="">
                    </div>
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput">Kategori</label>
                        <select class="form-control" id="formGroupExampleInput" name="type_id">
                            <option value="">Halaman Home</option>
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type->id); ?>">Halaman <?php echo e($type->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput">Nama Banner</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="name"
                            placeholder="Nama Banner" required="">
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleFormControlTextarea1">Caption</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="caption"
                            required=""></textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <a class="btn btn-danger mt-3" href="<?php echo e(route('banner.index')); ?>"><i
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
    <script type="text/javascript">
        var loadFile = function(event, no) {
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1035615/public_html/resources/views/banner/create.blade.php ENDPATH**/ ?>