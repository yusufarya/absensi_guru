<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login page - Absensi</title>
</head>

<!-- <body style="background-color: #d2dbdb;"> -->

<body style="background-image: url('<?= base_url('assets/img/bglogin.JPG') ?>'); background-size: cover; background-position: center;">
    <div class="card shadow rounded-md" style="width: 600px; margin: 80px auto; background: rgba(229, 225, 245, 0.9);">
        <div class="row justify-content-center p-3 my-3">
            <div class="col-lg-10 col-md-10 col-12">
                <h2 class="text-center">Login</h2>
                <!-- <p class="text-center rounded" style="background-color: #d2dbdb; width: 160px; margin: 1px auto; font-size: 14px;">Absensi Guru & Staf</p> -->
                <div class="px-1 py-3">
                    <?php echo $this->session->flashdata('message') ?>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="email">
                            <?= form_error('email', '<small class="text-danger pl-2">', ' </small>'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="password">
                            <?= form_error('password', '<small class="text-danger pl-2">', ' </small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-dark py-1 px-3" style="display: inline !important;">Login</button>
                        <!-- <a href="" class="text-decoration-none mt-2" style="display: inline !important; float: right">Lupa password?</a> -->
                    </form>
                </div>
                <br>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>