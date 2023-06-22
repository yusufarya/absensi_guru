<?php
if ($lvluser == 1) {
    $sysstatus = "Administrator";
} else if ($lvluser == 2) {
    $sysstatus = "Staff";
} else {
    $sysstatus = "Guru";
}
$qry = "SELECT abs.*, mg.nama as mgg FROM absen abs 
            JOIN kd_minggu mg on mg.kode=abs.kode_absen";
$query = $this->db->query($qry);
$data = $query->result();
$kd = $data[0]->kode_absen;
$mg = $data[0]->mgg;
$sm = $data[0]->semester;
$batas_absen = $data[0]->batas_absen;
if ($sm == '1') {
    $smst = 'Ganjil';
} else {
    $smst = 'Genap';
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-sm-6">
                    <h3 class="m-0"><?php echo $title ?></h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?php echo $title ?></a></li>
                        <li class="breadcrumb-item active"><?php echo $sysstatus ?></li>
                    </ol>
                </div><!-- /.col -->
                <hr>
            </div><!-- /.row -->
            <form action="<?php echo base_url('updatekdabs') ?>" method="post">
                <div class="row pb-3 pt-1 my-0">
                    <div class="col-lg-9 shadow p-2">
                        <?php echo $this->session->flashdata('message') ?>
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="hidden" name="id" value="1">
                                <label for="kode" class="ml-1">Minggu Ke?</label>
                                <select name="kode" id="kode" class="form-control">
                                    <?php foreach ($kodeAbs as $abs) : ?>
                                        <option value="<?= $abs['kode'] ?>" <?= $abs['kode'] == $kd ? 'selected' : '' ?>><?php echo $abs['kode'] . ' - ' . $abs['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div><br>
                            <div class="col-lg-3">
                                <label for="semester" class="ml-1">Semester ?</label>
                                <select name="semester" id="semester" class="form-control">
                                    <option value="1" <?= $sm == '1' ? 'selected' : '' ?>>1 - (Ganjil)</option>
                                    <option value="2" <?= $sm == '2' ? 'selected' : '' ?>>2 - (Genap)</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label for="batas_absen" class="ml-1">Batas Absen</label>
                                <input type="text" class="form-control" name="batas_absen" id="batas_absen" value="<?= $batas_absen ?>">
                            </div>
                            <div class="col-lg-1">
                                <label class="ml-2"></label>
                                <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i></button>
                            </div>
                            <div class="col-lg-1"></div>
                        </div>
                        <br>
                    </div>
                    <div class="col-lg-3 shadow p-2 px-4">
                        <p>Simpan absensi harian?</p>
                        <button type="button" class="btn btn-warning py-1" id="updateLap"><i class="fas fa-save"></i> Simpan Lap Absen</button>
                    </div>
                </div>

                <div class="row px-2">
                    <div id="notif"></div>
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Jenis Kel</th>
                                <th>Kelas</th>
                                <th>Jam</th>
                                <th>Mapel</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($hariiniAbs)) { ?>
                                <?php
                                $no = 1;
                                foreach ($hariiniAbs as $abs) {
                                    // echo '<pre>';
                                    // print_r($hariiniAbs);
                                    // echo '</pre>';
                                    $jam = substr($abs->jam, 0, 5);
                                    // if($admin['nama'] == $abs->guru){
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $abs->guru ?></td>
                                        <td><?= $abs->jenis_kel ?></td>
                                        <td><?= $abs->kelas ?></td>
                                        <td><?= $jam ?></td>
                                        <td><?= $abs->mapel ?></td>
                                        <?php
                                        $status = $abs->keterangan;
                                        if ($status == 'Hadir') { ?>
                                            <td style="color:green;"><strong><?php echo $status ?></strong></td>
                                        <?php } else { ?>
                                            <td style="color:red;"><strong><?php echo $status ?></strong></td>
                                        <?php } ?>
                                    </tr>
                                <?php }  ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
<!-- /.content-wrapper -->