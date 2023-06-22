<footer class="main-footer">
    <div class="float-right d-none d-sm-inline-block">
        <b>Absensi</b> <?php echo date('Y') ?>
    </div>
</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

<!-- jQuery -->
<script src="<?php echo $host ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo $host ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo $host ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo $host ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo $host ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<!-- <script src="<?php echo $host ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo $host ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="<?php echo $host ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo $host ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo $host ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo $host ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo $host ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo $host ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $host ?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?php echo $host ?>dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo $host ?>dist/js/pages/dashboard.js"></script> -->

<!-- Bootbox Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.js"></script>

<script>
    function logout() {
        bootbox.confirm("Anda yakin ingin logout?", function(result) {
            if (result) {
                // var currentURL = $(location).attr('href')
                window.location.href = 'logoutAdm';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('LoginAdmin/Logout') ?>',
                    dataType: 'JSON',
                    success: function(data) {}
                })
            } else {
                // window.location.reload();
            }
        });
    }
</script>
<script>
    $(document).ready(function() {
        var pathname = window.location.pathname;
        var curent_uri = pathname.split('/')[2]
        window.onload = function() {
            if (curent_uri == 'dashboard') {
                jam();
            }
        }

        if (curent_uri == 'dashboard') {
            var valDate = document.querySelector('#date')
            var month = document.querySelector('#month')
            var date = new Date()
            var bulan = ('Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember')
            bulan = bulan.split(" ")
            d = date.getDate()
            m = date.getMonth()
            y = date.getFullYear()

            valDate.append(d)
            $('#date').css('fontSize', '45px')
            $('#date').css('marginTop', '-5px')
            month.append(bulan[m])
            $('#month').css('marginTop', '-15px')
            $('#month').css('fontSize', '37px')
        }

        function jam() {
            setInterval(function() {
                var dateTime = document.querySelector('#dateTime')
                var date = new Date(),
                    h, m, s;
                h = date.getHours();
                m = set(date.getMinutes());
                s = set(date.getSeconds());

                dateTime.innerHTML = h + ':' + m + ':' + s;
                dateTime.style.fontSize = '13.5px'
                dateTime.style.marginTop = '2px'
                dateTime.style.marginLeft = '2px'
            }, 1000)
        }

        function set(dateTime) {
            dateTime = dateTime < 10 ? '0' + dateTime : dateTime;
            return dateTime;
        }
    })
</script>
<script>
    $('#kodes').on('click', function() {
        var semester = $('#kodes').val()
        if (semester != '') {
            $('.errs').empty()
        }
    })
    $('#kelas').on('change', function() {
        var kls = $('#kls').val()
        if (kls != '') {
            $('.errkls').empty()
        }
    })
    $('#rekapAbsen').on('click', function() {
        var text = 'Pilih semester terlebih dahulu'
        var errkls = 'Pilih kelas terlebih dahulu'
        var semester = $('#kodes').val()
        var minggu_ke = $('#kode').val()
        var kls = $('#kelas').val()
        // var doc = document;
        if (semester == '') {
            $('.errs').text(text)
        } else {
            bootbox.confirm('<h3>Buka rekap absen ?</h3>', function(res) {
                if (res) {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('Absensi/getRekapAbsen') ?>',
                        dataType: 'JSON',
                        data: {
                            minggu_ke: minggu_ke,
                            semester: semester,
                            kelas: kls
                        },
                        success: function(data) {
                            // alert('ok')
                            // window.location = 'guru/getRekapAbsen'
                            openRpt();
                        }
                    })
                }
            })
        }
    })

    function openRpt() {
        window.popup = window.open('<?php echo base_url('Absensi/rekapAbsenRpt') ?>', 'rpt', 'width=1200, height=560, top=20, left=10, toolbar=1');
    }
</script>

