

<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('page', 'Data Master > Banner > Edit'); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-12 layout-spacing">
        <h2 calss="mb-2">Edit Banner</h2>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="<?php echo e(route('banner.update', $banner->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name='_method' value="PUT">
                    <div class="form-group mb-4 mt-3">
                        <label for="exampleFormControlFile1">Upload Gambar</label>
                        <img src="<?php echo e(asset('storage/' . $banner->image)); ?>" width="100%" class="mb-3" id="preview">
                        <input type="file" class="form-control-file" onchange="loadFile(event, 0)"
                            id="exampleFormControlFile1" name="image">
                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput">Kategori</label>
                        <select class="form-control" id="formGroupExampleInput" name="type_id">
                            <option value="" <?php echo e($banner->type_id == '' ? 'selected' : ''); ?>>Halaman Home</option>
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type->id); ?>" <?php echo e($banner->type_id == $type->id ? 'selected' : ''); ?>>
                                    Halaman <?php echo e($type->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput">Nama Banner</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="name"
                            placeholder="Nama Banner" value="<?php echo e($banner->name); ?>" required="">
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleFormControlTextarea1">Caption</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="caption"
                            required=""><?php echo e($banner->caption); ?></textarea>
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

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\lara\barang-ebes\resources\views/banner/edit.blade.php ENDPATH**/ ?>