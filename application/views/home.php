<?php

date_default_timezone_set('Asia/Jakarta');
$date = Date('Y/m/d');
// jam saat ini
$jam_sekarang = date('H:i:s');

$kode_absen = "SELECT * FROM absen";
$qryabs = $this->db->query($kode_absen)->row();
$batas_absen = $qryabs->batas_absen;
$kodeabs = $qryabs->kode_absen;
$qrys = "SELECT * FROM users where no_absen = '" . $no_absen . "'";
$k = $this->db->query($qrys)->row();
$s_id = $k->kode;
// echo $s_id;
$kehadiran_in = "SELECT * FROM kehadiran 
                WHERE guru = '" . $s_id . "' AND kode = '" . $kodeabs . "' AND mapel_id = '0' 
                AND tanggal = '" . date('Y-m-d') . "' ";
$hadir = $this->db->query($kehadiran_in)->row_array();

if ($hadir) {
    $sudahkahAbsenMasuk = 'Y';
} else {
    $sudahkahAbsenMasuk = 'N';
}
$kehadiran_out = "SELECT * FROM kehadiran 
                WHERE guru = '" . $s_id . "' AND kode = '" . $kodeabs . "' AND mapel_id = '0' 
                AND tanggal = '" . date('Y-m-d') . "' AND (jam_keluar <> '' OR jam_keluar IS NOT NULL )";
$hadir_out = $this->db->query($kehadiran_out)->row_array();

