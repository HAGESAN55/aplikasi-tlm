

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-4">

    <a href="<?php echo e(route('dashboard.index')); ?>" class="text-blue-600 font-semibold">Kembali</a>
    <h1 class="text-2xl font-bold mb-4">Data Pemeriksaan</h1>

    <div class="flex justify-between">
    <a href="<?php echo e(route('periksa.add')); ?>" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ">
        + Buat Pemeriksaan
    </a>

    
    <?php if(session('success')): ?>
    <div id="success-message" class="inset-0 flex items-center justify-center bg-green-200 text-green-700 py-2 px-4 rounded-lg">
        <?php echo e(session('success')); ?>

    </div>

    <script>
    setTimeout(function() {
        let message = document.getElementById('success-message');
        if (message) {
            message.style.opacity = '0';
            setTimeout(() => message.remove(), 500); // Hapus elemen setelah fade out
        }
    }, 3000);
    </script> 
    <?php endif; ?>
    </div>

    <form method="get" action="<?php echo e(route('pemeriksaan.index')); ?>" class="m-4">
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
                <th class="py-3 px-6 text-left">NO</th>
                <th class="py-3 px-6 text-left">Bidang Pemeriksaan</th>
                <th class="py-3 px-6 text-left">Jenis Pemeriksaan</th>
                <th class="py-3 px-6 text-left">Sub Pemeriksaan</th>
                <th class="py-3 px-6 text-left">Nilai Normal</th>
                <th class="py-3 px-6 text-left">Satuan</th>
                <th class="py-3 px-6 text-left">Tarif</th>
                <th class="py-3 px-6 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm">
            <?php $__currentLoopData = $pemeriksaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $periksa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-center"><?php echo e($periksa->id_pemeriksaan); ?></td>
                <td class="py-3 px-6"><?php echo e($periksa->bidang_p); ?></td>
                <td class="py-3 px-6"><?php echo e($periksa->jenis_p); ?></td>
                <td class="py-3 px-6"><?php echo e($periksa->sub_p); ?></td>
                <td class="py-3 px-6"><?php echo e($periksa->nilai_normal); ?></td>
                <td class="py-3 px-6"><?php echo e($periksa->satuan); ?></td>
                <td class="py-3 px-6">Rp.<?php echo e(number_format($periksa->tarif, 0, ',', '.')); ?></td>
                <td class="py-3 px-6">
                    <div class="flex flex-col space-y-2">
                        <a href="<?php echo e(route('periksa.edit', $periksa->id_pemeriksaan)); ?>" class='bg-yellow-500 hover:bg-yellow-600 text-white p-2 px-4 rounded-full flex items-center justify-center'>
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="<?php echo e(route('periksa.destroy', $periksa->id_pemeriksaan)); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full flex items-center justify-center" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                <i class="fas fa-trash"></i> 
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
    <div class="mt-4">
        <?php echo e($pemeriksaan->appends(['perpage' => $perpage])->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-hb-web\htdocs\telm\resources\views/pemeriksaan/index.blade.php ENDPATH**/ ?>