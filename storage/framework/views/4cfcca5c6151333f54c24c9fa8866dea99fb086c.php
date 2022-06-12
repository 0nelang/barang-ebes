<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('page', 'Data Master > Produk'); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-lg-12">
        <h3 calss="mb-2">Daftar Produk</h3>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <a class="btn btn-primary mb-2 ml-3" href="<?php echo e(route('product.create')); ?>"><i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-plus-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="16"></line>
                            <line x1="8" y1="12" x2="16" y2="12"></line>
                        </svg>
                    </i> Tambah Produk</a>
                <div class="table-responsive mb-4">

                    

                    <table class="table table-bordered yajra-datatable style-3 table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Image</th>
                                <th>Pengrajin</th>
                                <th>Kategori</th>
                                <th>Nama Produk</th>
                                <th>Deskripsi</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(function() {

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "<?php echo e(route('getProduct')); ?>",
                "order": [
                    [0, "desc"]
                ],
                columns: [{
                        data: 'image',
                        name: 'image',
                        orderable: true,
                        searchable: true,
                        className: 'text-center product-img'
                    },
                    {
                        data: 'pengrajin',
                        name: 'pengrajin'
                    },
                    {
                        data: 'kategori',
                        name: 'kategori'
                    },
                    {
                        data: 'name',
                        name: 'nama produk'
                    },
                    {
                        data: 'deskripsi',
                        name: 'deskripsi'
                    },
                    // {
                    //     data: 'Nama Produk',
                    //     name: 'name'
                    // },
                    // {
                    //     data: 'Deskripsi',
                    //     name: 'description'
                    // },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true,
                        className: 'text-center'
                    },
                ]
            });

        });

        function doDelete(id) {

            Swal.fire({
                title: 'Yakin?',
                text: "Data yang terhapus tidak dapat di restore",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: global_url + '/product/' + id,
                        method: 'DELETE',
                        data: {
                            _token: token
                        },
                        dataType: 'json',
                        success: function(resp) {
                            window.location.href = global_url + '/product?&del_suc=1';
                        }
                    });
                }
            });

        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\rumah-ebes\resources\views/product/index.blade.php ENDPATH**/ ?>