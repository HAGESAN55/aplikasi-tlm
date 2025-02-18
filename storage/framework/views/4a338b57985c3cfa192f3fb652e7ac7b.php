

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-4">

    <a href="<?php echo e(route('dashboard.index')); ?>" class="text-blue-600 font-semibold">Kembali</a>
    <h1 class="text-2xl font-bold mb-4">Data Transaksi</h1>

    <form method="get" action="<?php echo e(route('transaksi.index')); ?>" class="mb-4">
        <label for="perpage">Tampilkan:</label>
        <select name="perpage" id="perpage" class="border rounded px-2 py-1" onchange="this.form.submit()">
            <option value="5" <?php echo e($perpage  == 5 ? 'selected' : ''); ?>>5</option>
            <option value="10" <?php echo e($perpage == 10 ? 'selected' : ''); ?>>10</option>
            <option value="20" <?php echo e($perpage == 20 ? 'selected' : ''); ?>>20</option>
        </select>
    </form>
    <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">No</th>
                <th class="py-3 px-6 text-left">No Pemeriksaan</th> 
                <th class="py-3 px-6 text-left">Kode Registrasi</th>
                <th class="py-3 px-6 text-left">Hasil</th>
                <th class="py-3 px-6 text-left">Biaya</th>
                <th class="py-3 px-6 text-left">Uang Bayar</th>
                <th class="py-3 px-6 text-left">Uang Kembali</th>
                <th class="py-3 px-6 text-left">Status</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm">
            <?php $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6"><?php echo e($data->id_transaksi); ?></td>
                <td class="py-3 px-6"><?php echo e($data->id_pemeriksaan); ?></td>
                <td class="py-3 px-6"><?php echo e($data->kd_reg); ?></td>
                <td class="py-3 px-6"><?php echo e($data->hasil); ?></td>
                <td class="py-3 px-6"><?php echo e($data->biaya); ?></td>
                <td class="py-3 px-6"><?php echo e($data->uang_bayar); ?></td>
                <td class="py-3 px-6"><?php echo e($data->uang_kembali); ?></td>
                <td class="py-3 px-6">
                    <?php if($data->status == "1"): ?>
                    <p class="bg-green-500 text-white rounded-md font-normal text-center py-2 shadow-md  w-full">Lunas</p>
                    <?php else: ?>
                    <p class="bg-red-500 text-white rounded-md font-normal text-center py-2 shadow-md w-full">Belum Lunas</p>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table> 

    <!-- Tambahkan Pagination -->
    <div class="mt-4">
        <?php echo e($transaksi->appends(['perPage' => $perpage])->links()); ?> 
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-hb-web\htdocs\telm\resources\views/transaksi/index.blade.php ENDPATH**/ ?>