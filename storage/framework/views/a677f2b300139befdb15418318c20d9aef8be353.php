<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('page', 'Data Master > Artikel > Tambah'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-lg-12 col-12 layout-spacing">
<h3 calss="mb-2">Tambah Artikel</h3>
<div class="statbox widget box box-shadow">
    <div class="widget-header">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
            </div>
        </div>
    </div>
    <div class="widget-content widget-content-area">
        <form action="<?php echo e(route('article.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group mb-4 mt-3">
                <label for="exampleFormControlFile1">Upload Gambar</label>
                <img src="" width="100%" class="mb-3" id="preview" required="">
                <input type="file" class="form-control-file" onchange="loadFile(event, 0)"
                    id="exampleFormControlFile1" name="image" required="">
            </div>
            <div class="form-group mb-4">
                <label for="formGroupExampleInput">Judul Artikel</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="title"
                    placeholder="Judul Artikel" required="">
            </div>
            <div class="form-group mb-4">
                <label for="exampleFormControlTextarea1">Isi</label>
                <textarea class="summernote form-control" id="summernote" rows="3" name="text"
                    required=""></textarea>
            </div>
            <div class="form-group mb-4">
                <label for="seo_title">Seo Title</label>
                <textarea class="form-control" id="seo_title" name="seo_title" placeholder=""
                    required=""></textarea>
            </div>
            <div class="form-group mb-4">
                <label for="seo_keyword">Seo Keyword</label>
                <textarea class="form-control" id="seo_keyword" name="seo_keyword" placeholder=""
                    required=""></textarea>
            </div>
            <div class="form-group mb-4">
                <label for="seo_description">Seo Description</label>
                <textarea class="form-control" id="seo_description" name="seo_description" placeholder=""
                    required=""></textarea>
            </div>

    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <a class="btn btn-danger mt-3" href="<?php echo e(route('article.index')); ?>"><i class="flaticon-cancel-12"></i>
                Back</a>
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
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            callbacks: {
                onImageUpload: function(image) {
                    attach(image[0]);
                },
                onMediaDelete: function(target) {
                    attachDestroy(target[0].src);
                }
            }
        });

        function attach(image) {
            var data = new FormData();
            data.append("image", image);
            data.append("_token", "<?php echo e(csrf_token()); ?>");
            $.ajax({
                url: '<?php echo e(route('article.attach.store')); ?>',
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "POST",
                success: function(url) {
                    $('#summernote').summernote("insertImage", url);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function attachDestroy(src) {
            $.ajax({
                data: {
                    src: src,
                    _token: "<?php echo e(csrf_token()); ?>"
                },
                type: "POST",
                url: '<?php echo e(route('article.attach.destroy')); ?>',
                cache: false,
                success: function(response) {
                    console.log(response);
                }
            });
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1035615/public_html/resources/views/article/create.blade.php ENDPATH**/ ?>