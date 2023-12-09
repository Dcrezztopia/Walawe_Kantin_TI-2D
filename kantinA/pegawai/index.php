<?php
include '../koneksi.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Sistem Informasi Kantin</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../assets/img/logo.png" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
    WebFont.load({
        google: {
            "families": ["Open+Sans:300,400,600,700"]
        },
        custom: {
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
            urls: ['../assets/css/fonts.css']
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
    </script>

    <style>
		.logo img.navbar-brand {
    		width: 120px;
    		height: auto;
		}

        .nav-item.active a {
            background-color: #007bff;
            color: #fff;
        }

	</style>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/azzara.css">
    <link rel="stylesheet" href="../assets/css/demo.css">
</head>

<body>
    <div class="wrapper">
        <!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
        <div class="main-header" data-background-color="orange">
            <!-- Logo Header -->
            <div class="logo-header">

                <a href="#" class="logo">
                    <img src="../assets/img/logo2.png" alt="navbar brand" class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fa fa-bars"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
                <div class="navbar-minimize">
                    <button class="btn btn-minimize btn-rounded">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
					</div>
				</div>
			</nav>
            <!-- End Navbar -->
        </div>
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-wrapper scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="?view=dashboard" class="nav-link">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Components</h4>
                        </li>

                        <li class="nav-item">
                            <a href="?view=datatransaksi" class="nav-link">
                                <i class="fa fa-money" aria-hidden="true"></i>
                                <p>Transaksi</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="?view=datapengajuan" class="nav-link">
                                <i class="fa fa-upload"></i>
                                <p>Pengajuan Barang</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="?view=datajenisbarang" class="nav-link">
                                <i class="fa fa-suitcase"></i>
                                <p>Jenis Barang</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="?view=datastokbarang" class="nav-link">
                                <i class="fas fa-briefcase"></i>
                                <p>Data Barang</p>
                            </a>
                        </li>

                        <li class="nav-section">
							<h4 class="text-section">Setting</h4>
						</li>
					
						<li class="nav-item">
							<a href="?view=profil" class="nav-link">
								<i class="fa fa-user" aria-hidden="true"></i>
								<p>Profil</p>
							</a>
						</li>

                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutConfirmationModal">
                                <i class="fas fa-lock"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="modal fade" id="logoutConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin <b>logout</b>?</h4>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancel</button>
                        <a class="btn btn-danger" href="../login.php"><i class="fas fa-lock"></i>&nbsp;Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <?php
                    // Dashboard
                    if(@$_GET['view']=='')
                        include 'dashboard.php';
                    elseif($_GET['view']=='dashboard')
                        include 'dashboard.php';

                    // Data Transaksi
                    elseif($_GET['view']=='datatransaksi')
                        include 'dataPegawai/transaksi/datatransaksi.php';
                    elseif($_GET['view']=='createtransaksi')
                        include 'dataPegawai/transaksi/createtransaksi.php';
                    elseif($_GET['view']=='detailtransaksi')
                        include 'dataPegawai/transaksi/detailtransaksi.php';

                    // Data Pengajuan
                    elseif($_GET['view']=='datapengajuan')
                        include 'dataPegawai/pengajuan/datapengajuan.php';

                    elseif($_GET['view']=='createpengajuan')
                        include 'dataPegawai/pengajuan/createpengajuan.php';

                    elseif($_GET['view']=='detailpengajuan')
                        include 'dataPegawai/pengajuan/detailpengajuan.php';

                    // Data Jenis Barang
                    elseif($_GET['view']=='datajenisbarang')
                        include 'dataPegawai/jenisbarang/datajenisbarang.php';

                    elseif($_GET['view']=='createjenisbarang')
                        include 'dataPegawai/jenisbarang/datajenisbarang.php';

                    elseif($_GET['view']=='detailjenisbarang')
                        include 'dataPegawai/jenisbarang/detailjenisbarang.php';

                    // Data Stok Barang
                    elseif($_GET['view']=='datastokbarang')
                        include 'dataPegawai/stokbarang/datastokbarang.php';

                    elseif($_GET['view']=='createjenisbarang')
                        include 'dataPegawai/stokbarang/datastokbarang.php';

                    elseif($_GET['view']=='detailjenisbarang')
                        include 'dataPegawai/stokbarang/detailstokbarang.php';
                 ?>

        <!-- Custom template | don't include it in your project! -->
        <!-- End Custom template -->

    </div>
    
        <!-- Add Bootstrap JS and jQuery -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!--   Core JS Files   -->
        <script src="../assets/js/core/jquery.3.2.1.min.js"></script>
        <script src="../assets/js/core/popper.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>
        <!-- jQuery UI -->
        <script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
        <!-- Bootstrap Toggle -->
        <script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
        <!-- jQuery Scrollbar -->
        <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
        <!-- Datatables -->
        <script src="../assets/js/plugin/datatables/datatables.min.js"></script>
        <!-- Azzara JS -->
        <script src="../assets/js/ready.min.js"></script>
        <!-- Azzara DEMO methods, don't include it in your project! -->
        <script src="../assets/js/setting-demo.js"></script>
        <script>
        $(document).ready(function() {
            $('#add-row').DataTable({});
        });
        </script>
        <!-- jQuery script to add "active" class to clicked menu item -->
        <script>
            $(document).ready(function () {
                var currentUrl = window.location.href;

                $(".nav-item a").each(function () {
                    if (currentUrl.indexOf($(this).attr("href")) > -1) {
                        $(this).closest('.nav-item').addClass("active");
                    }
                });
            });
        </script>

</body>

</html>