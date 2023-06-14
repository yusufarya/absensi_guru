<?php 
// print_r($guru);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="ml-2">Edit <?php echo $title ?></h1>
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
            <form method="POST" action="<?php echo base_url('Admin/UpdateMapelGuru/') ?><?php echo $guru->kode ?>">
                <div class="row py-2">
                    <div class="col-lg-6">
                        <div class="form-group"> 
                            <input type="hidden" class="form-control" id="mapel_old" name="mapel_old" value="<?php echo $guru->kode_mapel ? $guru->kode_mapel : '' ?>">
                            <input type="hidden" class="form-control" id="kode" name="kode" value="<?php echo $guru->kode ?>">
                            <label for="nama" class="ml-1">Nama Guru</label>
                            <input type="text" readonly class="form-control" id="nama" name="nama" value="<?php echo $guru->nama ?>">
                        </div>
                        <div class="form-group">
                            <label for="hari" class="ml-1">Mata Pelajaran</label>
                            <select class="form-select form-control" name="kode_mapel" id="kode_mapel">
                                <option value="">Pilih Pelajaran</option>
                                <?php foreach ($mapel as $key => $val): ?> 
                                    <option value="<?= $val->kode_mapel ?>" <?= $val->kode_mapel == $guru->kode_mapel ? 'selected' : '' ?>>
                                        <?= $val->kode_mapel . " - ". $val->pelajaran ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div> 
                    </div> 
                </div>
                <a href="<?php echo base_url('mapelGuru') ?>" class="btn btn-dark"> <i class="fa fa-chevron-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary"> <i class="fa fa-share-square" aria-hidden="true"></i> Simpan</button>
            </form>
            <br>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->