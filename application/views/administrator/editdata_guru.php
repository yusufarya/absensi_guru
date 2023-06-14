<?php
if ($guru->status == 1) {
    $status = "Aktif";
} else {
    $status = "Tidak Aktif";
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="ml-2"><?php echo $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?php echo $title ?></a></li>
                        <li class="breadcrumb-item active">Administrator</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ml-2">
            <!-- Small boxes (Stat box) -->
            <form method="POST" action="<?php echo base_url('admin/updateDataUser/') ?><?php echo $guru->kode ?>">
                <div class="row py-2">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="type" value="guru">
                            <input type="hidden" class="form-control" id="kode" name="kode" value="<?php echo $guru->kode ?>">
                            <label for="nama" class="ml-1">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $guru->nama ?>">
                        </div>
                        <div class="form-group">
                            <label for="nip" class="ml-1">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $guru->nip ?>">
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir" class="ml-1">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $guru->tempat_lahir ?>">
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir" class="ml-1">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $guru->tgl_lahir; ?>">
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="ml-1">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $guru->alamat ?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-5 ml-2">
                        <div class="form-group">
                            <label for="jenis_kel" class="ml-1">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="jenis_kel" name="jenis_kel" value="<?php echo $guru->jenis_kel ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email" class="ml-1">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $guru->email ?>" autocomplete="off" readonly>
                        </div>
                        <div class="form-group">
                            <label for="level_id" class="ml-1">Level</label>
                            <select name="level_id" id="level_id" class="form-control" readonly> 
                                <?php foreach ($level as $key => $value) : ?>
                                    <option value="<?php echo $value['id'] ?>" <?= $guru->level_id == $value['id'] ? 'selected' : '' ?> ><?php echo $value['level'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status" class="ml-1">Status</label>
                            <select name="status" id="status" class="form-control"> 
                                <option value="1" <?= $guru->status == 1 ? 'selected' : '' ?> >Aktif</option>
                                <option value="0" <?= $guru->status == 0 ? 'selected' : '' ?> >Tidak aktif</option>
                            </select>
                        </div>

                    </div>
                </div>
                <a href="<?php echo base_url('dataguru') ?>" class="btn btn-dark"> <i class="fa fa-chevron-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary"> <i class="fa fa-share-square" aria-hidden="true"></i> Simpan</button>
            </form>
            <br>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->