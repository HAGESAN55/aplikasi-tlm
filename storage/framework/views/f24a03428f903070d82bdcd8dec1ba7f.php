

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-4">

    <a href="<?php echo e(route('dashboard.index')); ?>" class="text-blue-600 font-semibold">Kembali</a>

    <h1 class="text-2xl font-bold mb-4">Data Pasien</h1>
    <div class="flex justify-between mb-4">
      <a href="<?php echo e(route('pasien.create')); ?>" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ">
      + Registrasi Pasien
      </a>

      <?php if(session('success')): ?>
          <div id="success-message" class="fixed right-14 bg-green-200 text-green-700 py-2 px-4 rounded-lg">
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

    <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">NO</th>
                <th class="py-3 px-6 text-left">No RM</th> 
                <th class="py-3 px-6 text-left">Tgl Reg</th>
                <th class="py-3 px-6 text-left">Pasien</th>
                <th class="py-3 px-6 text-left">Kategori</th>
                <th class="py-3 px-6 text-left">Gender</th>
                <th class="py-3 px-6 text-left">Dokter</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm">
          <?php
            $sum =  0;
          ?>
            <?php $__currentLoopData = $pasien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6"><?php echo e($sum+=1); ?></td>
                <td class="py-3 px-6"><?php echo e($data->kd_reg); ?></td>
                <td class="py-3 px-6"><?php echo e($data->tgl_regis); ?></td>
                <td class="py-3 px-6"><?php echo e($data->nama_pasien); ?></td>
                <td class="py-3 px-6"><?php echo e($data->kateg ? $data->kateg->kategori : 'Tidak ada'); ?></td>
                <td class="py-3 px-6"><?php echo e($data->jenis_kelamin); ?></td>
                <td class="py-3 px-6"><?php echo e($data->dokter ?$data->dokter->nama_dokter : 'Tidak ada Dokter'); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table> 
    <div class="m-3">
        <a href="<?php echo e(route('pasien.manage.index')); ?>" class="rounded-lg px-4 py-2 text-white font-semibold bg-yellow-400 hover:bg-yellow-500">Manage Pasien</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-hb-web\htdocs\telm\resources\views/pasien/index.blade.php ENDPATH**/ ?>