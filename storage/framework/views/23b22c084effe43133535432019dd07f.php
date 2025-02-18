<!DOCTYPE html>
<html>
<head>
    <title>Hasil Pemeriksaan Laboratorium</title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/logo hb.png')); ?>">
</head>
<body>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 10pt;
        }
    </style>

    <img src="<?php echo e(asset('images/KOP.JPG')); ?>" width="100%">
    <hr size="3">
    <h3 align="center">HASIL PEMERIKSAAN LABORATORIUM</h3>

    <br/>
    <table>
            <tr>
                <td width="150">NO RM</td>
                <td>:</td>
                <td width="200"><?php echo e($pasien->kd_reg); ?></td>
                <td width="150">Pengirim</td>
                <td>:</td>
                <td><?php echo e($pasien->dokter ?$pasien->dokter->nama_dokter : 'Tidak ada Dokter'); ?></td>
            </tr>
            <tr>
                <td>Tgl.Registrasi</td>
                <td>:</td>
                <td><?php echo e($pasien->tgl_regis); ?></td>
                <td>Kategori Pasien</td>
                <td>:</td>
                <td><?php echo e($pasien->kateg ?$pasien->kateg->kategori :  'Tidak Ada Kategori'); ?></td>
            </tr>
            <tr>
                <td>Nama Pasien</td>
                <td>:</td>
                <td><?php echo e($pasien->nama_pasien); ?></td>
                <td>Gender</td>
                <td>:</td>
                <td><?php echo e($pasien->jenis_kelamin); ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo e($pasien->alamat); ?></td>
                <td>Jam Cetak</td>
                <td>:</td>
                <td>
                    <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $tgl = date('H:i:s');
                        echo $tgl;
                    ?>
                </td>
            </tr>
    </table>

    <br/>
    <table class="table-data">
        <thead>
            <tr>
                <th height="30px">BIDANG</th>
                <th>PEMERIKSAAN</th>
                <th>SUB PERIKSA</th>
                <th>HASIL</th>
                <th>NILAI NORMAL</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="padding: 5px; text-align: center;"><?php echo e($data->pemeriksaan ? $data->pemeriksaan->bidang_p : "Tidak ada"); ?></td>
                    <td style="padding: 5px; text-align: center;"><?php echo e($data->pemeriksaan ? $data->pemeriksaan->jenis_p : "Tidak ada"); ?></td>
                    <td style="padding: 5px; text-align: center;"><?php echo e($data->pemeriksaan ? $data->pemeriksaan->sub_p : "Tidak ada"); ?></td>
                    <td style="padding: 5px; text-align: center;"><?php echo e($data->hasil); ?></td>
                    <td style="padding: 5px; text-align: center;"><?php echo e($data->pemeriksaan ? $data->pemeriksaan->nilai_normal : "Tidak ada"); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <br/>
    <table>
        <tr>
            <td width="400"></td>
            <td width="400" align="center">
                Tanggal Cetak :
                <?php
                    date_default_timezone_set('Asia/Jakarta');
                    $tgl = date('Y-m-d');
                    echo $tgl;
                ?>
            </td>
        </tr>
        <tr>
            <td align="center">Penanggung Jawab</td>
            <td align="center">Analisis Pemeriksa</td>
        </tr>
        <tr>
            <td align="center" height="150">(..................................)</td>
            <td align="center">(..................................)</td>
        </tr>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html><?php /**PATH C:\xampp-hb-web\htdocs\telm\resources\views/print/hasil.blade.php ENDPATH**/ ?>