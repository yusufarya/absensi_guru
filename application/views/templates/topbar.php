<div class="container d-flex w-100 h-100 p-3 flex-column">
    <header class="shadow p-3 mb-2" style="background:linear-gradient(45deg, #2F4F4F, #008080);">
        <div>
            <h3 class="float-md-start mb-0">Absensi <?= $guru['level_id'] == 3 ? 'Guru' : 'Staff' ?></h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link" href="#" style="padding: 0 8px; display: inline-block; padding-top: 4px;">
                    <img src="<?php echo base_url('assets/img/') . $guru['gambar'] ?>" alt="profile" width="35" style="border: #ffff 1px solid; border-radius: 50%;">
                </a>
                <a class="nav-link <?php echo $title == 'Home' ? 'active' : '' ?>" href="<?php echo base_url('home') ?>">HOME</a>
                <a class="nav-link <?php echo $title == 'Jadwal' ? 'active' : '' ?>" href="<?php echo base_url('guru/jadwal') ?>" <?= $guru['level_id'] == 3 ? '' : 'hidden' ?>>JADWAL</a>
                <a class="nav-link me-2 <?php echo $title == 'Riwayat Absensi' ? 'active' : '' ?>" href="<?php echo base_url('guru/kehadiran') ?>">KEHADIRAN</a>
                <button class="text-dark btn btn-light py-0" data-bs-toggle="modal" data-bs-target="#logout">Logout</button>
            </nav>
        </div>
    </header>