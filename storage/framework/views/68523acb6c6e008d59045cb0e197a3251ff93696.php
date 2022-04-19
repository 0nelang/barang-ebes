

<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('page', 'Data Master > FAQ > Tambah'); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-12 layout-spacing">
        <h3 calss="mb-2">Tambah Faq</h3>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="<?php echo e(route('faq.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput">Judul Faq</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="pertanyaan"
                            placeholder="Judul Faq" required="">
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleFormControlTextarea1">Isi</label>
                        <textarea class="summernote form-control" id="summernote" rows="3" name="jawaban" required=""></textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <a class="btn btn-danger mt-3" href="<?php echo e(route('faq.index')); ?>"><i
                                    class="flaticon-cancel-12"></i> Back</a>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </div>
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
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\rumah-ebes\resources\views/faq/create.blade.php ENDPATH**/ ?>