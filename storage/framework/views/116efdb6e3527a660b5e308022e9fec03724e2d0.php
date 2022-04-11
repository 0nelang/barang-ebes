

<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('page', 'Data Master > Artikel > Edit'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-lg-12 col-12 layout-spacing">
<h3 calss="mb-2">Edit Artikel</h3>
<div class="statbox widget box box-shadow">
    <div class="widget-header">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
            </div>
        </div>
    </div>
    <div class="widget-content widget-content-area">
        <form action="<?php echo e(route('article.update', $article->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name='_method' value="PUT">
            <div class="form-group mb-4 mt-3">
                <label for="exampleFormControlFile1">Upload Gambar</label>
                <img src="<?php echo e(asset('storage/' . $article->image)); ?>" width="100%" class="mb-3" id="preview">
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
                <label for="formGroupExampleInput">Judul Artikel</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="title"
                    placeholder="Nama Artikel" value="<?php echo e($article->title); ?>" required="">
            </div>
            <div class="form-group mb-4">
                <label for="exampleFormControlTextarea1">isi</label>
                <textarea class="summernote form-control" id="exampleFormControlTextarea1" rows="3" name="text"
                    required=""><?php echo e($article->text); ?></textarea>
            </div>
            <div class="form-group mb-4">
                <label for="seo_title">Seo Title</label>
                <textarea class="form-control" id="seo_title" name="seo_title"
                    required=""><?php echo e($article->seo_title); ?></textarea>
            </div>
            <div class="form-group mb-4">
                <label for="seo_keyword">Seo Keyword</label>
                <textarea class="form-control" id="seo_keyword" name="seo_keyword"
                    required=""><?php echo e($article->seo_keyword); ?></textarea>
            </div>
            <div class="form-group mb-4">
                <label for="seo_description">Seo Description</label>
                <textarea class="form-control" id="seo_description" name="seo_description"
                    required=""><?php echo e($article->seo_description); ?></textarea>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <a class="btn btn-danger mt-3" href="<?php echo e(route('article.index')); ?>"><i
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

    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\lara\barang-ebes\resources\views/article/edit.blade.php ENDPATH**/ ?>