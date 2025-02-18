

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-4">

    <a href="<?php echo e(route('dashboard.index')); ?>" class="text-blue-600 font-semibold">Kembali</a>
    <h1 class="text-2xl font-bold mb-4">Administrator</h1>

    <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">No</th>
                <th class="py-3 px-6 text-left">Nama Petugas</th> 
                <th class="py-3 px-6 text-left">Username</th>
                <th class="py-3 px-6 text-left">Password</th>
                <th class="py-3 px-6 text-left">Tanggal Daftar</th>
                <th class="py-3 px-6 text-left">Jenis Kelamin</th>
                <th class="py-3 px-6 text-left">Telepon</th>
                <th class="py-3 px-6 text-left">Alamat</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm">
            <?php $__currentLoopData = $admin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6"><?php echo e($data->id_petugas); ?></td>
                <td class="py-3 px-6"><?php echo e($data->nama_petugas); ?></td>
                <td class="py-3 px-6"><?php echo e($data->username); ?></td>
                <td class="py-3 px-6"><?php echo e($data->repassword); ?></td>
                <td class="py-3 px-6"><?php echo e($data->tgl_daftar); ?></td>
                <td class="py-3 px-6"><?php echo e($data->jenis_kelamin); ?></td>
                <td class="py-3 px-6"><?php echo e($data->telepon); ?></td>
                <td class="py-3 px-6"><?php echo e($data->alamat); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table> 

    <!-- Tambahkan Pagination -->
    <?php echo e($admin->appends(['perPage' => session('perPage', 10)])->links()); ?> 

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-hb-web\htdocs\telm\resources\views/admin/index.blade.php ENDPATH**/ ?>