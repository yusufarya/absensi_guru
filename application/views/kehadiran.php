<?php
$level = $guru['level_id'];
?>
<main class="px-3 mt-3">
    <div class="row mt-2 shadow justify-content-center">
        <p class="display-6 text-center mt-2">Riwayat Kehadiran</p>
        <div class="col-lg-10">
            <!-- <h5 class="ms-3"> Nama : &emsp; <?= $guru['nama'] ?></h5> -->
            <table class="table table-hover mt-2 mx-2">
                <tr class="text-white">
                    <th style="width: 6%;">No.</th>
                    <!-- <th>Nama</th> -->
                    <?php if ($level == '3') { ?>
                        <th>Mapel</th>
                    <?php } ?>
                    <th style="width: 13%;">Tanggal</th>
                    <th style="text-align: center; width: 14%;">Jam Masuk</th>
                    <?php if ($level == '2') { ?>
                        <th style="text-align: center; width: 14%;">Jam Keluar</th>
                    <?php } ?>
                    <th>Pertemuan</th>
                    <th>Semester</th>
                    <th>Status</th>
                </tr>
                <?php
                $no = 1;
                // echo "<pre>";
                // print_r();
                // print_r($kehadiran);
                // echo "</pre>"; 
                $kode_guru = $guru['kode'];
                foreach ($kehadiran as $k) :
                    if ($k->status == 'Y') {
                        $status = 'Hadir';
                    } else {
                        $status = 'Tidak Hadir';
                    }
                    if ($k->semester == '1') {
                        $semester = 'Ganjil';
                    } else {
                        $semester = 'Genap';
                    }
                    if ($kode_guru == $k->guru) { ?>
                        <tr class="text-white">
                            <td style="text-align: left;"><?php echo $no++ ?>.</td>
                            <!-- <td><?php echo $k->nama_guru ?></td> -->
                            <?php if ($level == '3') { ?>
                                <td><?php echo $k->mapel ?></td>
                            <?php } ?>
                            <td><?php echo date('d/m/Y', strtotime($k->tanggal)) ?></td>
                            <td style="text-align: center;"><?php echo $k->jam ?></td>
                            <?php if ($level == '2') { ?>
                                <td style="text-align: center;"><?php echo $k->jam_keluar ?></td>
                            <?php } ?>
                            <td><?php echo $k->mg_ke ?></td>
                            <td><?php echo $semester ?></td>
                            <td><?php echo $status ?></td>
                        </tr>
                <?php }
                endforeach; ?>
            </table>
        </div>
    </div>

</main>