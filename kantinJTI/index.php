<?php
session_start();
include "koneksi.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kantin</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <script src="../peminjaman/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['assets/css/fonts.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/azzara.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI/tZ1ZqjKw0BOyL8GfZ2mPAmUw/A763lSNtFqIo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        function gagalLogin() {
            Swal.fire({
                title: 'Gagal Login!',
                text: 'Username Atau Password Salah',
                icon: 'error',
                confirmButtonColor: '#2e8aff'
            });
        }
    </script>
</head>

<body class="login" style="background: linear-gradient(rgba(154, 109, 6, 0.8), rgba(154, 109, 6, 0.8)), url('assets/img/gedung.png') center/cover;">
    <div class="wrapper wrapper-login">

        <div class="container container-login animated fadeIn">
            <div class="text-center mb-3">
                <img src="assets/img/logologin.png" height="250" width="300">
            </div>
            <div class="login-form">
                <form method="POST" action="cek_login.php">
                    <div class="form-group form-floating-label">
                        <input id="username" maxlength="15" name="username" type="text" class="form-control input-border-bottom" required>
                        <label for="username" class="placeholder">Username</label>
                    </div>
                    <div class="form-group form-floating-label">
                        <input id="password" maxlength="15" name="password" type="password" class="form-control input-border-bottom" required>
                        <label for="password" class="placeholder">Password</label>
                    </div>

                    <div class="form-action mb-3">
                        <button type="submit" class="btn btn-rounded w-100 btn-login py-2" style="background-color: #fff29d">Login</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script src="assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/ready.js"></script>
    <script>
        <?php
        if (isset($_SESSION['gagal_login'])) : ?>
            Swal.fire({
                title: 'Gagal Login!',
                text: 'Username Atau Password Salah',
                icon: 'error',
                confirmButtonColor: '#2e8aff'
            });
            <?php unset($_SESSION['gagal_login']); ?>
        <?php endif; ?>
    </script>
</body>

</html>