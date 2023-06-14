<?php
if ($lvluser == 1) {
    $sysstatus = "Administrator";
} else if ($lvluser == 2) {
    $sysstatus = "Staff";
} else {
    $sysstatus = "Guru";
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?php echo $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?php echo $title ?></a></li>
                        <li class="breadcrumb-item active"><?php echo $sysstatus ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content --> 
    <section class="content card p-3">
        <div class="container-fluid">
            <div class="row">
                <?php echo $this->session->flashdata('message') ?>
                <table class="table table-sm table-bordered">
                    <thead class="bg-dark">
                        <tr>
                            <th>Nama Guru</th> 
                            <th>Nip</th> 
                            <th>Jenis Kel</th>
                            <th>Pelajaran</th>                            
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="detail">
                        <?php
                        foreach ($guru as $g) :  
                            $nama_guru = $g->nama;
                            $jenis_kel = $g->jenis_kel;
                            $nip = $g->nip; 
                            ?>
                            <tr>
                                <td><?php echo $nama_guru ?></td>
                                <td><?php echo $nip ?></td>
                                <td><?php echo $jenis_kel ?></td> 
                                <td><?php echo $g->pelajaran ?></td> 
                                <td style="text-align: center;">
                                    <a href="<?= base_url('UpdateMapel/').$g->kode ?>"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php 
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->