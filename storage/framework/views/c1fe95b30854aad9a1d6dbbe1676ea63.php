


<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

            <a href="<?php echo e(route('dashboard.index')); ?>" class="text-blue-600 font-semibold">Kembali</a>
            <h1 class="text-2xl font-bold mb-4">Daftar Dokter</h1>

            <div class="flex justify-between mb-4">
                <table class="table-auto w-50 bg-white shadow-md rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">NO</th>
                            <th class="py-3 px-6 text-left">Nama Dokter</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm">
                        <?php $__currentLoopData = $dokter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ddoc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6"><?php echo e($index += 1); ?></td>
                            <td class="py-3 px-6"><?php echo e($ddoc->nama_dokter); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
        
            </div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-hb-web\htdocs\telm\resources\views/dokter/index.blade.php ENDPATH**/ ?>