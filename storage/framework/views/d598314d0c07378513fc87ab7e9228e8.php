

<?php $__env->startSection('content'); ?>

<div class="container mx-auto p-4">
  <h1 class="text-2xl font-bold mb-4">Data Rekam Medis Pasien: <?php echo e($pasien->nama_pasien); ?></h1>
    <hr>

  <form id='form-reg-pasien' method="POST" action="<?php echo e(route('pemeriksaan.store', old('kd_reg', $pasien->kd_reg))); ?>" enctype='multipart/form-data' >
    <?php echo csrf_field(); ?>

    
    <div class="grid grid-cols-2 gap-4 mt-4">
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>Kode Registrasi</label>
                <input type="hidden" name="kd_reg" value="<?php echo e(session('kd_reg')); ?>">
                <input type="text" name="kd_reg" class="border p-2 w-full cursor-not-allowed focus:outline-none" value="<?php echo e(old('kd_reg', $pasien->kd_reg)); ?>" readonly>
            </div>
            
            <div class="form-group">
                <label>Nama Pasien</label>
                <input type="hidden" name="nama_pasien" value="<?php echo e(session('nama_pasien')); ?>">
                <input type="text" name="nama_pasien" class="border p-2 w-full cursor-not-allowed focus:outline-nones" value="<?php echo e(old('nama_pasien', $pasien->nama_pasien)); ?>" readonly>
            </div>
            
            <div class="form-group">
                <label>Kategori Pasien</label>
                <input type="text" name="kategori" class="border p-2 w-full cursor-not-allowed focus:outline-none" value="<?php echo e(old('kateg', $pasien->kateg ?$pasien->kateg->kategori : 'Tidak ada')); ?>" readonly>
            </div>
            
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <input type="text" name="jenis_kelamin" class="border p-2 w-full cursor-not-allowed focus:outline-none" value="<?php echo e(old('jenis_kelamin', $pasien->jenis_kelamin)); ?>" readonly>
            </div>
        </div>
        
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>Tanggal Registrasi</label>
                <input type="date" name="tgl_regis" class="border p-2 w-full cursor-not-allowed focus:outline-none" value="<?php echo e(old('tgl_regis', $pasien->tgl_regis)); ?>" readonly>
            </div>
            
            <div class="form-group">
                <label>Dokter Pengirim</label>
                <input type="text" name="id_dokter" class="border p-2 w-full cursor-not-allowed focus:outline-none" value="<?php echo e(old('dokter', $pasien->dokter ?$pasien->dokter->nama_dokter : "Tidak Ada")); ?>" readonly>
            </div>
            
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="border p-2 w-full cursor-not-allowed focus:outline-none" value="<?php echo e(old('alamat', $pasien->alamat)); ?>" readonly>
            </div>
            
            <div class="form-group">
                <label>Golongan Darah</label>
                <input type="text" name="goldar" class="border p-2 w-full cursor-not-allowed focus:outline-none" value="<?php echo e(old('goldar', $pasien->goldar)); ?>" readonly>
            </div>
        </div>
    </div>

    <div>
        <h1 class="text-2xl font-bold  mt-6">Form Input Pemeriksaan</h1>
    </div>
      <div x-data="{ openModal: false, selectedPemeriksaan: null }">
        <div class="grid grid-cols-2 gap-4 mt-4">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>Bidang Periksa</label>
                    <input type="hidden" name="id_pemeriksaan" :value="selectedPemeriksaan.id_pemeriksaan">
                    <input type="hidden" name='status' value="0">
                    <input type="text" name="bidang_p" id="bidang_p" class="border p-2 w-full" x-model="selectedPemeriksaan.bidang_p" required>
                </div>
                
                <div class="form-group">
                    <label>Pemeriksaan</label>
                    <input type="text" name="jenis_p" id="jenis_p" class="border p-2 w-full" x-model="selectedPemeriksaan.jenis_p" required>
                </div>
                
                <div class="form-group">
                    <label>Sub Periksa</label>
                    <input type="text" name="sub_p" id="sub_p" class="border p-2 w-full" x-model="selectedPemeriksaan.sub_p" required>
                </div>
                
                <div class="form-group">
                    <label>Nilai Normal</label>
                    <input type="text" name="nilai_normal" id="nilai_normal" class="border p-2 w-full" x-model="selectedPemeriksaan.nilai_normal" required>
                </div>
            </div>
            
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>Satuan</label>
                    <input type="text" name="satuan" id="satuan" class="border p-2 w-full" x-model="selectedPemeriksaan.satuan" required>
                </div>
                
                <div class="form-group">
                    <label>Tarif</label>
                    <input type="text" name="biaya" id="biaya" class="border p-2 w-full"  x-model="selectedPemeriksaan.biaya" required>
                </div>
                
                <div class="form-group">
                    <label>Hasil Pemeriksaan</label>
                    <input type="text" name="hasil" class="border p-2 w-full" required>
                </div>
                
                <div class="col-lg-6 mt-3">
                        <!-- Tombol untuk Membuka Modal -->
                        <button type="button" @click="openModal = true" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg">
                            Pilih
                        </button>
                        <?php if($pasien->status_pembayaran == "0"): ?>
                        <button id="form-reg-pasien" type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg shadow-mt-3" value='tambahkan'>
                            Tambah Data
                        </button>
                        <?php endif; ?>
                        <a href="<?php echo e(route('pasien.manage.index')); ?>" class="bg-gray-600 hover:bg-gray-700 text-white font-normal px-4 py-2 rounded-lg shadow-mt-3">Kembali</a>
                        <!-- Modal -->
                        <div x-show="openModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="bg-white p-6 rounded-lg shadow-lg  max-h-96 overflow-y-auto">
                                <h2 class="text-xl font-bold mb-4">Tambah Pasien</h2>
                            

                            <!-- Tabel Pemeriksaan -->
                            <table class="w-full border-collapse border border-gray-300">
                                <thead>
                                    <tr class="bg-gray-200">
                                        <th class="border p-2">No</th>
                                        <th class="border p-2">Bidang</th>
                                        <th class="border p-2">Jenis Pemeriksaan</th>
                                        <th class="border p-2">Sub</th>
                                        <th class="border p-2">Tarif</th>
                                        <th class="border p-2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $pemeriksaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="border p-2"><?php echo e($index + 1); ?></td>
                                        <td class="border p-2"><?php echo e($p->bidang_p); ?></td>
                                        <td class="border p-2"><?php echo e($p->jenis_p); ?></td>
                                        <td class="border p-2"><?php echo e($p->sub_p); ?></td>
                                        <td class="border p-2">Rp. <?php echo e(number_format($p->tarif, 0, ',', '.')); ?></td>
                                        <td class="border p-2">
                                            <button type="button"
                                            @click="selectedPemeriksaan = { 
                                                id_pemeriksaan: '<?php echo e($p->id_pemeriksaan); ?>',
                                                bidang_p: '<?php echo e($p->bidang_p); ?>', 
                                                jenis_p: '<?php echo e($p->jenis_p); ?>',
                                                sub_p: '<?php echo e($p->sub_p); ?>',
                                                nilai_normal: '<?php echo e($p->nilai_normal); ?>',
                                                satuan: '<?php echo e($p->satuan); ?>',
                                                biaya: '<?php echo e($p->tarif); ?>'
                                            };openModal = false;" 
                                                class="bg-green-500 text-white px-2 py-1 rounded-lg">
                                                Pilih
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>

                            <!-- Tombol tutup -->
                            <div class="mt-4 text-right">
                                <button @click="openModal = false" class="bg-red-500 text-white px-4 py-2 rounded-lg">
                                    Tutup
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
  </form>

   

        <div class="col-lg-1 col-md-1 col-span-2"> 
            <h1 class="text-2xl font-bold m-4">Detail Hasil Pemeriksaan</h1>

            <?php if($pasien->status_pembayaran == "0"): ?>
            <form action="<?php echo e(route('pemeriksaan.update', $pasien->kd_reg)); ?>" id='form-bayar' method="POST">
            <?php echo csrf_field(); ?>
            <div class="mt-3">
                <label>Masukkan uang pembayaran</label>
            </div>
            <div class="mt-3">
                <input type="hidden" name="kd_reg" id="kd_reg" value="<?php echo e($pasien->kd_reg); ?>">
                <input type="text" name="bayar" id="bayar" class="border p-2 w-full m-4">
                <button id="form-bayar" type="submit" class='bg-blue-500 text-white px-6 py-2 rounded-lg'>Bayar</button>
            </div>
            </form>
            <?php else: ?>
            <div style="display: flex; gap: 20px;">
            <form action="<?php echo e(route('print.hasil')); ?>" method="get" id='print-hasil' target='_blank'>
                <?php echo csrf_field(); ?>
                <input type="hidden" name="kd_reg" id="kd_reg" value="<?php echo e($pasien->kd_reg); ?>">
                <button id="print-hasil" type="submit" class='bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg'>Print Hasil</button>
            </form>
            <form action="<?php echo e(route('print.kwitansi')); ?>" method="get" id='print-kwitansi' target='_blank'>
                <?php echo csrf_field(); ?>
                <input type="hidden" name="kd_reg" id="kd_reg" value="<?php echo e($pasien->kd_reg); ?>">
                <button id="print-kwitansi" type="submit" class='bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg'>Print Kwitansi</button>
            </form>
            </div>
            <?php endif; ?>

        </div>


        <div class="col-lg-1 col-md-1 col-span-2">
            <table class="table-auto bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leadong-normal">
                    <th class="px-6 text-left py-2">NO</th>
                    <?php if($pasien->status_pembayaran == "0" && count($transaksi) != 0): ?>
                    <th class="px-6 text-center-py-2">Aksi</th>
                    <?php endif; ?>
                    <th class="px-6 text-left py-2">Bidang Pemeriksaan</th>
                    <th class="px-6 text-left py-2">Periksa</th>
                    <th class="px-6 text-left py-2">Sub Periksa</th>
                    <th class="px-6 text-left py-2">Hasil Pemeriksaan</th>
                    <th class="px-6 text-left py-2">Nilai Normal</th>
                    <th class="px-6 text-right py-2">Tarif</th>
                </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    <?php
                        ?>
                    <?php $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-6 py-2"><?php echo e($index+=1); ?></td>
                        <?php if($pasien->status_pembayaran == "0" && count($transaksi) != 0): ?>
                        <td class="px-6 py-2">
                            <form action="<?php echo e(route('transaksi.destroy', $data->id_transaksi)); ?>" method="POST" id='hps-trs'onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded" id='hps-trs'>Hapus</button>
                            </form>
                        </td>
                        <?php endif; ?>
                        <td class="px-6 py-2"><?php echo e($data->pemeriksaan ? $data->pemeriksaan->bidang_p : "Tidak ada"); ?></td>
                        <td class="px-6 py-2"><?php echo e($data->pemeriksaan ? $data->pemeriksaan->jenis_p : "Tidak ada"); ?></td>
                        <td class="px-6 py-2"><?php echo e($data->pemeriksaan ? $data->pemeriksaan->sub_p : "Tidak ada"); ?></td>
                        <td class="px-6 py-2"><?php echo e($data->hasil); ?></td>
                        <td class="px-6 py-2"><?php echo e($data->pemeriksaan ? $data->pemeriksaan->nilai_normal : "Tidak ada"); ?></td>
                        <td class="px-6 py-2 text-right"><?php echo e($data->pemeriksaan ? $data->pemeriksaan->tarif : "Tidak ada"); ?></td>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-b bg-gray-200 text-gray-600 font-bold hover:bg-gray-100">
                        <?php if(count($transaksi) == 0): ?>
                            <td class="px-6 py-2 text-right" colspan="6">Total</td>
                        <?php elseif(count($transaksi) > 0 && $pasien->status_pembayaran == "0"): ?>
                            <td class="px-6 py-2 text-right" colspan="7">Total</td>
                        <?php else: ?>
                            <td class="px-6 py-2 text-right" colspan="6">Total</td>
                        <?php endif; ?>
                        <td class="px-6 py-2 text-right">Rp. <?php echo e(number_format($total, 0, ',', '.')); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-hb-web\htdocs\telm\resources\views/pemeriksaan/proses.blade.php ENDPATH**/ ?>