if ($hadir_out) {
    $sudahkahAbsenKeluar = 'Y';
} else {
    $sudahkahAbsenKeluar = 'N';
}
// print_r($sudahkahAbsenKeluar);
?>
<main class="px-0 mt-3">
    <div class="row px-4 justify-content-between" style="text-align: left;">
        <div class="col-lg-5 date p-3 shadow">
            <div class="row">
                <div class="col-lg-4 ms-5">
                    <h1 id="date"></h1>
                    <h1 id="month"></h1>
                    <h1 id="dateTime"></h1>
                </div>
                <div class="col-lg-5 ps-5">
                    <i style="font-size:77px;" class="bi bi-award-fill"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-6 ps-4 p-3 shadow" style="font-size: 15px;">
            <div class="row">
                <div class="col">
                    <h5 class='shadow px-2'>User Info</h5>
                    <table class="table-sm text-white ms-1">
                        <tr>
                            <td>Nama</td>
                            <td> &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; <?php echo $guru['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Nis</td>
                            <td> &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; <?php echo $guru['nip'] ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <?php
                            if ($guru['status'] > 0) {
                                $status = 'Aktif';
                            } else {
                                $status = 'Tidak aktif';
                            }
                            ?>
                            <td> &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; <?php echo $status ?></td>
                        </tr>
                    </table>
                </div>
                <?php if ($guru['level_id'] == 2) { ?>
                    <div class="col-md-3">
                        <?php if ($jam_sekarang >= $batas_absen) { ?>
                            <button style="margin-top: 90px; float: right;" class="btn btn-success me-3" disabled>Absen Telah Ditutup</button>
                        <?php } else { ?>
                            <?php if ($sudahkahAbsenMasuk == 'N') { ?>
                                <button style="margin-top: 90px; float: right;" onclick="getKdAbs('', <?php echo $guru['no_absen'] ?>)" class="btn btn-primary me-3">Absen Masuk</button>
                            <?php } else { ?>
                                <button style="margin-top: 90px; float: right;" class="btn btn-success me-3">Telah Absen</button>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="col-md-3">
                        <?php if ($sudahkahAbsenMasuk == 'Y' && $sudahkahAbsenKeluar == 'N') { ?>
                            <button style="margin-top: 90px; float: right;" onclick="getKdAbs_out(<?= $hadir['id'] ?>, <?php echo $guru['no_absen'] ?>)" class="btn btn-primary me-3">Absen Keluar</button>
                        <?php } else if ($sudahkahAbsenMasuk == 'Y' && $sudahkahAbsenKeluar == 'Y') { ?>
                            <button style="margin-top: 90px; float: right;" class="btn btn-success me-3">Telah Absen</button>
                        <?php } else { ?>
                            <button style="margin-top: 90px; float: right;" class="btn btn-dark me-3" disabled> Absen Keluar </button>
                        <?php } ?>
                    </div>
                <?php } ?>

            </div>
        </div>

        <?php if ($guru['level_id'] == '3') { ?>
            <div class="row text-white">
                <?php echo $this->session->flashdata('message') ?>
                <table class="table table-sm text-white mt-3">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Hari</th>
                            <th>Pelajaran</th>
                            <th>Nama Guru</th>
                            <th style="text-align: center;">Kelas</th>
                            <th style="text-align: center;">Jam Masuk</th>
                            <th style="text-align: center;">Sampai</th>
                            <th style="text-align: center; width: 10%;">Batas Absen</th>
                            <th style="text-align: center;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $hari_ini = $now;
                        foreach ($mapel as $m) :
                            $batas = $m->batas_absen;
                            $jam = $m->jam_mulai;
                            $mulai = substr($jam, 0, 5);
                            $batas = $m->batas_absen;
                            $batas_abs = substr($batas, 0, 5);
                            $sd = $m->jam_selesai;
                            $jam_selesai = substr($sd, 0, 5);

                            $kodeM = $m->kode_mapel;

                            if ($guru['kode'] == $m->users && $hari_ini == $m->hari) { ?>
                                <tr>
                                    <td><?php echo $kodeM ?></td>
                                    <td><?php echo $m->hari ?></td>
                                    <td><?php echo $m->pelajaran ?> </td>
                                    <td><?php echo $m->nama_guru ?></td>
                                    <td style="text-align: center;"><?php echo $m->kelas ?></td>
                                    <td style="text-align: center;"> <?php echo $mulai ?> </td>
                                    <td style="text-align: center;"> <?php echo $jam_selesai ?> </td>
                                    <td style="text-align: center; background: lightblue; color: #000000;"> <?php echo $batas_abs ?> </td>
                                    <?php
                                    $kode_absen = "SELECT * FROM absen";
                                    $qryabs = $this->db->query($kode_absen)->row();
                                    $kodeabs = $qryabs->kode_absen;
                                    $qrys = "SELECT * FROM users where no_absen = '" . $no_absen . "'";
                                    $k = $this->db->query($qrys)->row();
                                    $s_id = $k->kode;
                                    // echo $s_id;
                                    $kehadiran = "SELECT * FROM kehadiran where guru = '" . $s_id . "' and kode = '" . $kodeabs . "' and mapel_id = '" . $m->id . "'";
                                    $hadir = $this->db->query($kehadiran)->row_array();
                                    // var_dump($hadir);

                                    if ($hadir) {
                                        $kode = $hadir['kode'];
                                        $mapel_id = $hadir['mapel_id'];
                                        $s_id = $hadir['guru'];
                                    } else {
                                        $kode = '';
                                        $mapel_id = '';
                                        $s_id = '';
                                    }
                                    // echo '<pre>';
                                    // print_r($hadir);
                                    // echo '</pre>';
                                    // echo $hadir ." == ".$kode. '<br>';
                                    // echo $jam_sekarang . " == " . $m->jam_selesai . '<br>';
                                    // echo $jam_sekarang ." == ".$m->batas_absen. '<br>';
                                    if ($hadir == '' and $jam_sekarang <= $m->jam_selesai and $kode == '' and $s_id == '') { ?>
                                        <?php if ($hadir == '' and $jam_sekarang <= $m->batas_absen or $jam_sekarang <= $m->jam_mulai) { ?>
                                            <td style="text-align: center;" onclick="getKdAbs(<?php echo $m->id; ?>, <?php echo $guru['no_absen'] ?>)"><button class="btn btn-sm btn-danger">Absen</button></td>
                                        <?php } else if ($jam_sekarang <= $m->jam_mulai and $jam_sekarang <= $m->batas_absen) { ?>
                                            <td style="text-align: center;"><button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#" disabled>Belum mulai</button></td>
                                        <?php } else { ?>
                                            <td style="text-align: center;"><button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#">Absen ditutup</button></td>
                                        <?php } ?>
                                    <?php } else if ($hadir != '' and $kode != '' and $mapel_id != "" and $s_id != '' and $m->id == $mapel_id and $jam_sekarang <= $m->jam_selesai) { ?>
                                        <td style="text-align: center;"><button class="btn btn-sm btn-success">Telah Absen</button></td>
                                    <?php } else { ?>
                                        <td style="text-align: center;"><button class="btn btn-sm btn-dark" disabled>Telah selesai</button></td>
                                    <?php } ?>
                                    <!-- <td onclick="getKdAbs(<?php echo $m->id; ?>, <?php echo $guru['no_absen'] ?>)"><button class="btn btn-sm btn-danger">Absen</button></td> -->
                                    <td></td>

                                </tr>
                            <?php } ?>

                        <?php endforeach;
                        if ($hari_ini == 'Minggu') {
                            echo '<h1 style="background:red; margin-left:10px;">L I B U R</h1>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="modal_abs" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Absen Masuk ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModal"></button>
            </div>
            <!-- <form action="" method="POST"> -->
            <div class="modal-body" style="text-align: left;">
                <input type="hidden" name="mapel_id" id="mapel_id" class="form-control">
                <!-- <h5>Absen Masuk ?</h5> -->
            </div>
            <div class="modal-footer">
                <button type="button" id="absMasuk" class="btn btn-primary">Masuk</button>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>