<script>
    // Jadwal Guru
    $('#kode').on('change', function() {
        $('#detail').empty()
        var nama = $('#kode').val()
        // alert(nama)
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: "<?php echo base_url('General/getnamaGuru') ?>",
            data: {
                nama: nama
            },
            success: function(e) {
                // console.log()
                $.each(e, function(data, i) {
                    // console.log(i)
                    var table = '<tr><td>' + e[data].nama_guru + '</td><td>' + e[data].hari + '</td><td>' + e[data].pelajaran + '</td><td>' + e[data].kelas + '</td><td>' + e[data].jam_mulai + '</td><td>' + e[data].jam_selesai +
                        '</td><td><a href="<?= base_url('UpdateJadwal/') ?>' + e[data].id + '" ><i class="fas fa-edit"></i></a></td>' +
                        '</tr>';
                    $('#detail').append(table)
                })
                console.log();
            }
        })
    })

    $('#getkelas').on('change', function() {
        var getkls = $('#getkelas').val()
        $('#detail').empty()
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: "<?php echo base_url('sysuser/getkelas') ?>",
            data: {
                kelas: getkls
            },
            success: function(e) {
                var no = 1
                $.each(e, function(i, data) {

                    if (data.status == 1) {
                        var s = '<div class="badge bg-success p-1 px-4 text-center">Aktif</div>'
                    } else {
                        var s = '<div class="badge bg-danger py-1 px-2 text-center">Tidak Aktif</div>'
                    }
                    // console.log()
                    var table = '<tr><td>' + no++ + '</td><td>' + data.nama + '</td><td>' + data.nis + '</td><td>' + data.kelass + '</td><td>' + data.jenis_kel + '</td><td>' + data.tempat_lahir + ', ' + data.tgl_lahir + '</td><td>' + data.alamat + '</td><td style="text-align:center;">' + s + '</td>' +
                        '<td><a href="<?= base_url('editdatasiswa_g/') ?>' + data.id + '" ><i class="fas fa-edit"></i> Edit </a></td>' +
                        '</tr>';
                    $('#detail').append(table)
                })
                // console.log();
            }
        })
    })
</script>
<script>
    $('#absClick').on('click', function() {
        $('#detail').empty()
        var kls = $('#kls').val()
        var kode = $('#kode_abs').val()
        var guru = $('#nama_guru').val()
        // console.log(guru)
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: "<?php echo base_url('General/getAbs') ?>",
            data: {
                kode_abs: kode,
                kls: kls
            },
            success: function(e) {
                // console.log()
                var no = 1
                $.each(e, function(data, i) {
                    var nama = e[data].guru
                    var nip = e[data].nip
                    var kelas = e[data].kelas
                    var jnskel = e[data].jenis_kel
                    var jam = e[data].jam
                    var mapel = e[data].mapel
                    var tgl = e[data].tanggal
                    var stat = e[data].status
                    if (stat == 'Y') {
                        stat = '✔️'
                    } else {
                        stat = '❌'
                    }
                    var nama_guru = e[data].guru
                    // if(guru == nama_guru) {
                    var table = '<tr><td>' + no++ + '</td><td>' + nama + '</td><td>' + nip + '</td><td>' + kelas + '</td><td>' + jnskel + '</td><td>' + jam + '</td><td>' + tgl + '</td><td>' + mapel + '</td><td>' + stat + '</td> </tr>';
                    $('#detail').append(table)
                    // }
                    // console.log();
                })
                // console.log(e);
            }
        })
    })
</script>
<script>
    $('#updateLap').on('click', function() {
        let kode = $('#kode').val()
        let semester = $('#semester').val()
        bootbox.confirm({
            message: "Simpan Laporan Absensi? <br><hr> <small>Jika ya absensi hari ini akan ditutup, guru dan staff yang belum melakukan absensi akan di anggap tidak hadir</small>",
            buttons: {
                confirm: {
                    label: 'Ya',
                    className: 'btn-primary'
                },
                cancel: {
                    label: 'Tidak',
                    className: 'btn-secondary'
                }
            },
            callback: function(result) {
                if (result) {
                    $.ajax({
                        type: 'POST',
                        dataType: 'JSON',
                        url: "<?php echo base_url('Absensi/updateLapAbs') ?>",
                        data: {
                            kode: kode,
                            semester: semester
                        },
                        success: function(data) {
                            console.log(data.status)
                            if (data.status == 'success') {
                                // alert('Berhasil');
                                var ntf = `<div class="alert alert-success alert-dismissible fade show py-2" role="alert">
                                    <strong> ✔️ Berhasil. &nbsp;</strong> Absensi minggu ini telah disimpan ke Laporan Absensi. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="button" class="close py-2" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>`;
                                $('#notif').append(ntf)
                            } else {
                                var ntf = `<div class="alert alert-warning alert-dismissible fade show py-2" role="alert">
                                    <strong> &nbsp;</strong> Absensi minggu ini telah disimpan ke Laporan Absensi. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="button" class="close py-2" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>`;
                                $('#notif').append(ntf)
                            }
                        }

                    });
                }

            }
        });
    })
</script>

</body>

</html>