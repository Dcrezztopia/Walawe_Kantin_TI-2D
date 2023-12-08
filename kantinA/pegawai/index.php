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
                            <a href="?view=dashboard">
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
                            <a href="?view=datatransaksi">
                            <i class="fa fa-money" aria-hidden="true"></i>
                                <p>Transaksi</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="?view=datapengajuan">
                                <i class="fa fa-upload"></i>
                                <p>Pengajuan Barang</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="?view=datajenisbarang">
                                <i class="fa fa-suitcase"></i>
                                <p>Jenis Barang</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="?view=datapengajuan">
                                <i class="fas fa-briefcase"></i>
                                <p>Data Barang</p>
                            </a>
                        </li>

                        <li class="nav-item">
							<a href="../pegawai/setting.php">
								<i class="fa fa-cog"></i>
								<p>Setting</p>
							</a>
						</li>

                        <li class="nav-item">
                            <a href="../logout.php">
                                <i class="fas fa-lock"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
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


                 ?>

        <!-- Custom template | don't include it in your project! -->
        <!-- End Custom template -->

    </div>

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

</body>

</html>